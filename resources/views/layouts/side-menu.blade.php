<!--aside open-->
<div class="app-sidebar app-sidebar2">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="{{ route('index') }}">
							<img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Covido logo">
							<img src="{{URL::asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Covido logo">
							<img src="{{URL::asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Covido logo">
							<img src="{{URL::asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Covido logo">
						</a>
					</div>
				</div>
				<aside class="app-sidebar app-sidebar3">
					<div class="app-sidebar__user">
						<div class="dropdown user-pro-body text-center">
							<div class="user-pic">
								<img src="../img/profile/{{ Auth::user()->profile_photo }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
							</div>
							<div class="user-info">
								<h5 class=" mb-1 font-weight-bold">{{ Auth::user()->name }}</h5>
								{{-- <span class="text-muted app-sidebar__user-name text-sm">App Developer</span> --}}
							</div>
						</div>
					</div>
                    <ul class="side-menu">
						<li class="slide">
                            <a class="side-menu__item" href="{{ route('dashboardgrap') }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hor-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                <span class="side-menu__label">Dashboard</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>
                        @if( Auth::user()->isAdmin())
                        <li class="slide">
                            <a class="side-menu__item" href="{{ route('users.index') }}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span class="side-menu__label">Users</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>
                        @if(Auth::user()->isSuper())
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
							    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span class="side-menu__label">Upload Data</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="{{ route('sale.index') }}"><span>Sales Summary</span></a></li>
								<li><a class="slide-item" href="{{ route('comp.index') }}"><span>Comps</span></a></li>
								<li><a class="slide-item" href="{{ route('voidx.index') }}"><span>Voids</span></a></li>
								<li><a class="slide-item" href="{{ route('promo.index') }}"><span>Promos</span></a></li>
								<li><a class="slide-item" href="{{ route('payment.index') }}"><span>Payments</span></a></li>
								<li><a class="slide-item" href="{{ route('mix.index') }}"><span>Sales Mix</span></a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
							<span class="side-menu__label">Location</span><i class="side-menu__icon angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="{{ route('region.index') }}"><span>Regions</span></a></li>
								<li><a class="slide-item" href="{{ route('site.index') }}"><span>Sites</span></a></li>

							</ul>
						</li>
						@endif
                        @endif
						 <!--
                        <li class="slide">
							<a class="side-menu__item" href="{{ route('sale.index') }}">
                                <i class="side-menu__icon fa fa-line-chart"></i>
                                <span class="side-menu__label">Sales Summary</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="slide">
							<a class="side-menu__item" href="{{ route('comp.index') }}">
                                <i class="side-menu__icon fa fa-window-restore"></i>
                                <span class="side-menu__label">Comps</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
						</li>
						<li class="slide">
							<a class="side-menu__item" href="{{ route('comp.index') }}">
                                <i class="side-menu__icon fa fa-certificate"></i>
                                <span class="side-menu__label">Voids</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="slide">
							<a class="side-menu__item" href="{{ route('promo.index') }}">
                                <i class="side-menu__icon fa fa-percent"></i>
                                <span class="side-menu__label">Promos</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="{{ url('/' . $page='payments') }}">
                                <i class="side-menu__icon fa fa-credit-card"></i>
                                <span class="side-menu__label">Payments</span><i class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="slide">
							<a class="side-menu__item" href="{{ url('/' . $page='mix') }}">
                                <i class="side-menu__icon fa fa-bar-chart"></i>
                                <span class="side-menu__label">Sales Mix</span><i  class="side-menu__icon angle fa fa-angle-right"></i>
                            </a>
                        </li>

						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
							<span class="side-menu__label">Upload Data</span><i class="side-menu__icon angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="{{ url('/' . $page='sales-summary') }}"><span>Sales Summary</span></a></li>
								<li><a class="slide-item" href="{{ url('/' . $page='comps')}}"><span>Comps</span></a></li>
								<li><a class="slide-item" href="{{ url('/' . $page='voids') }}"><span>Voids</span></a></li>
								<li><a class="slide-item" href="{{ url('/' . $page='promos') }}"><span>Promos</span></a></li>
								<li><a class="slide-item" href="{{ url('/' . $page='payments') }}"><span>Payments</span></a></li>
								<li><a class="slide-item" href="{{ url('/' . $page='mix') }}"><span>Sales Mix</span></a></li>
							</ul>
						</li>

					</ul>
					<div class="app-sidebar-help">
						<div class="dropdown text-center">
							<div class="help d-flex">
								<a href="{{ url('/' . $page='#') }}" class="nav-link p-0 help-dropdown" data-toggle="dropdown">
									<span class="font-weight-bold">Help Info</span> <i class="fa fa-angle-down ml-2"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-4">
									<div class="border-bottom pb-3">
										<h4 class="font-weight-bold">Help</h4>
										<a class="text-primary d-block" href="{{ url('/' . $page='#') }}">Knowledge base</a>
										<a class="text-primary d-block" href="{{ url('/' . $page='#') }}">Contact@info.com</a>
										<a class="text-primary d-block" href="{{ url('/' . $page='#') }}">88 8888 8888</a>
									</div>
									<div class="border-bottom pb-3 pt-3 mb-3">
										<p class="mb-1">Your Fax Number</p>
										<a class="font-weight-bold" href="{{ url('/' . $page='#') }}">88 8888 8888</a>
                                    </div>

                                    <a class="text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>

								</div>
								<div class="ml-auto">
									<a class="nav-link icon p-0" href="{{ url('/' . $page='#') }}">
										<svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path></svg>
										<span class="pulse "></span>
									</a>
								</div>
							</div>
						</div>
					</div>-->
				</aside>

