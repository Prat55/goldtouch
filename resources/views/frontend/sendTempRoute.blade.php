@extends('frontend.includes.app')
@section('title', 'Orders')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
                <h2 class="mb-3 me-auto">Orders</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Orders</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="fas fa-user text-white bg-primary"></i>
                                </div>
                                {{-- @if (Auth::user()->role == 2)
                                    <div class="ms-4 customer">
                                        <h2 class="mb-0  font-w600">{{ $aordersCount }}</h2>
                                        <p class="mb-0 font-w500">Total Orders</p>
                                    </div>
                                @else
                                    <div class="ms-4 customer">
                                        <h2 class="mb-0  font-w600">{{ $uordersCount }}</h2>
                                        <p class="mb-0 font-w500">Total Orders</p>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="far fa-building bg-warning text-white"></i>
                                </div>
                                <div class="ms-4 customer">
                                    <h2 class="mb-0  font-w600">5,623</h2>
                                    <p class="mb-0  font-w500">Total Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                @if (Auth::user()->role == 2)
                    <div class="col-xl-12">
                        <div class="d-flex flex-wrap">
                            <div class="table-search mb-3 pe-3">
                                <form action="" method="get">
                                    <div class="input-group search-area">
                                        <input type="text" name="c" class="form-control"
                                            placeholder="Search customer name here" value="{{ Request::get('c') }}"
                                            required>

                                        <button type="submit" class="btn btn-sm input-group-text">
                                            <i class="flaticon-381-search-2"></i>
                                        </button>

                                    </div>
                                </form>
                            </div>

                            <a href="{{ route('orders') }}" class="btn btn-warning mb-3">
                                <i class="fas fa-redo-alt"></i>
                            </a>

                        </div>
                    </div>
                @endif
                <div class="col-xl-12">
                    <div class="table-responsive fs-14">
                        <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                            id="example5">
                            <thead>
                                <tr class="text-center">
                                    {{-- <th>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll">
                                            </label>
                                        </div>
                                    </th> --}}
                                    <th>Customer<br> Name</th>
                                    <th>Address</th>
                                    <th>GSTIN No.</th>
                                    <th>Style<br> Reference</th>
                                    <th>Emails</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($customers->isNotEmpty())
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->cname }}</td>
                                            <td>{{ $customer->cadd }}</td>
                                            <td>{{ $customer->cgstin }}</td>
                                            <td>{{ $customer->styleref }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->status }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">No records found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Tranasactions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">OrderID</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="#0001234">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
