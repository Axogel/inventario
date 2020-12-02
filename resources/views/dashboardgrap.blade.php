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
                                            <div class="col-9">
                                                <select name="store" id="store" class="form-control custom-select select2" onchange="storeCharge(this.value)">
                                                @foreach( $sales as $sale)
                                                    <option value="{{ $sale->store_code }}">{{ $sale->store_name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
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
                                                <div class="feature">
                                                    <i class="fa fa-line-chart feature-icon text-danger"></i>
                                                    <h2 class="font-weight-bold mb-0 mt-4" id='comps'></h2>
                                                    <h4 class="card-title">Comps</h4>
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
                                                <div class="feature">
                                                    <i class="fa fa-credit-card feature-icon text-primary"></i>
                                                    <h2 class="font-weight-bold mb-0 mt-4" id='voids'></h2>
                                                    <h4 class="card-title">Voids</h4>
                                                </div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body">
                                                <div class="feature">
                                                    <i class="fa fa-money feature-icon text-success"></i>
                                                    <h2 class="font-weight-bold mb-0 mt-4" id='taxes'></h2>
                                                    <h4 class="card-title">Taxes</h4>
                                                </div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6">
										<div class="card">
											<div class="card-body">
                                                <div class="feature">
                                                    <i class="fa fa-cart-plus feature-icon text-secondary"></i>
                                                    <h2 class="font-weight-bold mb-0 mt-4" id='grssales'></h2>
                                                    <h4 class="card-title">Grs Sales</h4>
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
                                                    <div>
                                                        <canvas id="chartBar1" class="h-300"></canvas>
                                                    </div>
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
<!-- Peitychart js-->
<script src="{{URL::asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>
<!-- Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!--Moment js-->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>
<!-- Daterangepicker js-->
<script src="{{URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
{{-- <script src="{{URL::asset('assets/js/daterange.js')}}"></script> --}}
<!---jvectormap js-->
<script src="{{URL::asset('assets/plugins/jvectormap/jquery.vmap.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jvectormap/jquery.vmap.world.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jvectormap/jquery.vmap.sampledata.js')}}"></script>
<!-- Index js-->
<script src="{{URL::asset('assets/js/index1.js')}}"></script>
<!--Counters -->
<script src="{{URL::asset('assets/plugins/counters/counterup.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/counters/waypoints.min.js')}}"></script>
<!--Chart js -->
<script src="{{URL::asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chart/utils.js')}}"></script>

<!--DateFormat -->
<script src="{{URL::asset('assets/js/jquery-dateformat.min.js')}}"></script>

<script>
    $(document).ready(function(){
        var store_id = $('#store option:checked').val();
        var dateS = $("#dateStart").val();
        var dateE = $("#dateEnd").val();
        storeCharge(store_id, dateS, dateE);
    });
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        }, function(start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            var store_id = $('#store option:selected').val();
            storeCharge(store_id, start.format('YYYYMMDD'), end.format('YYYYMMDD'));
        });
    function storeCharge(store, dateStart, dateEnd){
        $.ajax({url:'sale/'+store+'/show',
            type:'get',
            dataType:"json"
		})
        .done(function(e){
            var f=e, comps=0, promos=0, voids=0, taxes=0, grsals=0, maxChart = 0;
            let axisX = [], dataChart = [];
			$.each(f,function(index, el) {
                comps+=el.comp;
                promos+=el.promo;
                voids+=el.void;
                taxes+=el.taxes;
                grsals+=el.grs_sale;
                axisX[index]=el.name;
                dataChart[index]=el.net_sale;
                if(maxChart < el.net_sale)
                    maxChart=el.net_sale
            });
            $('#comps').text(comps);
            $('#promos').text(promos);
            $('#voids').text(voids);
            $('#taxes').text(taxes);
            $('#grssales').text(grsals);

            'use strict';
            var ctx1 = document.getElementById('chartBar1').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: axisX,
                    datasets: [{
                        label: 'Products',
                        data: dataChart,
                        backgroundColor: '#f72d66'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                                max: maxChart,
                                fontColor: "#ababab",
                            },
                            gridLines: {
                                color: 'rgba(180, 183, 197, 0.4)'
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.6,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 8,
                                fontColor: "#ababab",
                            },
                            gridLines: {
                                color: 'rgba(180, 183, 197, 0.4)'
                            }
                        }]
                    }
                }
            });

        });
    }
</script>
@endsection

