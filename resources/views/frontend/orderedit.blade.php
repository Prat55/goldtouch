@extends('frontend.includes.app')
@section('title', 'Make Order')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                <h2 class="mb-3 me-auto">Order</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript: void();">Order</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 warningBox2">
                @include('frontend.message')
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/order-update/{{ $order->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER NAME</label>
                                            <input type="text" class="form-control" name="cname"
                                                value="{{ $order->cname }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER ADD</label>
                                            <input type="text" class="form-control" name="cadd"
                                                value="{{ $order->cadd }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER GSTIN</label>
                                            <input type="text" class="form-control" name="cgstin"
                                                value="{{ $order->cgstin }}" readonly>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">STYLE REF</label>
                                            <input type="text" class="form-control" name="styleref"
                                                value="{{ $order->cstyle_ref }}" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PO NUMBER</label>
                                            <input type="text" class="form-control" name="pono"
                                                value="{{ $order->ponumber }}" required>
                                        </div>
                                        @if ($order->poimg != null)
                                            <div class="mb-3 col-md-6" id="poimage">
                                                <img src="/poimg/{{ $order->poimg }}" alt="Purchase order number"
                                                    width="400px" height="300px">
                                            </div>
                                        @endif
                                        <div class="mb-3 col-md-6 {{ $order->poimg == null ? '' : 'd-none' }}">
                                            <label class="form-label">PO COPY UPLOAD</label>
                                            <input type="file" class="form-control" name="poimg" id="poimg">
                                            <input type="text" value="{{ $order->poimg }}" name="oldpoimg">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 1</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtaker1" class="form-control"
                                                        style="width: 100%" placeholder="Enter measurement taker name"
                                                        value="{{ $order->mtaker1 }}" required />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mtakerDate1"
                                                        value="{{ $order->mtakerDate1 }}" class="form-control"
                                                        style="width: 100%" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 2</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtakerDate2" class="form-control"
                                                        style="width: 100%" value="{{ $order->mtaker2 }}"
                                                        placeholder="Enter measurement taker name (optional)" />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mdatetime2" class="form-control"
                                                        style="width: 100%" value="{{ $order->mtakerDate2 }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control mt-1"
                                                        placeholder="Enter Email Id 1" name="email1"
                                                        value="{{ $order->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Phone</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Phone Number 1" name="phone1"
                                                        value="{{ $order->phone }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    <i class="fas fa-reorder text-white bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0  font-w600">{{ $aordersCount }}</h2>
                                    <p class="mb-0 font-w500">Total Orders</p>
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
                                    <i class="fas fa-clock text-white bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0  font-w600">{{ $pedingOrders }}</h2>
                                    <p class="mb-0 font-w500">Pending Orders</p>
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
                                    <i class="fas fa-check text-white bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0  font-w600">{{ $fabricStatus }}</h2>
                                    <p class="mb-0 font-w500">Completed Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 statusBox">
                    <div id="sStatus" class="status">

                    </div>
                </div>

                <div class="col-md-4 warningBox">
                    @include('frontend.message')
                </div>

                <div class="col-xl-12">
                    <div class="d-flex flex-wrap">
                        <div class="table-search mb-3 pe-3">
                            <form action="" method="get">
                                <div class="input-group search-area">
                                    <input type="text" name="c" class="form-control"
                                        placeholder="Search customer name here" value="{{ Request::get('c') }}" required>

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

                <div class="col-xl-12">
                    <div class="table-responsive fs-14">
                        <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                            id="example5">
                            <thead>
                                <tr class="text-center">
                                    <th>Employee Name</th>
                                    <th>Sname</th>
                                    <th>Full Name</th>
                                    <th>GSTIN No.</th>
                                    <th>Emails</th>
                                    <th>Phone</th>
                                    <th>Order Status</th>
                                    <th class="">Fabric Status</th>
                                    <th class="">Edits</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @forelse ($orders as $od)
                                    <tr>
                                        <td>#<a href="/order-edit/{{ $od->id }}">{{ $od->order_id }}</a></td>
                                        <td>{{ $od->cname }}</td>
                                        <td class="text-ov">{{ $od->cadd }}</td>
                                        <td class="text-ov">{{ $od->cgstin }}</td>
                                        <td>{{ $od->email }}</td>
                                        <td>{{ $od->phone }}</td>

                                        <td>
                                            @if ($od->status == 2)
                                                <span class="text-danger">On hold</span>
                                            @elseif ($od->status == 1)
                                                <span class="text-warning">Processing</span>
                                            @elseif ($od->status == 3)
                                                <span class="text-warning">Measurement Pending</span>
                                            @elseif ($od->status == 4)
                                                <span class="text-success">Measurement Done</span>
                                            @elseif ($od->status == 5)
                                                <span class="text-success">Processing Done</span>
                                            @elseif ($od->status == 6)
                                                <span class="text-warning">Dispatching Pending</span>
                                            @elseif ($od->status == 7)
                                                <span class="text-warning">Ready for dispatch payment pending</span>
                                            @elseif ($od->status == 8)
                                                <span class="text-success">Ready for dispatch</span>
                                            @elseif ($od->status == 9)
                                                <span class="text-success">Dispatched</span>
                                            @elseif ($od->status == 10)
                                                <span class="text-danger">Cancelled</span>
                                            @else
                                                <span class="text-warning">Pending</span>
                                            @endif
                                        </td>

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
                                                    @if ($od->fabrics_status == 2)
                                                        <form action="/m-done/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Measurement Done
                                                            </button>
                                                        </form>
                                                        <form action="/m-pending/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Measurement Pending
                                                            </button>
                                                        </form>
                                                        <form action="/p-done/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Processing Done
                                                            </button>
                                                        </form>
                                                        <form action="/d-pending/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Dispatching Pending
                                                            </button>
                                                        </form>
                                                        <form action="/p-pending/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Ready for dispatch payment pending
                                                            </button>
                                                        </form>
                                                        <form action="/ready-dispatch/{{ $od->id }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Ready for dispatch
                                                            </button>
                                                        </form>
                                                        <form action="/dispatch/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Dispatched
                                                            </button>
                                                        </form>
                                                    @elseif ($od->fabrics_status == 0)
                                                        <span class="text-center">
                                                            Waiting for fabric availability
                                                        </span>
                                                    @elseif ($od->fabrics_status == 1)
                                                        <span class="text-center">
                                                            Fabric is not available for this order
                                                        </span>
                                                    @elseif ($od->fabrics_status == 3)
                                                        <span class="text-center">Order is on hold</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No records found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        $('#poimage').click(function(e) {
            e.preventDefault();
            $('#poimg').click();
        });
    </script>
@endsection


{{--
@section('customJs')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#assign', function(e) {
                e.preventDefault();
                var id = $('#orderId').val();

                var data = {
                    'userId': $('#userID').val(),
                    'userName': $('#userName').val(),
                };

                $('#assign').prop("disabled", true).val('wait...');


                $.ajax({
                    type: "post",
                    url: "/assign/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#errstatus').html("");
                            $('#errstatus').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errstatus').append('<li>' + err_values +
                                    '</li>').delay(300).fadeOut(2000);
                            });
                        } else if (response.status == 404) {
                            $('#errstatus').html("");
                            $('#sStatus').addClass('alert alert-danger');
                            $('#sStatus').text(response.message);
                        } else {
                            $('#errstatus').html("");
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-success');
                            $('#sStatus').text(response.message).delay(300).fadeOut(2000);
                            $('#assign').prop("disabled", true).val('assigned');
                        }
                    }
                });
            });
        });
    </script>
@endsection --}}
