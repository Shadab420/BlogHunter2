<?php 
    $this->load->view('partial-views/header');
    $this->load->view('partial-views/navbar'); 
?>
<body>
    <div class="container container2">
<!--       content here -->
           <div class="row profileRow">
              
              
                  
                  <div class="col-md-12">
                      <img src="<?php echo base_url(); ?>assets/img/users/<?php echo $user->propic; ?>" alt="no-img" class="profilePic img-responsive">
                      <div class="heading">
                            <h2><?php echo $user->fullname; ?></h2>
                            <h5>
                                   <?php if($user->occupation):
                                        echo $user->occupation;
                                    else:
                                    ?>
                                    No Occupation
                                    <?php endif; ?>
                                    
                            </h5>
                      </div>
                      
                      
                      <hr>
                      
                      <div class="user-info-div col-md-8">
                          
                        <div id="navtabs1">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">User Information</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">User Reviews</a>
                          </li>
<!--
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Dropdown
                            </a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab" data-toggle="tab" aria-controls="dropdown1">@fat</a>
                              <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a>
                            </div>
                          </li>
-->
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              
                              <p><strong>Username:</strong> <?php echo $user->username; ?></p>
                          
                              <p><strong>Gender:</strong> <?php echo $user->gender; ?></p>


                              <p><strong>Member Since:</strong> <?php echo $user->register_date; ?></p>

                              <p><strong>Total Posts:</strong> <?php echo $user->total_posts; ?> (<a href="<?php echo base_url(); ?>users/posts/<?php echo $user->id; ?>">See Posts</a>)</p>
                              
                              
                              
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div id="navtabs2">
<!--
                              <ul class="nav nav-tabs">
                                <li class="nav-item">
                                  <a class="nav-link active"  id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2">Profile 2</a>
                                </li>
                              </ul>
-->
                              <div class="tab-content">
                               <div class="tab-pane active"  id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                                    Reviews for this user
                               </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab">Dropdown fat</div>
                          <div class="tab-pane fade" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">Dropdown mdo</div>
                        </div>
                          </div>
                          
                      </div>
                      
                      
                      
                      
                      

                  </div>
              
               
               
               
           </div>
   
   
    </div> 
   <?php
        $this->load->view('partial-views/scriptLinks');
        $this->load->view('partial-views/footer');
    ?>
    
</body>

 
