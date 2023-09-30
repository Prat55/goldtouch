@extends('frontend.includes.app')
@section('title', 'Make Order')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
                <h2 class="mb-3 me-auto">Order</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript: void();">Order</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 warningBox2">
                @include('frontend.message')
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/order-update/{{ $order->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER NAME</label>
                                            <input type="text" class="form-control" name="cname"
                                                value="{{ $order->cname }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER ADD</label>
                                            <input type="text" class="form-control" name="cadd"
                                                value="{{ $order->cadd }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER GSTIN</label>
                                            <input type="text" class="form-control" name="cgstin"
                                                value="{{ $order->cgstin }}" readonly>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">STYLE REF</label>
                                            <input type="text" class="form-control" name="styleref"
                                                value="{{ $order->cstyle_ref }}" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PO NUMBER</label>
                                            <input type="text" class="form-control" name="pono"
                                                value="{{ $order->ponumber }}" required>
                                        </div>
                                        @if ($order->poimg != null)
                                            <div class="mb-3 col-md-6" id="poimage">
                                                <img src="/poimg/{{ $order->poimg }}" alt="Purchase order number"
                                                    width="400px" height="300px">
                                            </div>
                                        @endif
                                        <div class="mb-3 col-md-6 {{ $order->poimg == null ? '' : 'd-none' }}">
                                            <label class="form-label">PO COPY UPLOAD</label>
                                            <input type="file" class="form-control" name="poimg" id="poimg">
                                            <input type="text" value="{{ $order->poimg }}" name="oldpoimg">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 1</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtaker1" class="form-control"
                                                        style="width: 100%" placeholder="Enter measurement taker name"
                                                        value="{{ $order->mtaker1 }}" required />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mtakerDate1"
                                                        value="{{ $order->mtakerDate1 }}" class="form-control"
                                                        style="width: 100%" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 2</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtakerDate2" class="form-control"
                                                        style="width: 100%" value="{{ $order->mtaker2 }}"
                                                        placeholder="Enter measurement taker name (optional)" />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mdatetime2" class="form-control"
                                                        style="width: 100%" value="{{ $order->mtakerDate2 }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control mt-1"
                                                        placeholder="Enter Email Id 1" name="email1"
                                                        value="{{ $order->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Phone</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Phone Number 1" name="phone1"
                                                        value="{{ $order->phone }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
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
        $('#poimage').click(function(e) {
            e.preventDefault();
            $('#poimg').click();
        });
    </script>
@endsection
