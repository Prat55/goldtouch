@extends('frontend.includes.app')
@section('title', 'Users Information')

@section('content')
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
                                            <label for="cusname">Name</label>
                                            <input class="form-control" type="text" name="cusname" id="cusname"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-1">
                                            <label for="description">Task Description</label>
                                            <input class="form-control" type="text" name="description" id="description"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group m-1">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="1">Under Process</option>
                                                <option value="2">Success</option>
                                                <option value="3">Cancelled</option>
                                                <option value="4">Hold</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-1">
                                            <label for="due_date">Task Due Date</label>
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
                                            <th>Customer Name</th>
                                            <th>Task Description</th>
                                            <th>Status</th>
                                            <th>Task Due Date</th>
                                            <th>Edits</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @forelse ($tasks as $tk)
                                            <tr>
                                                <td>{{ $tk->customer_name }}</td>
                                                <td>{{ $tk->description }}</td>
                                                <td>
                                                    @if ($tk->status == 1)
                                                        <span class="text-warning">On Process</span>
                                                    @elseif ($tk->status == 2)
                                                        <span class="text-success">Finished</span>
                                                    @elseif ($tk->status == 3)
                                                        <span class="text-danger">Cancelled</span>
                                                    @elseif ($tk->status == 4)
                                                        <span class="text-warning">Hold</span>
                                                    @endif
                                                </td>
                                                <td>{{ $tk->due_date }}</td>
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
                                                            @if ($tk->status == 1)
                                                                <form action="/finished/{{ $tk->id }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-black">
                                                                        Finished
                                                                    </button>
                                                                </form>
                                                                <form action="/cancelled/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-black">
                                                                        Cancelled
                                                                    </button>
                                                                </form>
                                                                <form action="/onhold/{{ $tk->id }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-black">
                                                                        Hold
                                                                    </button>
                                                                </form>
                                                            @elseif ($tk->status == 2)
                                                                <form action="/process/{{ $tk->id }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item text-black">
                                                                        On Process
                                                                    </button>
                                                                </form>
                                                                <form action="/cancelled/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        Cancelled
                                                                    </button>
                                                                </form>
                                                                <form action="/onhold/{{ $tk->id }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        Hold
                                                                    </button>
                                                                </form>
                                                            @elseif ($tk->status == 3)
                                                                <form action="/process/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        On Process
                                                                    </button>
                                                                </form>
                                                                <form action="/onhold/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        Hold
                                                                    </button>
                                                                </form>
                                                                <form action="/finished/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        Finished
                                                                    </button>
                                                                </form>
                                                            @elseif ($tk->status == 4)
                                                                <form action="/finished/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        Finished
                                                                    </button>
                                                                </form>
                                                                <form action="/process/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">On
                                                                        Process
                                                                    </button>
                                                                </form>
                                                                <form action="/cancelled/{{ $tk->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-black">
                                                                        Cancelled
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="5" class="text-center">No tasks found!</td>
                                        @endforelse
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
@endsection

@section('customJs')

@endsection
