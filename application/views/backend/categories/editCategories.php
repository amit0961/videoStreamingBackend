<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Edit Category</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Edit-Category</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<!-- left column -->
						<div class="col-md-6">
							<!-- Horizontal Form -->
							<div class="card card-info mt-5">
								<?php
								$msg = $this->session->flashdata('msg');
								if (isset($msg)) {
									echo $msg;
								}
								?>
								<div class="card-header">
									<h3 class="card-title">Edit Categories</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="<?php echo base_url(); ?>category/updateCategoriesForm"
									  class="form-horizontal" method="post">
									<input type="hidden"  name="cat_id" value="<?php echo $categoriesByID->cat_id;?>">
									<div class="card-body">
										<div class="form-group row ">
											<label for="inputEmail3" class="col-sm-2 col-form-label">Category
												Name</label>
											<div class="col-sm-8">
												<input type="text"  name="cat_name" value="<?php echo $categoriesByID->cat_name ;?>" class="form-control" id="inputEmail3"
													   placeholder="Category Name">
											</div>
										</div>
										<div class="card-footer justify-content-center">
											<button type="submit" class="btn btn-info">Update</button>
										</div>
									</div>
									<!-- /.card-body -->

									<!-- /.card-footer -->
								</form>
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>
