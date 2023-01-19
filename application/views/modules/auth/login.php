<section class="ftco-section">
	<br><br><br>
	<div class="container">
		<div class="row justify-content-center"></div>
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-10">
				<div class="wrap d-md-flex">
					<div class="img"></div>
					<div class="login-wrap p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4">WELCOME</h3><br>
							</div>
							<div class="w-100">
								<p class="social-media d-flex justify-content-end">
									<a href="<?= base_url() ?>"
									   class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-close"></span></a>
								</p>
							</div>
						</div>
						<form id="form" role="form" method="POST" class="signin-form needs-validation" novalidate>
							<div class="form-group mb-3">
								<label class="label" for="username">Username <span class="text-danger">*</span></label>
								<input id="username" name="username" type="text" class="form-control"
									   placeholder="example@mail.com" required autofocus>
							</div>
							<div class="form-group mb-3">
								<label class="label" for="password">Password <span class="text-danger">*</span></label>
								<input id="password" name="password" type="password" class="form-control password"
									   placeholder="Password" required>
								<button class="unmask" type="button" title="Show/Hide Password"><i
											class="fa fa-eye"></i></button>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded px-3">Sign
									In
								</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50 text-left">
									<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a class="text-info" href="<?= base_url() ?>users/forgot_password">Forgot
										Password</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
