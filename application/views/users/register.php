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
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div>
						    <?php echo  validation_errors(); ?>
							<div class="col-lg-12">
								<?php echo form_open_multipart('users/register'); ?>
								    <div class="form-group">
										<input type="text" name="fullname" id="fullname" tabindex="1" class="form-control" placeholder="Fullname" value="" required>
									</div>
									
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									
									<div class="form-group">
										<div class="radio">
                                         <label for="gender">Gender: </label>
                                          <label><input type="radio" name="gender" value="Male" checked>Male</label>
                                          <label><input type="radio" name="gender" value="Female">Female</label>
                                        </div>    
									</div>
									
									<div class="form-group">
                                          <label for="upload">Profile Picture: </label>
                                          <input type="file" class="form-control" name="userfile" size="20">
                                    </div>
									
									<div class="form-group">
										<input type="text" name="occupation" id="occupation" tabindex="1" class="form-control" placeholder="occupation" value="" required>
									</div>
									
									<div class="form-group">
										<input type="text" name="zipcode" id="zipcode" tabindex="1" class="form-control" placeholder="Zip Code" value="">
									</div>
									
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirmpass" id="confirmpass" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
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

//            alert('lol!');

        });
    </script>
            
</body>


<?php $this->load->view('partial-views/footer'); ?>