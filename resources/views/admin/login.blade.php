<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>sattaking</title>
	<!--favicon-->
	<link rel="icon" href="{{ asset('public/admin/') }}/assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('public/admin/') }}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('public/admin/') }}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('public/admin/') }}/assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ asset('public/admin/') }}/assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('public/admin/') }}/assets/css/app.css" />
</head>

<body class="bg-theme bg-theme1">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<h3 class="mt-4 font-weight-bold">Welcome Back</h3>
									</div>
									<div class="login-separater text-center"> <span>OR LOGIN WITH EMAIL</span>
										<hr/>
                                    </div>
                                <form action="{{ url('adminlogin') }}" method="Post" enctype="multipart/form-data">
                                    @csrf
									<div class="form-group mt-4">
										<label>Email Address</label>
                                        <input name="email" type="text" class="form-control" placeholder="Enter your email address" />
                                        @if ($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
									</div>
									<div class="form-group">
										<label>Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Enter your password" />
                                        @if ($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
									</div>
									<div class="form-row">
										<div class="form-group col">
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
												<label class="custom-control-label" for="customSwitch1">Remember Me</label>
                                            </div>
										</div>
                                        @if (\Session::has('success'))
                                           {!! \Session::get('success') !!}
                                        @endif
									</div>
									<div class="btn-group mt-3 w-100">
										<button  class="btn btn-light ">Log In</button>
									</div>

								</div>
							</div>
							<div class="col-lg-6">
								<img src="{{ asset('public/admin/') }}/assets/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>


</html>
