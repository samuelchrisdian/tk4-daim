@extends('layouts.app')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="shop-breadcrumb">

                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Dashboard Item</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="uil uil-estate"></i>Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard Item</li>
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
                                <h4>Item List</h4>
                            </div>
                            <div id="filter-form-container"></div>
                            <div class="ct-chart ct-golden-section"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal-activate modal fade show" id="modal-activate" tabindex="-1" order="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" order="document">
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
<div class="modal-deactivate modal fade show" id="modal-deactivate" tabindex="-1" order="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" order="document">
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
<div class="modal-delete modal fade show" id="modal-delete" tabindex="-1" order="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-info" order="document">
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
    <?php
    //label
    $resultlabel = array();
    foreach ($DaftarBE as $key => $data) {
        $resultlabel[] = "'" . trim($data->name, " \t\n\r\0\x0B") . "'";
    }
    $resultlbl = implode(",", $resultlabel);

    //BE
    $resultbe = array();
    foreach ($DaftarBE as $key => $data) {
        $resultbe[] = trim($data->BE, " \t\n\r\0\x0B");
    }
    $resultBE = implode(",", $resultbe);

    //parameter
    $resultparam = array();
    foreach ($DaftarBE as $key => $data) {
        $resultparam[] = trim($data->parameter, " \t\n\r\0\x0B");
    }
    $resultprm = implode(",", $resultparam);
    ?>

    new Chartist.Bar('.ct-chart', {
        labels: [<?= $resultlbl; ?>],
        series: [
            [<?= $resultBE; ?>],
            [<?= $resultprm; ?>]
        ]
    }, {
        seriesBarDistance: 5,
        reverseData: false,
        horizontalBars: true,
        //stackBars: true,
        axisY: {
            offset: 200,
        }
    }).on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 20px'
            });
        }
    });
    
    $("#data-table").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "excel", "pdf"]
    }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');

    $(document).on("click", "#activate-item", function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        let url = "{{ route('transaction-order-activate', ':id') }}";
        url = url.replace(':id', id);

        $('#modal-activate-description').html(name);
        $('#modal-activate-form').attr('action', url);
    });

    $(document).on("click", "#deactivate-item", function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        let url = "{{ route('transaction-order-deactivate', ':id') }}";
        url = url.replace(':id', id);

        $('#modal-deactivate-description').html(name);
        $('#modal-deactivate-form').attr('action', url);
    });

    $(document).on("click", "#delete-item", function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        let url = "{{ route('transaction-order-delete', ':id') }}";
        url = url.replace(':id', id);

        $('#modal-delete-description').html(name);
        $('#modal-delete-form').attr('action', url);
    });
</script>
@endsection