@extends('layouts.master')
@section('css')
<!-- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Profile</h4>
							</div>
						</div>
						<!--End Page header-->
@endsection
@section('content')
                        <!-- Row -->
                        @if(Session::has('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                @if(is_string(Session::get('success')))
                                    {{ Session::get('success') }}
                                @else
                                    @foreach (Session::get('success') as $item)
                                        @foreach ($item as $key => $value)
                                            @foreach ($value as $mess => $elem)
                                                <p>{{ $elem }}</p>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endif

                                {{-- @foreach (Session::get('success') as $item)
                                    @foreach ($item as $key => $value)
                                        @foreach ($value as $mess => $elem)
                                            <p>{{ $elem }}</p>
                                        @endforeach
                                    @endforeach
                                @endforeach --}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
			            @endif
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
                                    <div class="card-header">
										<div class="card-title"></div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('credentials') }}"  role="form">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="name" class="form-control input-sm" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" name="email" id="email" class="form-control input-sm" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="current-password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" name="current-password" id="current-password" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" name="password" id="password" class="form-control input-sm" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password-confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" name="password-confirmation" id="password-confirmation" class="form-control input-sm" >
                                                </div>
                                            </div>
                                            {{-- <div class="row"> --}}
                                            <div class="form-group row">
                                                <div class="col-md-12 text-md-right">
                                                    <button type="submit" class="btn btn-lg btn-primary">Updated</button>
                                                    <a href="{{ route('users.index') }}" class="btn btn-lg btn-danger">Cancel</a>
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
