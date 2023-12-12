@extends('master')
@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="p-4 rounded bg-secondary h-100">
            <h6 class="mb-4">All Purchases Order</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Sales Man</th>
                        <th scope="col">Supplier Name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseOrders as $purchaseOrder)
                        <tr>
                            <td>{{ $purchaseOrder->id }}</td>
                            <td>{{ $purchaseOrder->user->name }}</td>
                            <td>{{ $purchaseOrder->supplier->supp_name }}</td>
                            <td>{{ $purchaseOrder->created_at->format('h:i a') }}</td>
                            <td>{{ $purchaseOrder->created_at->format('d-M-Y') }}</td>
                            <td>
                                <a href="{{ route('order.purchase-order.show', $purchaseOrder->id) }}">
                                    <button class="btn btn-success">View Purchases Order</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
