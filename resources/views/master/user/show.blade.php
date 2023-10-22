@extends('layouts.app')

@section('main-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="shop-breadcrumb">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">User Details</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="uil uil-estate"></i>Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('master-user-index') }}"><i class="uil uil-estate"></i>Master User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="products mb-30">
    <div class="container-fluid">
        <!-- Start: Card -->
        <div class="card product-details h-100 border-0">
            <div class="product-item p-sm-50 p-20">
                <div class="row">
                    <div class="b-normal-b mb-25 pb-sm-35 pb-15 mt-lg-0 mt-15">
                        <div class="product-item__body">
                            <!-- Start: User Title -->
                            <div class="product-item__title">
                                <a href="#">
                                    <h1 class="card-title">
                                        {{ $user->name }}
                                    </h1>
                                </a>
                            </div>
                            <!-- End: User Title -->
                            <div class="product-item__content text-capitalize">
                                <!-- End: User Brand -->
                                <!-- Start: User Description -->
                                <p class=" product-deatils-pera">{{ $user->description }}</p>
                                <!-- End: User Description -->

                                <!-- Start: User Stock -->
                                <div class="product-details__availability">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p>Email:</p>
                                        </div>
                                        <div class="col-md-10" style="text-transform: none;">
                                            {{ $user->email }}
                                        </div>
                                        <div class="col-md-2">
                                            <p>Name:</p>
                                        </div>
                                        <div class="col-md-10" style="text-transform: none;">
                                            {{ $user->name }}
                                        </div>
                                        <div class="col-md-2">
                                            <p>Role:</p>
                                        </div>
                                        <div class="col-md-10" style="text-transform: none;">
                                            {{ $user->role->name }}
                                        </div>
                                    </div>
                                </div>
                                <!-- End: User Selections -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Card -->
    </div>

</div>
@endsection