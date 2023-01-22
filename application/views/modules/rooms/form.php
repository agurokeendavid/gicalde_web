<div class="content-wrapper">
	<?php $this->load->view('partials/dashboard_page_header') ?>
	<div class="row mt-3">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">General Information</h4>
					<p class="card-description">Room</p>
					<hr>
					<form id="form" class="forms-sample" role="form" method="post" enctype="multipart/form-data">
						<input type="hidden" id="id" name="id" value="<?= @$info['id']; ?>" readonly>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="name">Room Name <code>*</code></label>
									<input type="text" class="form-control" id="name" name="name"
										   placeholder="Room Name" value="<?= @$info['name']; ?>" required autofocus>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="no_of_houses">No. of Houses <code>*</code></label>
									<input type="number" min="0" class="form-control" id="no_of_houses" name="no_of_houses"
										   placeholder="No. of Houses" value="<?= @$info['no_of_houses']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="no_of_guests">No. of Guests <code>*</code></label>
									<input type="number" min="0" class="form-control" id="no_of_guests" name="no_of_guests"
										   placeholder="No. of Guests" value="<?= @$info['no_of_guests']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="no_of_rooms">No. of Rooms <code>*</code></label>
									<input type="number" min="0" class="form-control" id="no_of_rooms" name="no_of_rooms"
										   placeholder="No. of Rooms" value="<?= @$info['no_of_rooms']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="price">Price (₱) <code>*</code></label>
									<input type="number" class="form-control" id="price" name="price" step="0.01"
										   placeholder="Price (₱)" value="<?= @$info['price']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="slots">Slots <code>*</code></label>
									<input type="number" class="form-control" id="slots" name="slots"
										   placeholder="Slots" value="<?= @$info['slots']; ?>" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" id="description" name="description"
											  placeholder="Description"><?= @$info['description']; ?></textarea>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="photo_1_file">Photo 1</label>
									<input type="file" name="photo_1_file" id="photo_1_file"
										   class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" id="photo_1_file_info"
											   disabled="" placeholder="Photo 1"
											   value="<?= @$info_photos[0]['photo_file_name']?>">
										<span class="input-group-append">
                                            <button id="photo_1_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="photo_2_file">Photo 2</label>
									<input type="file" name="photo_2_file" id="photo_2_file"
										   class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" id="photo_2_file_info"
											   disabled="" placeholder="Photo 2"
											   value="<?= @$info_photos[1]['photo_file_name']?>">
										<span class="input-group-append">
                                            <button id="photo_2_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="photo_3_file">Photo 3</label>
									<input type="file" name="photo_3_file" id="photo_3_file"
										   class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" id="photo_3_file_info"
											   disabled="" placeholder="Photo 3"
											   value="<?= @$info_photos[2]['photo_file_name']?>">
										<span class="input-group-append">
                                            <button id="photo_3_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="photo_4_file">Photo 4</label>
									<input type="file" name="photo_4_file" id="photo_4_file"
										   class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" id="photo_4_file_info"
											   disabled="" placeholder="Photo 4"
											   value="<?= @$info_photos[3]['photo_file_name']?>">
										<span class="input-group-append">
                                            <button id="photo_4_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="photo_5_file">Photo 5</label>
									<input type="file" name="photo_5_file" id="photo_5_file"
										   class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" id="photo_5_file_info"
											   disabled="" placeholder="Photo 5"
											   value="<?= @$info_photos[4]['photo_file_name']?>">
										<span class="input-group-append">
                                            <button id="photo_5_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="photo_6_file">Photo 6</label>
									<input type="file" name="photo_6_file" id="photo_6_file"
										   class="file-upload-default">
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" id="photo_6_file_info"
											   disabled="" placeholder="Photo 6"
											   value="<?= @$info_photos[5]['photo_file_name']?>">
										<span class="input-group-append">
                                            <button id="photo_6_file_browse" class="file-upload-browse btn btn-primary"
													type="button">Upload</button>
                                        </span>
									</div>
								</div>
							</div>
						</div>
						<div class="row float-right">
							<div class="col-sm-12">
								<a href="<?= site_url('rooms') ?>" class="btn btn-light mr-2">Cancel</a>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
