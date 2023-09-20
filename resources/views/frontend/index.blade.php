@extends('frontend.includes.app')
@section('title', 'Dashboard')

@section('content')
    {{-- <!--**********************************
        Content body start
    ***********************************--> --}}
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                <h2 class="mb-3 me-auto">Dashboard</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Total Orders</h5>
                                <h2 class="fs-40 font-w600">{{ $countOrder->count() }}</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["var(--primary)", "rgba(242, 246, 252)"]}'>{{ $countOrder->count() }}/100</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Pending Orders</h5>
                                <h2 class="fs-40 font-w600">{{ $countOrder->count() }}</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(56, 226, 93,1)", "rgba(242, 246, 252)"]}'>{{ $countOrder->count() }}/100</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>Completed Orders</h5>
                                <h2 class="fs-40 font-w600">0</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(255, 135, 35,1)", "rgba(242, 246, 252)"]}'>0/100</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="card-data me-2">
                                <h5>#</h5>
                                <h2 class="fs-40 font-w600">75</h2>
                            </div>
                            <div>
                                <span class="donut1"
                                    data-peity='{ "fill": ["rgb(51, 62, 75,1)", "rgba(242, 246, 252)"]}'>3/8</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--**********************************
                                                                                                                        Content body end
                                                                                                                    ***********************************-->
@endsection
