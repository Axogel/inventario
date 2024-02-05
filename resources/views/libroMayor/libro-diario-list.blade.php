@extends('layouts.master')
@section('css')
<!-- Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<!-- Slect2 css -->
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Libro diario</h4>
    </div>
</div>
<!--End Page header-->
@endsection
@section('content')

@php
use App\Models\LibroMayor;
@endphp
<!--Row-->
@if(Session::has('success'))
<div class="alert alert-{{ session('success.alert') }} alert-dismissible fade show" role="alert">
    {{ session('success.message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row row-deck">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered text-nowrap key-buttons" style="border-color:#eff0f6;">
                        <thead style="border-color:#eff0f6;">
                            <th class="border-bottom-0">Concepto</th>
                            <th class="border-bottom-0">Debe</th>
                            <th class="border-bottom-0">Haber</th>
                            <th class="border-bottom-0">Fecha de Creación</th>
                            <th style="border-color:#eff0f6;"></th>
                        </thead>
                        <tbody id="contentTable">
                            @foreach($resultados as $resultado)
                            <tr class="bold producto-row">
                                <td>{{ $resultado->concepto }}</td>
                                <td>
                                    @if(is_string($resultado->debe))
                                        {{ '$' . implode(', $', json_decode($resultado->debe)) }}
                                    @else
                                        {{ '$' . implode(', $', $resultado->debe) }}
                                    @endif
                                </td>
                                <td>
                                    @if(is_string($resultado->haber))
                                        {{ '$' . implode(', $', json_decode($resultado->haber)) }}
                                    @else
                                        {{ '$' . implode(', $', $resultado->haber) }}
                                    @endif
                                </td>
                                <td>{{ $resultado->fecha }}</td>
                                <td></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.js') }}"></script>
<!-- Select2 js -->
<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
@endsection
