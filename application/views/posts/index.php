<?php 
    $this->load->view('partial-views/header');
    $this->load->view('partial-views/navbar'); 
?>
<body>
    <div class="container container2">
        
        <div class="row">
         
             <div class="col-md-12">
                
                <div class="row">

                   <div class="latest-posts-div col-lg-9 col-md-9 col-sm-12 col-xs-12">
                          
                           
                            <h3 class="main_title"><?= $title ?></h3>
                            
                            <form class="form-inline my-2 my-lg-0" action="<?php echo base_url(); ?>posts/getPostsByTitle" method="POST">
                                  <div class="ui-widget">
                                      <input id="search" type="text" name="search" placeholder="Search" autocomplete="on">
                                      
                                    </div>
                                    

                                  <button id="searchBtn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            
                           
                            <?php
                                    foreach($posts as $post)
                                    {
//                                        $post['user_id']))->result_array();
                                        if(($post['published'] === '0' && $post['user_id'] === $this->session->userdata('user_id')) || $post['published'] === '1' )
                                        {
                                        
                                    ?>
                                       <div class="col-md-12 post_info">
                                           
                                           
                                           <div class="row">
                                              
                                              <div class="col-md-3">
                                                <div class="col-md-12 post_title">
                                                    <h5> <?php echo $post['title']; ?> </h5>
                                               </div>
                                               <img src="<?php echo base_url(); ?>/assets/img/posts/<?php echo $post['post_image']; ?>" class="img-responsive post-img" alt="No Image">

                                               </div>

                                               <div class="col-md-9">
                                                  <div class="col-md-12 post_author">
                                                    <p><strong> Author: <?php echo $post['username']; ?> </strong> posted in <strong><?php echo $post['cat_name']; ?>  </strong></p>
                                                   </div>

                                                   <div class="col-md-12 post_create_time">
                                                       <p>Posted at: <?php echo $post['created_at']; ?> </p>
                                                   </div>

                                                   <div class="col-md-12 post_body">
                                                       <p>
                                                           <?php echo word_limiter($post['body'], 50); ?>
                                                           <br>
                                                           
                                                           <a class="btn btn-primary readbtn" href="<?php echo site_url('/posts/view/'.$post['slug']); ?>">Read More</a><br>
                                                        </p>
                                                   </div>

                                               </div>
                                               
                                           </div>
                                           
                                           
                                           

                                        </div>

                                <?php   
                                        }

                                    }
                                ?>
                                
                                <div class="pagination">
                                   <div class="col-md-12" style="text-align: center;">
                                    <?php
                                        //Generate pagination links
                                         echo $this->pagination->create_links();
                                    ?>
                                    
                                    </div>
                                </div>
                                

                         </div>

                         <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                             <?php 
                             
                                $this->load->view('partial-views/sidebar');
                                 
                             ?>
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

 
