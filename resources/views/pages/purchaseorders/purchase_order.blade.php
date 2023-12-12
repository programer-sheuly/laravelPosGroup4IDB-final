@extends("master")
@section("content")

<div class="container-fluid "> 


    <div class="col-lg-12 grid-margin stretch-card ">

    <div class="p-3 mb-2 bg-secondary text-white">
    <div class="card"> 
        <div class="card-body bg-gray text-dark">
            <h4 class="card-title">Purchaseorder</h4>
        <table class="table text-white" >
        <thead>
            <tr>
                <th>Id</th>
                  <th>Product Name</th>
                  <th>Supplier Name</th>
                  <th>Supplier address</th>
                  <th>Supplier Name</th>
                  <th>status</th>
                  <th>Date & Time</th>
                </tr>
              </thead>
            <tbody>
  
            @foreach ($purchaseOrders as $purchaseOrder) 
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  {{-- <td>{{ $salesorder->name }}</td> --}}
                  <td>{{ $purchaseOrder->supp_name}} </td>
                  <td>{{ $purchaseOrder->supp_address}} </td>
                  <td>{{ $purchaseOrder->date }}</td>
                  <td>{{ $purchaseOrder->status }}</td>
           
                </tr>
            @endforeach
        </tbody>
    </table>
        <br>
        </div>
    </div>
</div>
</div>
</div>


@endsection


