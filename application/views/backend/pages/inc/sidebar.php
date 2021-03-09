<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?php echo base_url() ; ?>assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">Dashboard</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url() ; ?>assets/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Exclusive
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>exclusive/addExclusive.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add-Exclusive </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>exclusive/listExclusive.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Exclusive -List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							New Arrival
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>newarrival/addNewarrival.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add-New Arrival </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>newarrival/listNewarrival.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>New Arrival -List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Most Popular
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>popular/addPopular.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add - Most Popular </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>popular/listPopular.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Most Popular -List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-edit"></i>
						<p>
							Recommended
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>recommended/addRecommended.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add-Recommended </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>recommended/listRecommended.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Recommended -List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-edit"></i>
						<p>
							Screen Video
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>video/addVideo.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add-Video </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ; ?>video/listVideos.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Video -List</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">SETTINGS</li>
				<li class="nav-item">
					<a href="<?php echo base_url() ; ?>user/logout" class="nav-link">
						<i class="nav-icon far fa-circle text-danger"></i>
						<p class="text">LOG-OUT</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
