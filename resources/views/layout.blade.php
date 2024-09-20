<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<title>Ceres HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme by Keenthemes</title>
	<meta name="description" content="Ceres admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
	<meta name="keywords" content="Ceres theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Ceres HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/products/ceres-html-pro" />
	<meta property="og:site_name" content="Keenthemes | Ceres HTML Free" />
	<link rel="canonical" href="Https://preview.keenthemes.com/ceres-html-free" />
	<link rel="shortcut icon" href="/frontend/assets/media/logos/favicon.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="/frontend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="/frontend/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="/frontend/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	@yield('header')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(/frontend/assets/media/patterns/header-bg.png)" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->
				@include('menu')
				<!--end::Header-->
				<!--begin::Toolbar-->
				@yield('content')
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>

	<!--end::Scrolltop-->
	<!--end::Main-->
	<script>
		var hostUrl = "/frontend/assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="/frontend/assets/plugins/global/plugins.bundle.js"></script>
	<script src="/frontend/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="/frontend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="/frontend/assets/js/custom/widgets.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
	@yield('footer')
</body>
<!--end::Body-->

</html>