@extends('layouts.app')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="shop-breadcrumb">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Transaction Production</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="uil uil-estate"></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('transaction-production-index') }}"><i class="uil uil-estate"></i>Transaction Production</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Production</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Start: item page -->
            <div class="item-add global-shadow px-sm-30 py-sm-50 px-0 py-20 bg-white radius-xl w-100 mb-40">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-10">
                        <div class="mx-sm-30 mx-20 ">
                            @if(session()->has('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-content">
                                    <p>{{ session()->get('message') }}</p>
                                    <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                                        <img src="{{ asset('img/svg/x.svg') }}" alt="x" class="svg" aria-hidden="true">
                                    </button>
                                </div>
                            </div>
                            @endif
                            <!-- Start: card -->
                            <div class="card add-product p-sm-30 p-20 mb-30">
                                <div class="card-body p-0">
                                    <div class="card-header">
                                        <h6 class="fw-500">Add Production</h6>
                                    </div>
                                    <!-- Start: card body -->
                                    <div class="add-product__body px-sm-40 px-20">
                                        <!-- Start: form -->
                                        <form method="POST" action="{{ route('transaction-production-store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-20">
                                                <label for="order_id">Order</label>
                                                <select class="custom-select form-control select-arrow-none ih-medium radius-xs b-light shadow-none color-light fs-14 @error('order_id') is-invalid @enderror" id="order_id" name="order_id" aria-describedby="order_id" required>
                                                    <option selected disabled value="">Choose an order...</option>
                                                    @foreach($order as $value)
                                                    <option value="{{ $value->order_id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('order_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="item_id">Item</label>
                                                <select class="custom-select form-control select-arrow-none ih-medium radius-xs b-light shadow-none color-light fs-14 @error('item_id') is-invalid @enderror" id="item_id" name="item_id" aria-describedby="item_id" required>
                                                    <option selected disabled value="">Choose an item...</option>
                                                    @foreach($item as $value)
                                                    <option value="{{ $value->item_id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('item_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="qty">production qty</label>
                                                <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="input production qty..." value="" required>
                                                @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="lead_time">production lead time</label>
                                                <input type="number" class="form-control @error('lead_time') is-invalid @enderror" id="lead_time" name="lead_time" placeholder="input production lead time..." value="" required>
                                                @error('lead_time')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <!-- End: form -->
                                    </div>
                                    <!-- End: card body -->
                                </div>
                            </div>
                            <!-- End: card -->

                            <!-- Start: button group -->
                            <div class="button-group add-product-btn d-flex justify-content-sm-end justify-content-center mt-40">
                                <a class="btn btn-light btn-default btn-squared fw-400 text-capitalize" href="{{ route('transaction-production-index') }}">cancel
                                </a>
                                <button class="btn btn-primary btn-default btn-squared text-capitalize" type="submit">save production
                                </button>
                                </form>
                            </div>
                            <!-- End: button group -->
                        </div>
                    </div>
                    <!-- ends: col-lg-8 -->
                </div>
            </div>
            <!-- End: Production page -->
        </div>
        <!-- ends: col-lg-12 -->
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {
        $('#order_id').select2();

        $('#item_id').select2();
    });
</script>
@endsection