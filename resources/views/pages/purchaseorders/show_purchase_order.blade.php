@extends("master")
@section("content")

<div class="col-sm-12 col-xl-12">
    <div class="p-4 rounded bg-secondary h-100">
        <h6 class="mb-4">Purchase Order Id</h6>
           
        <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-15" style="color:gray">Invoice #{{ $purchaseOrder->id }} <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                    <div class="mb-4">
                                       <h2 class="mb-1 text-muted">Super Shop</h2>
                                    </div>
                                    <h3 style="color:gray">Store Information</h3>
                                    <div class="text-muted">
                                        <p class="mb-1">Sales Man: {{ $purchaseOrder->user->name }}</p>
                                        <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                        <p class="mb-1">Email {{ $purchaseOrder->user->email }}</p>
                                        <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                    </div>
                                </div>
            
                                <hr class="my-4">
            
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 style="color:gray">Supplier Information</h3>
                                        <div class="text-muted">
                                            <h5 class="mb-3 font-size-16" style="color:gray">Billed To:</h5>
                                            <h5 class="mb-2 font-size-15" style="color:gray">{{ $purchaseOrder->supplier->supp_name }}</h5>
                                            <p class="mb-1">Address: {{ $purchaseOrder->supplier->supp_address }}</p>
                                            <p class="mb-1">Email: {{ $purchaseOrder->supplier->supp_email }}</p>
                                            <p>Phone {{ $purchaseOrder->supplier->supp_phone }}</p>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="text-muted text-sm-end" >
                                            <div>
                                                <h5 class="mb-1 font-size-15" style="color:gray">Invoice No:</h5>
                                                <p>#DZ0112</p>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="mb-1 font-size-15" style="color:gray">Invoice Date:</h5>
                                                <p>{{ $purchaseOrder->created_at->format('d-M-Y') }}</p>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="mb-1 font-size-15" style="color:gray" >Order No:</h5>
                                                <p>#1123456</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                                
                                <div class="py-2">
                                    <h5 class="font-size-15">Order Summary</h5>
            
                                    <div class="table-responsive">
                                        <table class="table mb-0 align-middle table-nowrap table-centered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 70px;">No.</th>
                                                    <th>Product Image</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th class="text-end" style="width: 120px;">Total</th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>
                                                @foreach ($pOrderProduct as $index => $pOrderProduct )
                                                    
                                               
                                                <tr>
                                                    <th scope="row">{{ $index+1 }}</th>
                                                    <td>
                                                      <img src="{{ url('/uploads/'.$pOrderProduct->product->product_image) }}" style="width: 70px" alt="">
                                                    </td>
                                                    <td>{{ $pOrderProduct->product->product_name }}</td>
                                                    <td>{{ $pOrderProduct->quantity }}</td>
                                                    <td class="">{{ $pOrderProduct->product->buying_price }}
                                                    </td>
                                                    <td class="text-end">{{ $pOrderProduct->product->buying_price * $pOrderProduct->quantity }}</td>
                                                </tr>
                                                @endforeach
                                            
                                                <tr>
                                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end"><h4 class="m-0 fw-semibold" style="color:gray">{{ $total }}</h4></td>
                                                </tr>
                                                <!-- end tr -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                    <div class="mt-4 d-print-none">
                                        <div class="float-end">
                                            <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-primary w-md">Send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
    </div>
</div>



@endsection