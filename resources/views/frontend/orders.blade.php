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
                                @if (Auth::user()->role == 2)
                                    <div class="ms-4 customer">
                                        <h2 class="mb-0  font-w600">{{ $aordersCount }}</h2>
                                        <p class="mb-0 font-w500">Total Orders</p>
                                    </div>
                                @else
                                    <div class="ms-4 customer">
                                        <h2 class="mb-0  font-w600">{{ $uordersCount }}</h2>
                                        <p class="mb-0 font-w500">Total Orders</p>
                                    </div>
                                @endif
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
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    @if (Auth::user()->role == 2)
                                        <th>Customer<br> Name</th>
                                    @endif
                                    <th>Address</th>
                                    <th>GSTIN No.</th>
                                    <th>Style<br> Reference</th>
                                    <th>Emails</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    @if (Auth::user()->role == 2)
                                        <th class="">Edits</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orders->isNotEmpty())
                                    @foreach ($orders as $od)
                                        @if (Auth::user()->role == 1)
                                            @if ($od->u_id == Auth::user()->id)
                                                <tr>
                                                    {{-- <td>
                                                        <div class="form-check ms-2">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="customCheckBox1">
                                                            <label class="form-check-label" for="customCheckBox1">
                                                            </label>
                                                        </div>
                                                    </td> --}}
                                                    <td>#{{ $od->order_id }}</td>
                                                    <td class="wspace-no">{{ $od->created_at }}</td>
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
                                                </tr>
                                            @endif
                                        @else
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
                                                <td>
                                                    <div class="dropdown ms-auto c-pointer">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z"
                                                                    stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </path>
                                                                <path
                                                                    d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z"
                                                                    stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </path>
                                                                <path
                                                                    d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z"
                                                                    stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                        </div>

                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <form action="/accept/{{ $od->id }}" method="POST">
                                                                {{-- <a class="dropdown-item text-black"
                                                                    href="javascript:void(0);">
                                                                </a> --}}
                                                                <button type="submit" class="dropdown-item text-black">
                                                                    Accept order
                                                                </button>
                                                            </form>
                                                            <form action="/reject/{{ $od->id }}" method="POST">
                                                                {{-- <a class="dropdown-item text-black"
                                                                    href="javascript:void(0);">
                                                                    Reject order
                                                                </a> --}}
                                                                <button type="submit" class="dropdown-item text-black">
                                                                    Reject order
                                                                </button>
                                                            </form>
                                                            <form action="/details/{{ $od->id }}" method="POST">
                                                                {{-- <a class="dropdown-item text-black"
                                                                    href="javascript:void(0);">
                                                                    View Details
                                                                </a> --}}
                                                                <button type="submit" class="dropdown-item text-black">
                                                                    View Details
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">No records found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $orders->links() }}
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
