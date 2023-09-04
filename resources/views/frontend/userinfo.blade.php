@extends('frontend.includes.app')
@section('title', 'Users Information')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head ">
                <h2 class="mb-3 me-auto">Users Information</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users Information</a></li>
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
                                    <h2 class="mb-0  font-w600">{{ $users->count() }}</h2>
                                    <p class="mb-0 font-w500">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="d-flex flex-wrap">
                        {{-- <a href="javascript:void(0);" class="btn btn-primary me-3 mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">+ New Tranasactions</a> --}}

                        <div class="table-search mb-3 pe-3">
                            <div class="input-group search-area">
                                <input type="text" class="form-control" placeholder="Search customer name here">
                                <span class="input-group-text"><a href="javascript:void(0)"><i
                                            class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        {{-- <div class="newest mb-3 me-3">
                            <select class="form-control default-select ms-0 border">
                                <option>Newest</option>
                                <option>Oldest</option>
                                <option>Newest</option>
                            </select>
                        </div> --}}
                        {{-- <a href="javascript:void(0);" class="btn btn-primary me-3 mb-3"><i
                                class="fas fa-calendar me-3"></i>Filter</a> --}}
                        <a href="javascript:void(0);" class="btn btn-warning mb-3"><i class="fas fa-redo-alt"></i></a>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="table-responsive fs-14">
                        <table class="table display mb-4 dataTablesCard order-table shadow-hover  card-table"
                            id="example5">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll">
                                            </label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Emails</th>
                                    <th>Role</th>
                                    @if (Auth::guard('web')->user()->role == 2)
                                        <th class="">Edit</th>
                                        <th class="">Delete</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $od)
                                    <tr>
                                        <td>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customCheckBox1">
                                                <label class="form-check-label" for="customCheckBox1">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $od->name }}</td>
                                        <td>{{ $od->email }}</td>
                                        <td>{{ $od->role == 2 ? 'Admin' : 'User' }}</td>
                                    </tr>
                                @endforeach
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
