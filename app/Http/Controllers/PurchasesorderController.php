<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Models\ProductsModel;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\SalesOrdersModel;
use App\Models\POrderProduct;
use Exception;
use Illuminate\Support\Facades\Auth;


class PurchasesorderController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $purchaseOrders = PurchaseOrder::with('user', 'supplier')->orderBy('created_at', 'desc')->get();
        return view('pages.purchaseorders.all_purchase_order', compact('purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $products = ProductsModel::with('category', 'brand')->get();
        $suppliers = Suppliers::all();
        return view('pages.purchaseorders.create_purchase_order', compact(['products', 'suppliers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'supplierId' => 'required',
            'productId' => 'required',
            'quantity' => 'required',
        ]);

        try {
            $invoiceId = null;
            DB::transaction(function () use ($request, &$invoiceId) {
                // Insert to the sales order table
                $userId = Auth::user()->id;
                $supplierId = $request->supplierId;

                $purchaseOrder = PurchaseOrder::create([
                    'supplier_id' => $supplierId,
                    'user_id' => $userId,
                    'status' => 1,
                ]);

                // Insert to s_order_products table
                $productsId = $request->productId;
                $quantities = $request->quantity;
                foreach ($productsId as $index => $productId) {
                    $pOrderProduct = POrderProduct::create([
                        'product_id' => $productId,
                        'quantity' => $quantities[$index],
                        'purchase_order_id' => $purchaseOrder->id,
                    ]);
                    $stock = ProductsModel::find($productId)->stock;
                    ProductsModel::find($productId)->update([
                        'stock' => $stock + $quantities[$index]
                    ]);

                }
                $invoiceId = $purchaseOrder->id;
            });
            return redirect()->route('order.purchase-order.show', ['PurchaseOrder' => $invoiceId]);
        } catch (Exception $error) {
            // dd($error);
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $purchaseOrder = PurchaseOrder::with('user', 'supplier')->find($id);
        $pOrderProduct = POrderProduct::with('product')->where('purchase_order_id', $id)->get();

        // Calculate Total
        $total = 0;
        $pOrderProduct->each(function ($pOrderProduct) use (&$total) {
            $subTotal = $pOrderProduct->product->buying_price * $pOrderProduct->quantity;
            $total += $subTotal;
        });
        return view('pages.purchaseorders.show_purchase_order', compact(['purchaseOrder', 'pOrderProduct', 'total']));
    }









    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
