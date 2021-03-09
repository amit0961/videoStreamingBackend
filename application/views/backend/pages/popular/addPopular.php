<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>ADD Popular</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">ADD-Popular</li>
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
									<h3 class="card-title">Add Populars</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="<?php echo base_url(); ?>popular/addPopularsForm"
									  class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group row ">
											<label for="inputEmail3" class="col-sm-2 col-form-label">Popular
												Title</label>
											<div class="col-sm-8">
												<input type="text" name="pop_title" class="form-control" id="inputEmail3"
													   placeholder="Popular Title">
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputFile" class="col-sm-2 col-form-label"> Image</label>
											<div class="input-group col-sm-6">
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="pop_image" id="exampleInputFile" onchange="return previewImage(event)">
													<label class="custom-file-label" for="exampleInputFile">Select file</label>
												</div>
												<hr>
											</div>
											<img  id="output" width="100" height="100" src="" alt="">
										</div>
										<div class="card-footer justify-content-center">
											<button type="submit" class="btn btn-info">Submit</button>
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
