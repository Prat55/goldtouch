@extends('frontend.includes.app')
@section('title', 'Make Order')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Horizontal Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('makeOrder') }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER NAME</label>
                                            <input type="text" class="form-control" name="cname" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER ADD</label>
                                            <input type="text" class="form-control" name="cadd" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER GSTIN</label>
                                            <input type="text" class="form-control" name="cgstin" required>
                                        </div>

                                        {{-- <div class="mb-3 col-md-6">
                                            <label class="form-label">PO NUMBER</label>
                                            <input type="text" class="form-control" name="pnumber">
                                        </div> --}}

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">STYLE REF</label>
                                            <input type="text" class="form-control" name="styleref" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 1</label>
                                            <input type="text" class="form-control" name="mtaker1">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 2</label>
                                            <input type="text" class="form-control" name="mtaker2">
                                        </div>

                                        {{-- <div class="mb-3 col-md-6">
                                            <label class="form-label">PO COPY UPLOAD</label>
                                            <input type="text" class="form-control" name="pocopyupload">
                                        </div> --}}

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email1"
                                                required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PHONE</label>
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                name="phone1" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email2">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PHONE</label>
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                name="phone2">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email3">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PHONE</label>
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                name="phone3">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email4">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PHONE</label>
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                name="phone4">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email5">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PHONE</label>
                                            <input type="text" class="form-control" placeholder="Phone Number"
                                                name="phone5">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-sm btn-primary">Order</button>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">State</label>
                                            <select id="inputState" class="default-select form-control wide">
                                                <option selected>Choose...</option>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">
                                                Check me out
                                            </label>
                                        </div>
                                    </div> --}}
                                    {{-- <button type="submit" class="btn btn-primary">Sign in</button> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
