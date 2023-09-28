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
                            <div class="col-md-12">
                                <h2 class="text-center">Task Manager</h2>
                                <div class="col-md-12 position-relative">
                                    <div class="col-md-4 warningBox1">
                                        @include('frontend.message')
                                    </div>
                                </div>
                                <form action="add-task" method="POST">
                                    @csrf
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <div class="col-md-6">
                                            <div class="form-group m-1">
                                                <label for="taskName">Customer name</label>
                                                <input class="form-control" type="text" name="cusname" id="cusname"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-1">
                                                <label for="taskName">Task Description</label>
                                                <input class="form-control" type="text" name="description"
                                                    id="description" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <div class="col-md-6">
                                            <div class="form-group m-1">
                                                <label for="taskName">Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="1">Under Process</option>
                                                    <option value="2">Success</option>
                                                    <option value="3">Cancelled</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-1">
                                                <label for="taskName">Task Due Date</label>
                                                <input class="form-control" type="date" name="due_date" id="due_date"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" value="Add" class="btn btn-sm btn-primary m-2">
                                </form>
                            </div>

                            <div class="col-xl-12 mt-5">
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
                                                <th>Order Status</th>
                                                <th class="">Fabric Status</th>
                                                <th class="">Edits</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center">

                                        </tbody>
                                    </table>
                                    {{ $tasks->links() }}
                                </div>
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

@endsection
