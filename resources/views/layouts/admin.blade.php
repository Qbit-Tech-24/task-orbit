<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Task Orbit</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--<link rel="icon" href="{{asset('admin')}}/img/kaiadmin/favicon.ico" type="image/x-icon"/>-->

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
<link rel="stylesheet" href="{{asset('admin')}}/css/kaiadmin.trendy2.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/css/summernote-custom.css">
<link rel="stylesheet" href="{{ asset('admin') }}/css/main.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="{{ asset('/') }}backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset('/') }}backend/assets/css/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@stack('style')
</head>
<body class="trendy2-layout">
	<div class="wrapper no-box-shadow-style">
		<div class="overlay bg-primary"></div>
		<!-- Sidebar -->
		@include('layouts.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="main-header">
				<div class="main-header-logo">
					<!-- Logo Header -->
					<div class="logo-header" data-background-color="blue">

						<a href="index.html" class="logo">
							<img src="{{asset('admin')}}/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20">
						</a>
						<button class="navbar-toggler sidenav-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon">
								<i class="gg-menu-right"></i>
							</span>
						</button>
						<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
						<div class="nav-toggle">
							<button class="btn btn-toggle toggle-sidebar">
								<i class="gg-menu-right"></i>
							</button>
						</div>
					</div>
					<!-- End Logo Header -->
				</div>
				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg" data-background-color="blue">

					<div class="container-fluid">
						<nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pe-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</nav>

						<ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
							<li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
								<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
									<i class="fa fa-search"></i>
								</a>
								<ul class="dropdown-menu dropdown-search animated fadeIn">
									<form class="navbar-left navbar-form nav-search">
										<div class="input-group">
											<input type="text" placeholder="Search ..." class="form-control">
										</div>
									</form>
								</ul>
							</li>
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-envelope"></i>
								</a>
								<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
									<li>
										<div class="dropdown-title d-flex justify-content-between align-items-center">
											Messages
											<a href="#" class="small">Mark all as read</a>
										</div>
									</li>
									<li>
										<div class="message-notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-img">
														<img src="{{asset('admin')}}/img/jm_denis.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">Jimmy Denis</span>
														<span class="block">
															How are you ?
														</span>
														<span class="time">5 minutes ago</span>
													</div>
												</a>
											</div>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</li>
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-bell"></i>
									<span class="notification">4</span>
								</a>
								<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
									<li>
										<div class="dropdown-title">You have 4 new notification</div>
									</li>
									<li>
										<div class="notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
													<div class="notif-content">
														<span class="block">
															New user registered
														</span>
														<span class="time">5 minutes ago</span>
													</div>
												</a>
											</div>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</li>
							<li class="nav-item topbar-icon dropdown hidden-caret">
								<a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<i class="fas fa-layer-group"></i>
								</a>
								<div class="dropdown-menu quick-actions animated fadeIn">
									<div class="quick-actions-header">
										<span class="title mb-1">Quick Actions</span>
										<span class="subtitle op-7">Shortcuts</span>
									</div>
									<div class="quick-actions-scroll scrollbar-outer">
										<div class="quick-actions-items">
											<div class="row m-0">
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-danger rounded-circle">
															<i class="far fa-calendar-alt"></i>
														</div>
														<span class="text">Calendar</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-warning rounded-circle">
															<i class="fas fa-map"></i>
														</div>
														<span class="text">Maps</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-info rounded-circle">
															<i class="fas fa-file-excel"></i>
														</div>
														<span class="text">Reports</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-success rounded-circle">
															<i class="fas fa-envelope"></i>
														</div>
														<span class="text">Emails</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-primary rounded-circle">
															<i class="fas fa-file-invoice-dollar"></i>
														</div>
														<span class="text">Invoice</span>
													</div>
												</a>
												<a class="col-6 col-md-4 p-0" href="#">
													<div class="quick-actions-item">
														<div class="avatar-item bg-secondary rounded-circle">
															<i class="fas fa-credit-card"></i>
														</div>
														<span class="text">Payments</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</li>

							<li class="nav-item topbar-user dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{asset('admin')}}/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
									</div>
									<span class="profile-username text-white">
										<span class="op-7">Hi,</span> <span class="fw-bold">{{ Auth::user()->name }}</span>
									</span>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="{{asset('admin')}}/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4>{{Auth::user()->name }}</h4>
													<p class="text-muted">{{Auth::user()->email }}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">My Profile</a>
											<a class="dropdown-item" href="#">My Balance</a>
											<a class="dropdown-item" href="#">Inbox</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Account Setting</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item" >
                                                        <div class="d-flex align-items-center">
                                                            <div><i class="bi bi-box-arrow-right"></i></div>
                                                             <div class="ms-3"><span>Log Out</span></div>
                                                        </div>
                                                    </button>
                                                </form>
                                            </a>
										</li>
									</div>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>
            @yield('content')
            <footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<!--<ul class="nav">-->
						<!--	<li class="nav-item">-->
						<!--		<a class="nav-link" href="http://www.themekita.com">-->
						<!--			ThemeKita-->
						<!--		</a>-->
						<!--	</li>-->
						<!--	<li class="nav-item">-->
						<!--		<a class="nav-link" href="#">-->
						<!--			Help-->
						<!--		</a>-->
						<!--	</li>-->
						<!--	<li class="nav-item">-->
						<!--		<a class="nav-link" href="#">-->
						<!--			Licenses-->
						<!--		</a>-->
						<!--	</li>-->
						<!--</ul>-->
					</nav>
					<div class="copyright ms-auto">
						2024, GRASP Technologies
					</div>
				</div>
			</footer>
		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('admin')}}/js/core/jquery-3.7.1.min.js"></script>
	<script src="{{asset('admin')}}/js/core/popper.min.js"></script>
	<script src="{{asset('admin')}}/js/core/bootstrap.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('admin')}}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="{{asset('admin')}}/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="{{asset('admin')}}/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('admin')}}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="{{asset('admin')}}/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="{{asset('admin')}}/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('admin')}}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('admin')}}/js/plugin/jsvectormap/jsvectormap.min.js"></script>
	<script src="{{asset('admin')}}/js/plugin/jsvectormap/world.js"></script>

	<!-- Dropzone -->
	<script src="{{asset('admin')}}/js/plugin/dropzone/dropzone.min.js"></script>

	<!-- Fullcalendar -->
	<script src="{{asset('admin')}}/js/plugin/fullcalendar/fullcalendar.min.js"></script>

	<!-- DateTimePicker -->
	<script src="{{asset('admin')}}/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="{{asset('admin')}}/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

	<!-- jQuery Validation -->
	<script src="{{asset('admin')}}/js/plugin/jquery.validate/jquery.validate.min.js"></script>

	<!-- Summernote -->
	<script src="{{asset('admin')}}/js/plugin/summernote/summernote-lite.min.js"></script>

	<!-- Select2 -->
	{{-- <script src="{{asset('admin')}}/js/plugin/select2/select2.full.min.js"></script> --}}

	<!-- Sweet Alert -->
	<script src="{{asset('admin')}}/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Owl Carousel -->
	<script src="{{asset('admin')}}/js/plugin/owl-carousel/owl.carousel.min.js"></script>

	<!-- Magnific Popup -->
	<script src="{{asset('admin')}}/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Kaiadmin JS -->
	<script src="{{asset('admin')}}/js/kaiadmin.trendy2.min.js"></script>

    <script src="{{ asset('admin') }}/js/plugin/summernote/summernote-lite.min.js"></script>

    <script src="{{ asset('/') }}backend/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/js/table-datatable.js"></script>
    <script src="{{ asset('/') }}backend/assets/js/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

	<!-- Kaiadmin DEMO methods, don't include it in your project! -->
	{{-- <script src="{{asset('admin')}}/js/setting-demo.js"></script> --}}
	{{-- <script src="{{asset('admin')}}/js/demo.js"></script> --}}
    <!--Image Preview-->
    <script>
        function handleImagePreview(input, previewId) {
                $(input).on('change', function() {
                    const file = this.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $(previewId).attr('src', e.target.result).removeClass('d-none');
                    }

                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        $(previewId).addClass('d-none');
                    }
                });
            }
            handleImagePreview('#image', '#img_preview');
    </script>
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#177dff',
			fillColor: 'rgba(23, 125, 255, 0.14)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#f3545d',
			fillColor: 'rgba(243, 84, 93, .14)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<script >
		$(document).ready(function() {

            $('.select2-input').select2();

			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-select"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
       $('.summernote').summernote({
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 150,
        });
    </script>

    @if (session('success'))
    <script>
        $(document).ready(function() {
            $.notify({
                // Options
                message: '{{ session('success') }}'
            },{
                // Settings
                type: 'success',
                delay: 3000,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        });
    </script>
    @endif

    @if (session('danger'))
    <script>
        $(document).ready(function() {
            $.notify({
                // Options
                message: '{{ session('danger') }}'
            },{
                // Settings
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        });
    </script>
    @endif

    @stack('script')
</body>
</html>