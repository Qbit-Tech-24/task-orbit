<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Client Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('admin')}}/img/kaiadmin/favicon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('admin')}}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('admin')}}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('admin')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('admin')}}/css/plugins.min.css">
	<link rel="stylesheet" href="{{asset('admin')}}/css/kaiadmin.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign Up</h3>
            <form method="POST" action="{{ route('client.register_save') }}">
                @csrf
                <div class="login-form">
                    <div class="form-group">
                        <label for="username"><b>User Name</b></label>
                        <input id="email" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username"><b>User Email</b></label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username"><b>Phone Number</b></label>
                        <input id="email" type="number" name="phone" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Address"><b>Address</b></label>
                        <textarea class="form-control" rows="3" cols="3" name="address"></textarea>
                    </div>
                    
                    <div class="form-group  mb-3 d-block">
                        <button type="submit" class="btn btn-primary float-end mt-3 mt-sm-0 fw-bold">Register</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
	<script src="{{asset('admin')}}/js/core/jquery-3.7.1.min.js"></script>

	<script src="{{asset('admin')}}/js/core/popper.min.js"></script>
	<script src="{{asset('admin')}}/js/core/bootstrap.min.js"></script>
	<script src="{{asset('admin')}}/js/kaiadmin.min.js"></script>
</body>
</html>
