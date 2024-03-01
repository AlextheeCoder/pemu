<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="css/admin.css" rel="stylesheet">
	<title>AdminSite</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="/admin" class="brand"><i class='bx bxs-smile icon'></i> Pemu</a>
		<ul class="side-menu">
			<li><a href="" class="active"><i class='bx bxs-dashboard icon' ></i>Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li><a href=""><i class='bx bxs-user icon' ></i> Farmers</a></li>
			<li><a href=""><i class='bx bxs-book icon' ></i> Providers</a></li>
			<li><a href=""><i class='bx bx-transfer icon' ></i>Blogs</a></li>
		
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="/reports" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge" id="unread-reports">0</span>
			</a>
			<a href="/message/admin" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge"  id="unread-count">0</span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="img/user.png"  alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="#"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li>
						<form action="" method="POST">
							@csrf
							<button class="logout-btn" type="submit"><i class='bx bxs-log-out-circle' style="margin-left: 20px;"></i> Logout</button>
						</form>
					</li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			{{$slot}}
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
    <x-flash-message />
    <x-flash-error />
</body>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/admin.js') }}"></script>
</html>