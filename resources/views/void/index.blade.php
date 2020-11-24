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
								<h4 class="page-title">Voids</h4>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')

                        @if(Session::has('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

						<div class="row">
							<div class="col-12">
								<!--div-->
								<div class="card">
									<div class="card-header">
										<div class="card-title">File Export</div>
                                        <div class="card-options">
											<div class="btn-group ml-5 mb-0">
                                                <a class="btn btn-primary" data-target="#modaldemo1" data-toggle="modal" href=""><i class="fa fa-plus mr-2"></i>Add New Sale</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="">
											<div class="table-responsive">
												<table id="example" class="table table-bordered text-nowrap key-buttons">
													<thead>
														<tr>
															<th class="border-bottom-0">SID</th>
                                                    		<th class="border-bottom-0">DOB</th>
															<th class="border-bottom-0">STORE CODE</th>
															<th class="border-bottom-0">STORE NAME</th>
															<th class="border-bottom-0">CHECK</th>
                                                   		    <th class="border-bottom-0">ITEM</th>
                                                     		<th class="border-bottom-0">REASON</th>
                                                    		<th class="border-bottom-0">MANAGER</th>
                                                   			<th class="border-bottom-0">TIME</th>
                                                    		<th class="border-bottom-0">SERVER</th>
                                                    		<th class="border-bottom-0">AMOUNT</th>
                                                    		<th class="border-bottom-0">MANAGERID</th>
                                                    		<th class="border-bottom-0">SERVERID</th> 
									
														</tr>
													</thead>
													<tbody>

                                                    @if($voidxs->isNotEmpty())
                                                        @foreach($voidxs as $voidx)
                                                            <tr>
                                                                
                                                                <td>{{$voidx->sid}}</td>
                                                                <td>{{$voidx->dob}}</td>
                                                                <td>{{$voidx->store_code}}</td>
                                                                <td>{{$voidx->store_name}}</td>
                                                                <td>{{$voidx->check_void}}</td>
                                                                <td>{{$voidx->item}}</td>
                                                                <td>{{$voidx->reason}}</td>
                                                                <td>{{$voidx->manager}}</td>
                                                                <td>{{$voidx->time}}</td>
                                                                <td>{{$voidx->server}}</td>
                                                                <td>{{$voidx->amount}}</td>
                                                                <td>{{$voidx->manager_id}}</td>
																<td>{{$voidx->server_id}}</td>
                                                                <td><a class="btn btn-primary btn-xs" href="{{action('VoidxController@edit', $voidx->id)}}" ><span class="fa fa-pencil"></span></a></td>
                                                                <td>
                                                                    <form action="{{action('VoidxController@destroy', $voidx->id)}}" method="post">
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
						</div>
								<!--/div-->
               
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