@extends('layouts.master')
@section('css')
<!-- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Edit Sale</h4>
							</div>
							<div class="page-rightheader ml-auto d-lg-flex d-none">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Dashboard</span></a></li>
									<li class="breadcrumb-item"><a href="{{ route('sale.index') }}">Sale Panel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Sale</li>
								</ol>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
						<!-- Row -->
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
                                    <div class="card-header">
										<div class="card-title">Edit Sale</div>
                                    </div>
                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
        
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                         
                                     @endforeach
                                   
                                  @endif
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('promo.update', $promo->id) }}"  role="form">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="form-group row">
                                                <label for="license_key" class="col-md-4 col-form-label text-md-right">DOB</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="dob" id="dob" class="form-control input-sm" value="{{ $promo->dob }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">Store Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="store_name" id="store_name" class="form-control input-sm" value="{{ $promo->store_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_address" class="col-md-4 col-form-label text-md-right">Employee</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="employee" id="employee" class="form-control input-sm" value="{{ $promo->employee }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">Check promo</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="check_promo" id="check_promo" class="form-control input-sm" value="{{ $promo->check_promo }}">
                                                </div>
                                            </div>
                                 
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">Manager</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="manager" id="manager" class="form-control input-sm" value="{{ $promo->manager }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">	Promo type</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="promo_type" id="promo_type" class="form-control input-sm" value="{{ $promo->promo_type }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">	Qty</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="qty" id="qty" class="form-control input-sm" value="{{ $promo->qty }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">	Amount</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="amount" id="amount" class="form-control input-sm" value="{{ $promo->amount }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">	Emp id</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="emp_id" id="emp_id" class="form-control input-sm" value="{{ $promo->emp_id }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">	Man id</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="man_id" id="man_id" class="form-control input-sm" value="{{ $promo->man_id }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">	Check name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="check_name" id="check_name" class="form-control input-sm" value="{{ $promo->check_name }}">
                                                </div>
                                            </div>
                                 
                                            <div class="form-group row">
                                                <div class="col-md-12 text-md-right">
                                                    <button type="submit" class="btn btn-lg btn-primary">Updated</button>
                                                   
                                                        <a href="{{ route('promo.index') }}" class="btn btn-lg btn-danger">Cancel</a>
                                                   
                                                </div>
                                            </div>
                                        </form>
                                    </div>
								</div>
							</div>
						</div>
						<!-- End Row-->

					</div>
				</div><!-- end app-content-->
			</div>
@endsection
@section('js')
<!--Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
