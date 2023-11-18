<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@stack('title')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- Custom fonts for this template-->
	<link href="{{env('APP_URL')}}/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{env('APP_URL')}}/admin/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="{{env('APP_URL')}}/admin/css/Custom-admin.css" rel="stylesheet">
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{env('APP_URL')}}/admins-index">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin-panel</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="{{env('APP_URL')}}/admins-index">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>


			<li class="nav-item active">
				<a class="nav-link" href="{{env('APP_URL')}}">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>View Site</span></a>
			</li>


			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Actions
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-folder"></i>
					<span>Products</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="{{env('APP_URL')}}/admins-product/create">Add Products </a>
						<a class="collapse-item" href="{{env('APP_URL')}}/admins-product">View Products</a>
					</div>
				</div>
			</li>




			<!-- Nav Item - Charts -->
			<li class="nav-item">
				<a class="nav-link" href="{{env('APP_URL')}}/customers-list">

					<span>Customers</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{env('APP_URL')}}/orders-list">
					<span>View Orders</span></a>
			</li>

			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Categories & brands
			</div>
			<li class="nav-item">
				<a class="nav-link" href="{{env('APP_URL')}}/admins-category">

					<span>Categories</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{env('APP_URL')}}/admins-brand">

					<span>Brands</span></a>
			</li>


			<hr class="sidebar-divider">
			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="{{env('APP_URL')}}/admin/logout">
					<i class="fas fa-fw fa-table"></i>
					<span>Logout</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>



		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>


				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">@stack('heading')</h1>
						<a href="Reports.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
					</div>
