<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Brand;
use App\Models\ProductsModel;
use App\Models\Suppliers;
use App\Models\Units;
use App\Models\SalesOrder;
use App\Models\PurchaseOrder;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalCategory = Category::count();
        $totalCustomer = Customers::count();
        $totalBrand = Brand::count();
        $totalProduct = ProductsModel::count();
        $totalSupplier = Suppliers::count();
        $totalUnit = Units::count();
        $totalSalesOrder = SalesOrder::count();
        $totalPurchaseOrder = PurchaseOrder::count();
        // dd($totalCategory);
        return view ('admin',['totalCategory'=>$totalCategory ,
                            'totalCustomer'=>$totalCustomer,
                            'totalBrand' =>$totalBrand,
                            'totalProduct' => $totalProduct,
                            'totalSupplier' => $totalSupplier,
                            'totalUnit' => $totalUnit,
                            'totalSalesOrder' => $totalSalesOrder,
                            'totalPurchaseOrder' => $totalPurchaseOrder,
                        
                        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
