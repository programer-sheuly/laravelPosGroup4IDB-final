@extends("master")
@section("content")

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Category</p>
                                <h6 class="mb-0">{{ $totalCategory }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Customer</p>
                                <h6 class="mb-0">{{ $totalCustomer }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Supplier</p>
                                <h6 class="mb-0">{{ $totalSupplier }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Product</p>
                                <h6 class="mb-0">{{ $totalProduct }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Brand</p>
                                <h6 class="mb-0">{{ $totalBrand }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Unit</p>
                                <h6 class="mb-0">{{ $totalUnit }}</h6>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sales Order</p>
                                <h6 class="mb-0">{{ $totalSalesOrder }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-info"></i>
                            <div class="ms-3">
                                <p class="mb-2"><b>Total Purches Order</b></p>
                                <h6 class="mb-0">{{ $totalPurchaseOrder }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!----- chart start---->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
  --}}
@endsection