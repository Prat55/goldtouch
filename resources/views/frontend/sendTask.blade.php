@extends('frontend.includes.app')
@section('title', 'Users Information')

@section('content')
    @if (Auth::user()->role === 2)
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h2 class="text-center">Task Manager</h2>
                                <div class="col-md-12">
                                    <div id="errstatus">

                                    </div>
                                    <div id="sStatus">

                                    </div>
                                </div>

                                <div class="form-group m-1">
                                    <label for="taskName">Order Id</label>
                                    <select class="form-control" name="taskOrderId" id="taskOrderId" required>
                                        <option>--select order--</option>
                                        @forelse ($orders as $order)
                                            @if ($order->fabrics_status == 1)
                                                <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                                            @endif
                                        @empty
                                            <option>No Orders</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group m-2">
                                    <label for="taskDescription">Task Due</label>
                                    <input type="date" name="tdue" id="tdue" class="form-control" required>
                                </div>
                                <div class="form-group m-2">
                                    <label for="taskPriority">Select User</label>
                                    <select class="form-control" name="taskUser" id="taskUser" required>
                                        <option>--select user--</option>
                                        @foreach ($users as $user)
                                            @if ($user->role == 1)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-sm btn-primary m-2 taskSubmit">Submit</button> --}}
                                <input type="button" value="Send" class="btn btn-sm btn-primary m-2 taskSubmit">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif
@endsection

@section('customJs')
    <script>
        $(document).on('click', '.taskSubmit', function(e) {
            e.preventDefault();

            var order_id = $('#taskOrderId').val();
            var data = {
                'tdue': $('#tdue').val(),
                'taskUser': $('#taskUser').val(),
            };

            $('.taskSubmit').prop("disabled", true).val('Sending');

            $.ajax({
                type: "post",
                url: "send-task/" + order_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#errstatus').html("");
                        $('#errstatus').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#errstatus').append('<li>' + err_values + '</li>').delay(500)
                                .fadeOut(3000);
                        });
                        $('.taskSubmit').prop("disabled", false).val('Resend');
                    } else {
                        $('#errstatus').html("");
                        $('#sStatus').addClass('alert alert-success');
                        $('#sStatus').text(response.message).delay(500).fadeOut(3000);
                        $('.taskSubmit').prop("disabled", false).val('Send');
                    }
                }
            });
        });
    </script>
@endsection
