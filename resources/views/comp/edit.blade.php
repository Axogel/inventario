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
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('sale.update', $sales->id) }}"  role="form">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="form-group row">
                                                <label for="license_key" class="col-md-4 col-form-label text-md-right">DOB</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="dob" id="dob" class="form-control input-sm" value="{{ $sales->dob }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">Store Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="store_name" id="store_name" class="form-control input-sm" value="{{ $sales->store_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_address" class="col-md-4 col-form-label text-md-right">Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="name" class="form-control input-sm" value="{{ $sales->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="store_name" class="col-md-4 col-form-label text-md-right">Taxes</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="taxes" id="taxes" class="form-control input-sm" value="{{ $sales->taxes }}">
                                                </div>
                                            </div>
                                            {{-- <div class="row"> --}}
                                            @if( Auth::user()->isSuper())
                                            <div class="form-group row">
                                                <label for="region" class="col-md-4 col-form-label text-md-right">Store</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="store">
                                                        @foreach($stores as $store)
                                                            @if($sales->store_code == $store->store_code)
                                                                <option value="{{ $store->store_code }}" selected>{{ $store->store_name }}</option>
                                                            @else
                                                                <option value="{{ $store->store_code }}">{{ $store->store_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="region" class="col-md-4 col-form-label text-md-right">Comp</label>
                                                <div class="col-md-6 my-3">
                                                    <select class="form-control" name="comp">
                                                        @foreach($comps as $comp)
                                                            @if($sales->comp == $comp->id)
                                                                <option value="{{ $comp->id }}" selected>{{ $comp->name }}</option>
                                                            @else
                                                                <option value="{{ $comp->id }}">{{ $comp->name  }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="region" class="col-md-4 col-form-label text-md-right">Promo</label>
                                                <div class="col-md-6 my-3">
                                                    <select class="form-control" name="promo">
                                                        @foreach($promos as $promo)
                                                            @if($sales->promo == $promo->id)
                                                                <option value="{{ $promo->id }}" selected>{{ $promo->store_name }}</option>
                                                            @else
                                                                <option value="{{ $promo->id }}">{{ $promo->store_name  }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="region" class="col-md-4 col-form-label text-md-right">Voidx</label>
                                                <div class="col-md-6 my-3">
                                                    <select class="form-control" name="void">
                                                        @foreach($voidxes as $voidx)
                                                            @if($sales->void == $voidx->id)
                                                                <option value="{{ $voidx->id }}" selected>{{ $voidx->store_name }}</option>
                                                            @else
                                                                <option value="{{ $voidx->id }}">{{ $voidx->store_name  }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @else
                                                <input type="hidden" name="region" id="region" class="form-control input-sm" value="{{ $sales->region_id }}">
                                                <input value="{{ $voidx->id }}" selected>{{ $voidx->store_name }}</input>
                                                <input value="{{ $promo->id }}" selected>{{ $promo->store_name }}</input>
                                                <input value="{{ $comp->id }}" selected>{{ $comp->name }}</input>


                                            @endif
                                            <div class="form-group row">
                                                <div class="col-md-12 text-md-right">
                                                    <button type="submit" class="btn btn-lg btn-primary">Updated</button>
                                                   
                                                        <a href="{{ route('sale.index') }}" class="btn btn-lg btn-danger">Cancel</a>
                                                   
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
