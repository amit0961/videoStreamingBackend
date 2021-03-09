<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>ADD Videos</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">ADD-Video</li>
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
									<h3 class="card-title">Add Videos</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="<?php echo base_url(); ?>video/addVideosForm"
									  class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group row ">
											<label for="inputEmail3" class="col-sm-2 col-form-label">Video - Title</label>
											<div class="col-sm-8">
												<input type="text" name="vid_title" class="form-control" id="inputEmail3"
													   placeholder="Enter video title here">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Category Name</label>
											<div class="select2-purple col-sm-8">
												<select name="ch_name" class="form-control select2" style="width: 100%;">
													<option selected="selected">Select a Category</option>
													<?php
														foreach ($categoriesData as $category){
													?>
													<option value="<?php echo $category->cat_id ;?>" > <?php echo $category->cat_name ; ?> </option>
													 <?php } ?>
												</select>
											</div>
										</div>
										<!-- /.form-group -->
										<!-- /.form-group -->
										<div class="form-group row">
											<label for="exampleInputFile" class="col-sm-2 col-form-label">Video File</label>
											<div class="input-group col-sm-8">
												<div class="custom-file">
													<input type="file" name="vid_file" class="custom-file-input" id="exampleInputFile">
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
											</div>
										</div>
										<!-- /.form-group -->
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
