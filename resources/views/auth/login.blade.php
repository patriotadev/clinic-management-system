<!DOCTYPE html>
<html lang="en">

<head>

	<title>Sistem Manajemen Klinik | dr. Eddy</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
	<meta name="author" content="Codedthemes" />

	<!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('images/clinic.png') }}"/>
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="{{ asset('template/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
	<!-- animation css -->
	<link rel="stylesheet" href="{{ asset('template/assets/plugins/animation/css/animate.min.css') }}">
	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card shadow">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <h4 class="mb-3 f-w-400 text-center font-weight-bold">Klinik dr. Eddy</h4>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-user"></i></span>
                                </div>
                                <input type="text" class="@error('username') is-invalid @enderror form-control" placeholder="Username" name="username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                </div>
                                <input type="password" class="@error('password') is-invalid @enderror form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary mb-4">Login</button>
                            </div>
                        </form>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="{{ asset('images/hero-login.jpg') }}" style="height: 45vh" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('template/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (session('username_fail'))
    <script>
        Swal.fire(
        'Gagal!',
        '<?= session('username_fail'); ?>',
        'error'
        )
    </script>
@endif

@if (session('password_fail'))
    <script>
        Swal.fire(
        'Gagal!',
        '<?= session('password_fail'); ?>',
        'error'
        )
    </script>
@endif

</body>

</html>


