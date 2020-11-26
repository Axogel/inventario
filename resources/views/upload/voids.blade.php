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
						<div class="row">
							<div class="col-12">
								<!--div-->
								<div class="card">
									<div class="card-header">
										<div class="card-title"></div>
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

														<tr>
															<th>131483</th>
															<td>20201110</td>
															<td>9</td>
															<td>Juici - Liguanea Restored</td>
                                                    		<td>Breakfast </td>
                                                    		<td>16</td>
                                                    		<td>81170</td>
                                                    		<td>0</td>
                                                    		<td>0</td>
                                                    		<td>940</td>
                                                    		<td>0</td>
                                                    		<td>81170</td>
                                                    		<td>8</td>
														</tr>

														<tr>
															<th>131483</th>
															<td>20201110</td>
															<td>9</td>
															<td>Juici - Liguanea Restored</td>
                                                    		<td>Breakfast </td>
                                                    		<td>16</td>
                                                    		<td>81170</td>
                                                    		<td>0</td>
                                                    		<td>0</td>
                                                    		<td>940</td>
                                                    		<td>0</td>
                                                    		<td>81170</td>
                                                    		<td>8</td>
														</tr>

														<tr>
															<th>131483</th>
															<td>20201110</td>
															<td>9</td>
															<td>Juici - Liguanea Restored</td>
                                                    		<td>Breakfast </td>
                                                    		<td>16</td>
                                                    		<td>81170</td>
                                                    		<td>0</td>
                                                    		<td>0</td>
                                                    		<td>940</td>
                                                    		<td>0</td>
                                                    		<td>81170</td>
                                                    		<td>8</td>
														</tr>

														<tr>
															<th>131483</th>
															<td>20201110</td>
															<td>9</td>
															<td>Juici - Liguanea Restored</td>
                                                    		<td>Breakfast </td>
                                                    		<td>16</td>
                                                    		<td>81170</td>
                                                    		<td>0</td>
                                                    		<td>0</td>
                                                    		<td>940</td>
                                                    		<td>0</td>
                                                    		<td>81170</td>
                                                    		<td>8</td>
														</tr>

														<tr>
															<th>131483</th>
															<td>20201110</td>
															<td>9</td>
															<td>Juici - Liguanea Restored</td>
                                                    		<td>Breakfast </td>
                                                    		<td>16</td>
                                                    		<td>81170</td>
                                                    		<td>0</td>
                                                    		<td>0</td>
                                                    		<td>940</td>
                                                    		<td>0</td>
                                                    		<td>81170</td>
                                                    		<td>8</td>
														</tr>

														<tr>
															<th>131483</th>
															<td>20201110</td>
															<td>9</td>
															<td>Juici - Liguanea Restored</td>
                                                    		<td>Breakfast </td>
                                                    		<td>16</td>
                                                    		<td>81170</td>
                                                    		<td>0</td>
                                                    		<td>0</td>
                                                    		<td>940</td>
                                                    		<td>0</td>
                                                    		<td>81170</td>
                                                    		<td>8</td>
														</tr>

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
