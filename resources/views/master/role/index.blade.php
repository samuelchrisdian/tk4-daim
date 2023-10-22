@extends('layouts.app')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="shop-breadcrumb">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Master Role</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="uil uil-estate"></i>Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Master Role</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p>{{ session()->get('message') }}</p>
            <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                <img src="{{ asset('img/svg/x.svg') }}" alt="x" class="svg" aria-hidden="true">
            </button>
        </div>
    </div>
    @endif
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
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                        <div class="table-responsive">
                            <div class="adv-table-table__header mb-4">
                                <h4>Role List</h4>
                                <div class="adv-table-table__button">
                                    <a href="{{ route('master-role-add') }}" class="btn px-15 btn-primary">
                                        <i class="las la-plus fs-16"></i>Create Role</a>
                                </div>
                            </div>
                            <div id="filter-form-container"></div>
                            <table id="data-table" class="table mb-0 mt-8 table-borderless">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">#</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">name</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($role as $key => $value)
                                    <tr>
                                        <td>
                                            <div class="userDatatable-content">{{ $key + 1 }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="userDatatable-inline-title">
                                                    <a href="#" class="text-dark fw-500">
                                                        <h6>{{ $value->name }}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                    <a href="{{ route('master-role-show', $value->item_id) }}" class="view">
                                                        <i class="uil uil-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('master-role-edit', $value->item_id) }}" class="edit">
                                                        <i class="uil uil-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a type="button" class="remove" id="delete-item" data-bs-toggle="modal" data-bs-target="#modal-delete" data-id="{{ $value->item_id }}" data-name="{{ $value->name }}">
                                                        <i class="uil uil-trash-alt"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal-activate modal fade show" id="modal-activate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <form method="POST" id="modal-activate-form" action="">
                @csrf
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon warning">
                            <img src="{{ asset('img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                        </div>
                        <div class="modal-info-text">
                            <h6>Do you Want to activate these item?</h6>
                            <p id="modal-activate-description"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-sm" data-bs-dismiss="modal">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-deactivate modal fade show" id="modal-deactivate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <form method="POST" id="modal-deactivate-form" action="">
                @csrf
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon warning">
                            <img src="{{ asset('img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                        </div>
                        <div class="modal-info-text">
                            <h6>Do you Want to deactivate these item?</h6>
                            <p id="modal-deactivate-description"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-sm" data-bs-dismiss="modal">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-delete modal fade show" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" role="document">
        <div class="modal-content">
            <form method="POST" id="modal-delete-form" action="">
                @csrf
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon warning">
                            <img src="{{ asset('img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                        </div>
                        <div class="modal-info-text">
                            <h6>Do you Want to delete these item?</h6>
                            <p id="modal-delete-description"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-sm" data-bs-dismiss="modal">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $("#data-table").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "excel", "pdf"]
    }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');

    $(document).on("click", "#activate-item", function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        let url = "{{ route('master-role-activate', ':id') }}";
        url = url.replace(':id', id);

        $('#modal-activate-description').html(name);
        $('#modal-activate-form').attr('action', url);
    });

    $(document).on("click", "#deactivate-item", function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        let url = "{{ route('master-role-deactivate', ':id') }}";
        url = url.replace(':id', id);

        $('#modal-deactivate-description').html(name);
        $('#modal-deactivate-form').attr('action', url);
    });

    $(document).on("click", "#delete-item", function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        let url = "{{ route('master-role-delete', ':id') }}";
        url = url.replace(':id', id);

        $('#modal-delete-description').html(name);
        $('#modal-delete-form').attr('action', url);
    });
</script>
@endsection