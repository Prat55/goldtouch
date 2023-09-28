@extends('frontend.includes.app')
@section('title', 'Calendar')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Calendar</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-xl-3 col-xxl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-intro-title">Calendar</h4>

                            <div class="">
                                <div id="external-events" class="my-3">
                                    <p>Drag and drop your event or click in the calendar</p>
                                    <div class="external-event btn-primary light" data-class="bg-primary"><i
                                            class="fa fa-move"></i><span>New Theme Release</span></div>
                                    <div class="external-event btn-warning light" data-class="bg-warning"><i
                                            class="fa fa-move"></i>My Event
                                    </div>
                                    <div class="external-event btn-danger light" data-class="bg-danger"><i
                                            class="fa fa-move"></i>Meet manager</div>
                                    <div class="external-event btn-info light" data-class="bg-info"><i
                                            class="fa fa-move"></i>Create New theme</div>
                                    <div class="external-event btn-dark light" data-class="bg-dark"><i
                                            class="fa fa-move"></i>Project Launch</div>
                                    <div class="external-event btn-secondary light" data-class="bg-secondary"><i
                                            class="fa fa-move"></i>Meeting</div>
                                </div>
                                <!-- checkbox -->
                                <div class="checkbox form-check checkbox-event custom-checkbox pt-3 pb-5">
                                    <input type="checkbox" class="form-check-input" id="drop-remove">
                                    <label class="form-check-label" for="drop-remove">Remove After Drop</label>
                                </div>
                                <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#add-category"
                                    class="btn btn-primary btn-event w-100">
                                    <span class="align-middle"><i class="ti-plus me-2"></i></span> Create New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- BEGIN MODAL -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                    event</button>

                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                    data-bs-toggle="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add a category</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label form-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text"
                                                name="category-name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label form-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..."
                                                name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light save-category"
                                    data-bs-toggle="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');

                        $.ajax({
                            url: "",
                            type: "POST",
                            dataType: 'json',
                            data: {
                                title,
                                start_date,
                                end_date
                            },
                            success: function(response) {
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.title,
                                    'start': response.start,
                                    'end': response.end,
                                    'color': response.color
                                });

                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors
                                        .title);
                                }
                            },
                        });
                    });
                },
                editable: true,
                eventDrop: function(event) {
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');

                    $.ajax({
                        url: "" + '/' + id,
                        type: "PATCH",
                        dataType: 'json',
                        data: {
                            start_date,
                            end_date
                        },
                        success: function(response) {
                            swal("Good job!", "Event Updated!", "success");
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },
                eventClick: function(event) {
                    var id = event.id;

                    if (confirm('Are you sure want to remove it')) {
                        $.ajax({
                            url: "  " + '/' + id,
                            type: "DELETE",
                            dataType: 'json',
                            success: function(response) {
                                $('#calendar').fullCalendar('removeEvents', response);
                                // swal("Good job!", "Event Deleted!", "success");
                            },
                            error: function(error) {
                                console.log(error)
                            },
                        });
                    }

                },
                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                        'second').utcOffset(false), 'day');
                },



            });


            $("#bookingModal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });

            $('.fc-event').css('font-size', '13px');
            $('.fc-event').css('width', '20px');
            $('.fc-event').css('border-radius', '50%');


        });
    </script>
@endsection
