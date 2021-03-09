<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Exclusive List</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">All-Exclusive</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content mt-5">
	<div class="row justify-content-center">
		<div class="col-8">
			<?php
			$msg = $this->session->flashdata('msg');
			if (isset($msg)) {
				echo $msg;
			}
			?>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">All Exclusive list:-</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr class="text-center">
							<th>ID</th>
							<th>Exclusive Title</th>
							<th>Exclusive Image</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 0;
						foreach($exclusivesData as $exclusive ){
							$i++ ;
							?>
							<tr class="text-center">
								<td><?php echo $i ;?></td>
								<td><?php echo $exclusive->exclu_title ;?></td>
								<td>
									<img style=" width: 50px ;" src="<?php echo base_url().'images/'.$exclusive->exclu_image ;?>">
								</td>
								<td class="text-center">
									<a href="<?php echo base_url(); ?>exclusive/editExclusive/<?php echo $exclusive->exclu_id ;?>" class="btn btn-outline-success btn-sm">Edit</a>
									<a onclick="return confirm('Are you sure to remove?')" href="<?php echo base_url(); ?>exclusive/delExclusive/<?php echo $exclusive->exclu_id ;?>" id="deleteChannel" class="btn btn-outline-danger btn-sm">Delete</a>
								</td>

							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
</section>
