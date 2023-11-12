@extends('layouts.master')
@section('css')
<!-- Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<!-- Slect2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Site</h4>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
                        <!--Row-->
                        @if(Session::has('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
						<div class="row row-deck">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">File Export</h3>
										<div class="card-options">
											<div class="btn-group ml-5 mb-0">
                                                <a class="btn btn-primary" href="{{ route('site.create') }}"><i class="fa fa-plus mr-2"></i>Add New Site</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
                                            <table id="example" class="table table-bordered text-nowrap ">
                                                <thead>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">License Key</th>
                                                    <th class="border-bottom-0">Store Name</th>
                                                    <th class="border-bottom-0">Store Address</th>
                                                    <th class="border-bottom-0">Region</th>
                                                    <th class="border-bottom-0">Cfc</th>
                                                    <th class="border-bottom-0">Nbo</th>
                                                    <th class="border-bottom-0">Edit</th>
                                                    <th class="border-bottom-0">Delete</th>
                                                </thead>
                                                <tbody>
                                                    @if($sites->isNotEmpty())
                                                        @foreach($sites as $site)
                                                            <tr class="bold">
                                                                <td>{{$site->id}}</td>
                                                                <td>{{$site->license_key}}</td>
                                                                <td>{{$site->store_name}}</td>
                                                                <td>{{$site->store_address}}</td>
                                                                <td>{{$site->region_id}}</td>
                                                                <td>{{$site->cfc_id}}</td>
                                                                <td>{{$site->nbo_id}}</td> 
                                                                <td><a class="btn btn-primary btn-xs" href="{{ route('site.edit', ['id' => $site->id]) }}" ><span class="fa fa-pencil"></span></a></td>
                                                                <td>
                                                                    <form action="{{ route('site.destroy', ['id' => $site->id]) }}" method="delete">
                                                                        {{csrf_field()}}
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="8">No one there!</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
						<!--End row-->
					</div>
				</div><!-- end app-content-->
			</div>
@endsection
@section('js')
<!-- Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/datatables.js')}}"></script>
<!-- Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
@endsection
