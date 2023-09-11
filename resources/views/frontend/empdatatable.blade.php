<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Gold Touch | Employee Entry</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="{{ asset('user-assets/xhtml/image/png') }}" href="images/favicon.png">

    <link href="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('user-assets/xhtml/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">

                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    {{-- <a href="/"><img class="logo-light"
                                            src="{{ asset('user-assets/xhtml/images/logo-full.png') }}"
                                            alt=""></a>
                                    <a href="/"><img class="logo-dark"
                                            src="{{ asset('user-assets/xhtml/images/logo-white-full.png') }}"
                                            alt=""></a> --}}
                                </div>
                                <center>
                                    <h3>Gold Touch</h3>
                                    <h4 class="text-danger">Enter Employees List</h4>
                                </center>
                                <div class="container">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal"
                                        data-target="#eModal">
                                        Add
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="eModal" tabindex="-1" role="dialog"
                                        aria-labelledby="eModalCenterTitle" aria-hidden="true" aria-modal="hide">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Employees Details
                                                        Fill up Form
                                                    </h5>

                                                    {{-- <button type="button" class="close btn btn-sm btn-danger"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button> --}}
                                                </div>

                                                <div class="modal-body">

                                                    <label for="" class="mt-1">Token Number</label>
                                                    <input type="text" name="tokenNo" id="tokenNo"
                                                        class="form-control">
                                                    <label for="" class="mt-1">Serial Name</label>
                                                    <input type="text" name="sname" id="sname"
                                                        class="form-control">
                                                    <label for="" class="mt-1">Full Name</label>

                                                    <input type="text" name="fullName" id="fullName"
                                                        class="form-control">
                                                    <label for="" class="mt-1">Category</label>
                                                    <input type="text" name="category" id="category"
                                                        class="form-control">
                                                    <label for="" class="mt-1">Set Order</label>
                                                    <input type="number" name="setOrder" id="setOrder"
                                                        class="form-control">

                                                    <select name="status" id="status" class="form-control mt-2">
                                                        <option value="MEASURMENT DONE">MEASURMENT DONE</option>
                                                        <option value="MEASURMENT PENDING">MEASURMENT PENDING
                                                        </option>
                                                        <option value="PROCESSING DONE">PROCESSING DONE</option>
                                                        <option value="DIPSATCHING PENDING">DIPSATCHING PENDING
                                                        </option>
                                                        <option value="READY FOR DISPATCH PAYMENT PENDING">READY
                                                            FOR DISPATCH PAYMENT PENDING
                                                        </option>
                                                        <option value="REDY FOR DISPATCH">REDY FOR DISPATCH
                                                        </option>
                                                        <option value="DISPATCHED">DISPATCHED</option>
                                                    </select>
                                                    <ul id="errstatus"></ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-sm btn-primary saveData">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div id="sStatus" class="mt-2 mb-2">

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr No.</th>
                                                    <th scope="col">Token Number</th>
                                                    <th scope="col">SName</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Sets Order</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td>1</td>
                                                    <td>16516-1SADD</td>
                                                    <td>SRB</td>
                                                    <td>Sagar Bhanushali</td>
                                                    <td>Staff</td>
                                                    <td>2</td>
                                                    <td>Measurnment Done</td>
                                                    <td></td>
                                                    <td><button type="button" class="edit btn"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>&nbsp;&nbsp;
                                                        <button type="button" class="delete btn"><i
                                                                class="fa-regular fa-trash-can"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>16516-1SADD</td>
                                                    <td>SRB</td>
                                                    <td>Sagar Bhanushali</td>
                                                    <td>Staff</td>
                                                    <td>2</td>
                                                    <td>Measurnment Done</td>
                                                    <td></td>
                                                    <td><button type="button" class="edit btn"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>&nbsp;&nbsp;
                                                        <button type="button" class="delete btn"><i
                                                                class="fa-regular fa-trash-can"></i></button>
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('user-assets/xhtml/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/custom.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/demo.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/styleSwitcher.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            fetchEmpData()

            function fetchEmpData() {
                $.ajax({
                    type: "GET",
                    url: "/fetchdata",
                    dataType: "json",
                    success: function(response) {
                        console.log(response.employees);
                        $.each(response.empdetails, function(key, item) {
                            $('tbody').append(
                                '<tr>\
                                    <td>' + item.id + '</td>\
                                    <td>' + item.tokenNo + '</td>\
                                    <td>' + item.sname + '</td>\
                                    <td>' + item.fullName + '</td>\
                                    <td>' + item.category + '</td>\
                                    <td>' + item.setOrder + '</td>\
                                    <td>' + item.status + '</td>\
                                    <td></td>\
                                    <td><button type="button" value=" ' + item.id +
                                ' " class="edit btn"><i class="fa-solid fa-pen-to-square"></i></button>&nbsp;&nbsp;<button type="button" value="' +
                                item.id +
                                '" class="delete btn"><i class="fa-regular fa-trash-can"></i></button></td></tr>'
                            );
                        });
                    }
                });
            }

            $(document).on('click', '.saveData', function(e) {
                e.preventDefault();

                var data = {
                    'tokenNo': $('#tokenNo').val(),
                    'sname': $('#sname').val(),
                    'fullName': $('#fullName').val(),
                    'category': $('#category').val(),
                    'setOrder': $('#setOrder').val(),
                    'status': $('#status').val(),
                };

                // console.log(data);

                $.ajax({
                    type: "POST",
                    url: "/submited",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {

                            $('#errstatus').html("");
                            $('#errstatus').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errstatus').append('<li>' + err_values + '</li>');
                            });
                        } else {
                            $('#errstatus').html("");
                            $('#sStatus').addClass('alert alert-success');
                            $('#sStatus').text(response.message)
                            $('#eModal').modal('hide');
                            $('#eModal .modal-body').find('input').val("");
                        }
                    }
                });
            });

        });
    </script>
</body>

</html>
