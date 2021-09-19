<body class="bg-theme bg-theme1">
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">

				<div>
					<h4 class="logo-text">Playdhanlaxmi</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

				<li>
					<a href="{{ url('admin/home') }}">
						<div class="parent-icon"><i class="bx bx-envelope"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
                </li>
                {{-- <li>
					<a href="{{ url('admin/datetime') }}">
						<div class="chef-hat"> <i class="lni lni-world"></i>
						</div>
						<div class="menu-title">Date Time</div>
					</a>
                </li> --}}
                <li>
					<a href="{{ url('admin/slote') }}">
						<div class="chef-hat"> <i class="lni lni-world"></i>
						</div>
						<div class="menu-title">Time Slote</div>
					</a>
				</li>
				<li>
					<a href="{{ url('admin/gametype') }}">
						<div class="chef-hat"> <i class="bx bx-conversation"></i>
						</div>
						<div class="menu-title">Game Type</div>
					</a>
                </li>

                <li>
					<a href="{{ url('admin/numbersystem') }}">
						<div class="chef-hat"> <i class="bx bx-conversation"></i>
						</div>
						<div class="menu-title">Number System</div>
					</a>
                </li>
                <li>
					<a href="{{ url('admin/tudaygame') }}">
						<div class="chef-hat"> <i class="bx bx-conversation"></i>
						</div>
						<div class="menu-title">Today Games</div>
					</a>
                </li>
                <li>
					<a href="{{ url('admin/dalygameresult') }}">
						<div class="chef-hat"> <i class="lni lni-invention"></i>
						</div>
						<div class="menu-title">Daily Game Result</div>
					</a>
                </li>
                <li>
					<a href="{{ url('admin/dalygameresultlist') }}">
						<div class="chef-hat"> <i class="lni lni-invention"></i>
						</div>
						<div class="menu-title">Daily Game List</div>
					</a>
                </li>



			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="left-topbar d-flex align-items-center">
					<a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
					</a>
				</div>

				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item search-btn-mobile">
							<a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
							</a>
						</li>

						<li class="nav-item dropdown dropdown-user-profile">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
								<div class="media user-box align-items-center">
									<div class="media-body user-info">
										<p class="user-name mb-0">{{ ucfirst(Auth::user()->email ?? '') }}</p>
										<p class="designattion mb-0">{{ ucfirst(Auth::user()->name ?? '') }}</p>
									</div>
									<img src="{{ asset('public/admin/') }}/assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">

                                <a class="dropdown-item" href="{{ url('logout') }}"><i
								   class="bx bx-power-off"></i><span>Logout</span></a>
							</div>
						</li>

					</ul>
				</div>
			</nav>
		</header>
