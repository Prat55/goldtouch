@extends('frontend.includes.app')
@section('title', 'Orders')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
                <h2 class="mb-3 me-auto">Order List</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a></li>
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
                                <div class="ms-4 customer">
                                    <h2 class="mb-0  font-w600">245</h2>
                                    <p class="mb-0 font-w500">Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
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
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row order-card text-center">
                                <div class="col-4 customer">
                                    <h2 class="mb-0  font-w600">421</h2>
                                    <p class="mb-0 font-w500">Agent</p>
                                </div>
                                <div class="col-4 customer">
                                    <h2 class="mb-0 font-w600">8,313</h2>
                                    <p class="mb-0  font-w500">Transactions</p>
                                </div>
                                <div class="col-4 border-0 customer">
                                    <h2 class="mb-0 font-w600">4.6</h2>
                                    <p class="mb-0 font-w500">Rating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="d-flex flex-wrap">
                        <a href="javascript:void(0);" class="btn btn-primary me-3 mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">+ New Tranasactions</a>

                        <div class="table-search mb-3 pe-3">
                            <div class="input-group search-area">
                                <input type="text" class="form-control" placeholder="Search customer name here">
                                <span class="input-group-text"><a href="javascript:void(0)"><i
                                            class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        <div class="newest mb-3 me-3">
                            <select class="form-control default-select ms-0 border">
                                <option>Newest</option>
                                <option>Oldest</option>
                                <option>Newest</option>
                            </select>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-primary me-3 mb-3"><i
                                class="fas fa-calendar me-3"></i>Filter</a>
                        <a href="javascript:void(0);" class="btn btn-warning mb-3"><i class="fas fa-redo-alt"></i></a>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="table-responsive fs-14">
                        <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                            id="example5">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll">
                                            </label>
                                        </div>
                                    </th>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>GSTIN No.</th>
                                    <th>Style Reference</th>
                                    <th>Emails</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    @if (Auth::guard('web')->user()->role == 2)
                                        <th class="">Edits</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $od)
                                    <tr>
                                        <td>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customCheckBox1">
                                                <label class="form-check-label" for="customCheckBox1">
                                                </label>
                                            </div>
                                        </td>
                                        <td>#{{ $od->order_id }}</td>
                                        <td class="wspace-no">{{ $od->created_at }}</td>
                                        <td>{{ $od->cname }}</td>
                                        <td class="text-ov">{{ $od->cadd }}</td>
                                        <td class="text-ov">{{ $od->cgstin }}</td>
                                        <td>{{ $od->cstyle_ref }}</td>
                                        <td>{{ $od->email1 }}<br>

                                            {{ $od->email2 }}
                                            @if ($od->email2)
                                                <br>
                                            @endif

                                            {{ $od->email3 }}
                                            @if ($od->email3)
                                                <br>
                                            @endif

                                            {{ $od->email4 }}
                                            @if ($od->email4)
                                                <br>
                                            @endif

                                            {{ $od->email5 }}
                                            @if ($od->email5)
                                                <br>
                                            @endif
                                        </td>
                                        <td>{{ $od->phone1 }}<br>

                                            {{ $od->phone2 }}
                                            @if ($od->phone2)
                                                <br>
                                            @endif

                                            {{ $od->phone3 }}
                                            @if ($od->phone3)
                                                <br>
                                            @endif

                                            {{ $od->phone4 }}
                                            @if ($od->phone4)
                                                <br>
                                            @endif

                                            {{ $od->phone5 }}
                                            @if ($od->phone5)
                                                <br>
                                            @endif
                                        </td>
                                        <td><span class="text-warning">Pending</span></td>
                                        @if (Auth::guard('web')->user()->role == 2)
                                            <td>
                                                <div class="dropdown ms-auto c-pointer">
                                                    <div class="btn-link" data-bs-toggle="dropdown">
                                                        <svg width="24" height="24" viewbox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z"
                                                                stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z"
                                                                stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z"
                                                                stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item text-black"
                                                            href="javascript:void(0);">Accept
                                                            order</a>
                                                        <a class="dropdown-item text-black"
                                                            href="javascript:void(0);">Reject
                                                            order</a>
                                                        <a class="dropdown-item text-black"
                                                            href="javascript:void(0);">View
                                                            Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
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
