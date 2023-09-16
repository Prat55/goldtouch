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

            <div class="col-md-12 statusBox">
                <div id="sStatus" class="status">

                </div>
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

                    <a href="{{ route('customers') }}" class="btn btn-warning mb-3">
                        <i class="fas fa-redo-alt"></i>
                    </a>

                </div>
            </div>

            <div class="col-xl-12">
                <div class="table-responsive fs-14">
                    <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table" id="example5">
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
                                <th>Send Mail</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
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
                                        <td>
                                            <input type="hidden" name="cid" id="cid"
                                                value="{{ $customer->id }}">
                                            <input type="hidden" name="cname" id="cname"
                                                value="{{ $customer->cname }}">
                                            <input type="hidden" name="email" id="email"
                                                value="{{ $customer->email }}">
                                            <button type="button" class="sendMail btn btn-sm btn-primary">Send
                                                Mail</button>

                                        </td>
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

@section('customJs')
    <script>
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
                        $('#sStatus').addClass('alert alert-danger').delay(1000).fadeOut(2000);
                        $.each(response.errors, function(key, err_values) {
                            $('#sStatus').append('<p>' + err_values + '</p>');
                        });
                    } else {
                        $('#sStatus').html("");
                        $('#sStatus').addClass('alert alert-success').delay(1000).fadeOut(2000);
                        $('#sStatus').text(response.message);
                        $('.sendMail').html("Send Mail");
                    }
                }

            });

        });
    </script>
@endsection
