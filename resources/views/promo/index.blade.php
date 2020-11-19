@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Promos Dashboard</h4>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
						<!--Row-->
						<div class="row row-deck">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Promos</h3>
										<div class="card-options">
											<div class="btn-group ml-5 mb-0">
												<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-plus"></i>New Order</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ route('promo.create') }}"><i class="fa fa-plus mr-2"></i>Add new Promo</a>
													{{-- <a class="dropdown-item" href="#"><i class="fa fa-eye mr-2"></i>View all new tab</a>
													<a class="dropdown-item" href="#"><i class="fa fa-edit mr-2"></i>Edit User</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i> Settings</a> --}}
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
                                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                                <thead>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">Store Code</th>
                                                    <th class="border-bottom-0">Check Promo</th>
                                                    <th class="border-bottom-0">Check Name</th>
                                                    <th class="border-bottom-0">Employee</th>
                                                    <th class="border-bottom-0">Manager</th>
                                                    <th class="border-bottom-0">Promo Type</th>
                                                    <th class="border-bottom-0">Quantity</th>
                                                    <th class="border-bottom-0">Amount</th>
                                                    <th class="border-bottom-0">Employeed ID</th>
                                                    <th class="border-bottom-0">Manager ID</th>
                                                    <th class="border-bottom-0">Edit</th>
                                                    <th class="border-bottom-0">Delete</th>
                                                </thead>
                                                <tbody>
                                                    @if($promos->isNotEmpty())
                                                        @foreach($promos as $promo)
                                                            <tr class="bold">
                                                                <td>{{$promo->id}}</td>
                                                                <td>{{$promo->sid}}</td>
                                                                <td>{{$promo->dob}}</td>
                                                                <td>{{$promo->store_code}}</td>
                                                                <td>{{$promo->store_name}}</td>
                                                                <td>{{$promo->check_promo}}</td>
                                                                <td>{{$promo->check_name}}</td>
                                                                <td>{{$promo->employee}}</td>
                                                                <td>{{$promo->manager}}</td>
                                                                <td>{{$promo->promo_type}}</td>
                                                                <td>{{$promo->qty}}</td>
                                                                <td>{{$promo->amount}}</td>
                                                                <td>{{$promo->emp_id}}</td>
                                                                <td>{{$promo->man_id}}</td>
                                                                <td><a class="btn btn-primary btn-xs" href="{{action('PromoController@edit', $promo->id)}}" ><span class="fa fa-pencil"></span></a></td>
                                                                <td>
                                                                    <form action="{{action('PromoController@destroy', $promo->id)}}" method="post">
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
