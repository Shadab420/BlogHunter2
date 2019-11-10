<?php
    $this->load->view('partial-views/header');
    $this->load->view('partial-views/navbar');
?>
<body>
   
   <div>
    	<div class="row">
			<div class="col-md-6 col-md-offset-3 auth-form">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row tabrow">
							<div class="col-md-12">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div>
						    <?php echo  validation_errors(); ?>
							<div class="col-lg-12">
								<?php echo form_open('users/login'); ?>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" >
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" >
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view('partial-views/scriptLinks'); ?>
           
    <script>
        //for using jQuery
        $(function() {

            

        });
    </script>
            
</body>


<?php $this->load->view('partial-views/footer'); ?>