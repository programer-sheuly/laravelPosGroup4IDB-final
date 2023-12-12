<?php
namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\ProductsModel;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SalesOrdersModel;
use App\Models\SOrderProduct;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class SalesorderController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // $start = Carbon::now()->startOfDay()->toDateTimeString();
        $today = Carbon::now()->toDateString();

        $salesOrders = SalesOrder::with('user', 'customer')->orderBy('created_at', 'desc')->whereDate('created_at', $today)->get();
        $salesOrders->each(function ($salesOrder) {
            $salesOrder->total = SalesOrder::salesOrderTotal($salesOrder->id);
        });
        return view('pages.salesorders.all_sales_order', compact('salesOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $products = ProductsModel::with('category', 'brand')->where('stock', '>', 0)->get();
        $customers = Customers::all();
        $stockOut = $request->session()->get('stockOut');
        return view('pages.salesorders.create_sales_order', compact(['products', 'customers', 'stockOut']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'customerId' => 'required',
            'productId' => 'required',
            'quantity' => 'required',
        ]);

        try {
            $invoiceId = null;
            DB::transaction(function () use ($request, &$invoiceId) {
                // Insert to the sales order table
                $userId = Auth::user()->id;
                $customerId = $request->customerId;

                $salesOrder = SalesOrder::create([
                    'customer_id' => $customerId,
                    'user_id' => $userId,
                    'status' => 1,
                ]);



                // Insert to s_order_products table
                $productsId = $request->productId;
                $quantities = $request->quantity;
                foreach ($productsId as $index => $productId) {
                    $sOrderProduct = SOrderProduct::create([
                        'product_id' => $productId,
                        'quantity' => $quantities[$index],
                        'sales_order_id' => $salesOrder->id,
                    ]);
                    $stock = ProductsModel::find($productId)->stock;

                    if($quantities[$index] > $stock){
                        
                        throw new Exception('Order is not created');
                       
                    }
                    ProductsModel::find($productId)->update([
                        'stock' => $stock - $quantities[$index]
                    ]);

                }
                $invoiceId = $salesOrder->id;
            });
            return redirect()->route('order.sales-order.show', ['SalesOrder' => $invoiceId]);
        } catch (Exception $error) {
            $message = $error->getMessage();
            if($message == "Order is not created"){
                $request->session()->flash('stockOut', 'Product Stock is out');
                return back();
            }
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $salesOrder = SalesOrder::with('user', 'customer')->find($id);
        $sOrderProducts = SOrderProduct::with('product')->where('sales_order_id', $id)->get();

        // Calculate Total
        $total = 0;
        $sOrderProducts->each(function ($sOrderProduct) use (&$total) {
            $subTotal = $sOrderProduct->product->selling_price * $sOrderProduct->quantity;
            $total += $subTotal;
        });
        return view('pages.salesorders.show_sales_order', compact(['salesOrder', 'sOrderProducts', 'total']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
