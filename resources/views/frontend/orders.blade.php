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
                                    <i class="fas fa-user text-white bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0  font-w600">{{ $assignOrdersCount }}</h2>
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
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>GSTIN No.</th>
                                    <th>Emails</th>
                                    <th>Phone</th>
                                    @if (Auth::user()->role == 2)
                                        <th>Status</th>
                                        <th class="">Edits</th>
                                    @else
                                        <th class="">Fabric Status</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @forelse ($orders as $od)
                                    <tr>
                                        <td>#{{ $od->order_id }}</td>
                                        <td>{{ $od->cname }}</td>
                                        <td class="text-ov">{{ $od->cadd }}</td>
                                        <td class="text-ov">{{ $od->cgstin }}</td>
                                        <td>{{ $od->email }}</td>
                                        <td>{{ $od->phone }}</td>
                                        @if (Auth::user()->role == 2)
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
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Available
                                                            </button>
                                                        </form>
                                                        <form action="/reject/{{ $od->id }}" method="POST">
                                                            <button type="submit" class="dropdown-item text-black">
                                                                Not Available
                                                            </button>
                                                        </form>
                                                        <input type="hidden" name="cid" id="cid"
                                                            value="{{ $od->u_id }}">
                                                        <input type="hidden" name="cname" id="cname"
                                                            value="{{ $od->cname }}">
                                                        <input type="hidden" name="email" id="email"
                                                            value="{{ $od->email }}">
                                                        <button type="button"
                                                            class="sendMail dropdown-item text-black">Send
                                                            Mail</button>

                                                    </div>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                @if ($od->fabrics_status == 1)
                                                    <span class="text-danger">Not Available</span>
                                                @elseif ($od->fabrics_status == 2)
                                                    <span class="text-success">Available</span>
                                                @else
                                                    <span class="text-warning">Pending</span>
                                                @endif
                                            </td>
                                        @endif
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
        $(document).ready(function() {
            $(document).on('click', '.sendMail', function(e) {
                e.preventDefault();

                var data = {
                    'cid': $('#cid').val(),
                    'cname': $('#cname').val(),
                    'email': $('#email').val(),
                };

                $('.sendMail').html("sending...");

                $.ajax({
                    type: "POST",
                    url: "send-mail",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-danger').delay(1000).fadeOut(
                                2000);
                            $.each(response.errors, function(key, err_values) {
                                $('#sStatus').append('<p>' + err_values + '</p>');
                            });
                        } else {
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-success').delay(1000).fadeOut(
                                2000);
                            $('#sStatus').text(response.message);
                            $('.sendMail').html("Send Mail");
                        }
                    }

                });

            });

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
@endsection
