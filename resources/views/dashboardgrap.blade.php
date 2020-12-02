@extends('layouts.master')
@section('css')
<!---jvectormap css-->
<link href="{{URL::asset('assets/plugins/jvectormap/jqvmap.css')}}" rel="stylesheet" />
<!-- Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<!-- Slect2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<!--Daterangepicker css-->
<link href="{{URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label class="form-label"><h2 class="card-title">Store</h2></label></div>
                                            <div class="col-9"><select name="region" class="form-control custom-select select2">
                                                @foreach( $sales as $sale)
                                                <option value="{{ $sale->store_code }}">{{ $sale->store_name }}</option>
                                                @endforeach
                                            </select></div>
                                        </div>
                                </div>
							</div>
							<div class="page-rightheader ml-auto d-lg-flex d-none">
									<div class="ml-5 mb-0">
									<a class="btn btn-white date-range-btn" href="#" id="daterange-btn">
										<svg class="header-icon2 mr-3" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
											<path d="M5 8h14V6H5z" opacity=".3"/><path d="M7 11h2v2H7zm12-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-4 3h2v2h-2zm-4 0h2v2h-2z"/>
										</svg> <span>Select Date
										<i class="fa fa-caret-down"></i></span>
									</a>
								</div>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
						<!--Row-->
					<div class="row">
						<div class="col-xl-12 col-md-12 col-lg-12">
							<div class="row">
								<div class="col-xl-1 col-lg-1"></div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body">
												<!--<svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24" fit="" height="50%" width="50%" preserveAspectRatio="xMidYMid meet" focusable="false">
													<path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
													<path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
												</svg>-->
												<h4 class="card-title">Comps</h4>
												<h2 class="mb-1 font-weight-bold">{{ $comps[0]->suma }}</h2>
												<span class="mb-1 text-muted"><span class="text-danger"><i class="fa fa-caret-down  mr-1"></i> 43.2</span> than last month</span>
												<div class="progress progress-sm mt-3 bg-success-transparent">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 78%"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body">
											<!--	<svg class="card-custom-icon text-secondary icon-dropshadow-secondary" x="1008" y="1248" viewBox="0 0 24 24" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
													<path opacity=".0" d="M12.07,6.01 C8.2,6.01 5.07,9.14 5.07,13.01 C5.07,16.88 8.2,20.01 12.07,20.01 C15.94,20.01 19.07,16.88 19.07,13.01 C19.07,9.14 15.94,6.01 12.07,6.01 Z M13.07,14.01 L11.07,14.01 L11.07,8.01 L13.07,8.01 L13.07,14.01 Z"></path>
													<path d="M9.07,1.01 L15.07,1.01 L15.07,3.01 L9.07,3.01 L9.07,1.01 Z M11.07,8.01 L13.07,8.01 L13.07,14.01 L11.07,14.01 L11.07,8.01 Z M19.1,7.39 L20.52,5.97 C20.09,5.46 19.62,4.98 19.11,4.56 L17.69,5.98 C16.14,4.74 14.19,4 12.07,4 C7.1,4 3.07,8.03 3.07,13 C3.07,17.97 7.09,22 12.07,22 C17.05,22 21.07,17.97 21.07,13 C21.07,10.89 20.33,8.93 19.1,7.39 Z M12.07,20.01 C8.2,20.01 5.07,16.88 5.07,13.01 C5.07,9.14 8.2,6.01 12.07,6.01 C15.94,6.01 19.07,9.14 19.07,13.01 C19.07,16.88 15.94,20.01 12.07,20.01 Z"></path></svg>-->
												<h4 class="card-title">Promos</h4>
												<h2 class="mb-1 font-weight-bold">{{ $promos }}</h2>
												<span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  mr-1"></i> 19.8</span> than last month</span>
												<div class="progress progress-sm mt-3 bg-secondary-transparent">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" style="width: 58%"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body"> 
											<!--	<svg class="card-custom-icon text-primary icon-dropshadow-primary" x="1008" y="1248" viewBox="0 0 24 24" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
													 <path d="M17.65,6.35 C16.2,4.9 14.21,4 12,4 C7.58,4 4.01,7.58 4.01,12 C4.01,16.42 7.58,20 12,20 C15.73,20 18.84,17.45 19.73,14 L17.65,14 C16.83,16.33 14.61,18 12,18 C8.69,18 6,15.31 6,12 C6,8.69 8.69,6 12,6 C13.66,6 15.14,6.69 16.22,7.78 L13,11 L20,11 L20,4 L17.65,6.35 Z"></path></svg>-->
												<h4 class="card-title">Voids</h4>	 
												<h2 class="mb-1 font-weight-bold">168</h2>
												<span class="mb-1 text-muted"><span class="text-success"><i class="fa fa-caret-up  mr-1"></i> 0.8%</span> than last month</span>
												<div class="progress progress-sm mt-3 bg-primary-transparent">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 58%"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body">
											<!--		<svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
													<path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
													<path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>-->
												</svg>
												<h4 class="card-title">Taxes</h4>	
												<h2 class="mb-1 font-weight-bold">3257</h2>
												<span class="mb-1 text-muted"><span class="text-danger"><i class="fa fa-caret-down  mr-1"></i> 43.2</span> than last month</span>
												<div class="progress progress-sm mt-3 bg-success-transparent">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 78%"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body">
											<!--		<svg class="card-custom-icon text-success icon-dropshadow-success" x="1008" y="1248" viewBox="0 0 24 24" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
													<path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
													<path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>-->
												</svg>
												<h4 class="card-title">Grs Sales</h4>	
												<h2 class="mb-1 font-weight-bold">3257</h2>
												<span class="mb-1 text-muted"><span class="text-danger"><i class="fa fa-caret-down  mr-1"></i> 43.2</span> than last month</span>
												<div class="progress progress-sm mt-3 bg-secondary-transparent">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" style="width: 58%"></div>
												</div>
											</div>
										</div>
									</div>
								
								</div>
							</div>
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="row">
										<div class="col-xl-12 col-md-12 col-lg-12">
											<div class="card">
												<div class="card-header">
													<div class="card-title">Net Sales</div>
												</div>
												<div class="card-body">
												<div class="h-300" id="flotBar1"></div>
												</div>
												</div>
										</div>
									</div>
								</div>
							</div>


					</div>
				</div><!-- end app-content-->
			</div>
@endsection
@section('js')
<!-- ECharts js -->
<script src="{{URL::asset('assets/plugins/echarts/echarts.js')}}"></script>
<!-- Peitychart js-->
<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>
<!-- Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!--Moment js-->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>
<!-- Daterangepicker js-->
<script src="{{URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{URL::asset('assets/js/daterange.js')}}"></script>
<!---jvectormap js-->
<script src="{{URL::asset('assets/plugins/jvectormap/jquery.vmap.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jvectormap/jquery.vmap.world.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jvectormap/jquery.vmap.sampledata.js')}}"></script>
<!-- Index js-->
<script src="{{URL::asset('assets/js/index1.js')}}"></script>
<!-- Data tables js-->
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
<!--Counters -->
<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<!--Chart js -->
<script src="{{URL::asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>

<!--Chart js -->
<script src="{{URL::asset('assets/plugins/chart/chart.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chart/chart.extension.js')}}"></script>
<!-- ECharts js-->
<script src="{{URL::asset('assets/plugins/echarts/echarts.js')}}"></script>
<script src="{{URL::asset('assets/js/index2.js')}}"></script>
<!-- Flot Charts js-->
<script src="{{URL::asset('assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{URL::asset('assets/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/js/flot.js')}}"></script>
@endsection

