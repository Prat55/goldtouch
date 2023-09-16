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
                                    <h4 class="text-danger">Enter Order Details</h4>
                                </center>
                                <div class="container">

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

            $(document).on('click', '.edit', function(e) {
                e.preventDefault();

                var id = $(this).val();
                // alert(id);

                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/edit-emp/" + id,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-danger');
                            $('#sStatus').text(response.message);
                        } else {
                            $('#etokenNo').val(response.employee.tokenNo);
                            $('#esname').val(response.employee.sname);
                            $('#efullName').val(response.employee.fullName);
                            $('#ecategory').val(response.employee.category);
                            $('#esetOrder').val(response.employee.setOrder);
                            $('#estatus').val(response.employee.status);
                        }
                    }
                });

            });

            $(document).on('click', '.updateData', function(e) {
                e.preventDefault();
                var id = $('#e_id').val();

                var data = {
                    'tokenNo': $('#etokenNo').val(),
                    'sname': $('#esname').val(),
                    'fullName': $('#efullName').val(),
                    'category': $('#ecategory').val(),
                    'setOrder': $('#esetOrder').val(),
                    'status': $('#estatus').val(),
                };

                $.ajax({
                    type: "PUT",
                    url: "update-emp/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#updaterrstatus').html("");
                            $('#updaterrstatus').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#updaterrstatus').append('<li>' + err_values +
                                    '</li>');
                            });
                        } else if (response.status == 404) {
                            $('#errstatus').html("");
                            $('#sStatus').addClass('alert alert-danger');
                            $('#sStatus').text(response.message);
                        } else {
                            $('#errstatus').html("");
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-success');
                            $('#sStatus').text(response.message);
                            $('#editModal').modal('hide');
                        }
                    }
                });

            });

            $(document).on('click', '.close', function(e) {
                e.preventDefault();
                $('#editModal').modal('hide');
            });

            $(document).on('click', '.saveData', function(e) {
                e.preventDefault();

                var data = {
                    'tokenNo': $('#tokenNo').val(),
                    'sname': $('#sname').val(),
                    'fullName': $('#fullName').val(),
                    'category': $('#category').val(),
                    'setOrder': $('#setOrder').val(),
                    'status': $('#status').val(),
                    'cusid': $('#cusid').val(),

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
                            $('#sStatus').text(response.message);
                            $('#eModal').modal('hide');
                            $('#eModal .modal-body').find('input').val("");
                        }
                    }
                });
            });
        });

        $(document).on('click', '.reload', function(e) {
            location.reload();
        });
    </script>
</body>

</html>
