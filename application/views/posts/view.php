<body>
    <div class="container container2">

        <div class="row">

             <div class="col-md-12">

                <div class="row">

                   <div class="latest-posts-div col-lg-9 col-md-9 col-sm-12 col-xs-12">

<!--                        <h3 class="main_title"><?= $title ?></h3>-->

                            <h2 class="main_title"><?php echo $post['title']; ?></h2>


                            
                            <div class="col-md-12 post_time_author">
                            
                                <p class="author_name"><strong>Author: <?php echo $author[0]['username']; ?></strong></p>
                                <p class="category_name"><strong>Category: <?php echo $author[0]['username']; ?></strong></p>
                                <p class="post_time"><strong>Posted at: <?php echo $post['created_at']; ?> </strong></p>
                            </div>
                            
                            
                            <div class="post_body2 col-md-12">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url(); ?>/assets/img/posts/<?php echo $post['post_image']; ?>" class="img-responsive post-img2" alt="No Image">
                                </div>
                               

                               <?php echo $post['body']; ?>

                            </div>
                            
                            


                                <?php if($this->session->userdata('user_id') === $post['user_id']): ?>
                                   
                                   <div class="post-btn-grp row">
                                    
                                    <?php echo form_open('posts/edit/'.$post['slug'])  ?>
                                         <button class="btn btn-primary">Edit</button>
                                     </form>

                                   <?php if($post['published'] == '0'): ?>
                                            
                                        <?php echo form_open('posts/publish/'.$post['id'])  ?>
                                             <button class="btn btn-success">publish</button>
                                         </form>
                                    <?php else: ?>
                                        <?php echo form_open('posts/hide/'.$post['id'])  ?>
                                             <button class="btn btn-success">Hide</button>
                                         </form>
                                    
                                    
                                    <?php endif; ?>

                                    <?php echo form_open('posts/delete/'.$post['id']) ?>
                                         <button class="btn btn-danger">Delete</button>
                                    </form>

                                   </div>
                                    

                                <?php endif; ?>
                            
                            <hr>
                            
                            <h3>Comments</h3>
                            
                            <?php if(!$comments): ?>
    
                            <p>No comments!</p>
                            
                            <?php else: 
                    
                                foreach($comments as $comment):
                    
                            ?>
                            <div style="background: brown; color: yellow;">
                                <p><?php echo $comment['comment']; ?></p>
                                <p>Posted By: <?php echo $comment['username']; ?></p>
                                <p>At: <?php echo $comment['created_at']; ?></p>
                            </div>
                            
                            
                            
                            <?php endforeach; ?>
                            <?php endif; ?>
                            
                            
                            
                            <hr>
                            
                            <h3>Add Comment</h3>
                            
                            <?php echo form_open('comments/create/'.$post['id']); ?>
                            
                            <?php echo validation_errors(); ?>
                            
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="username" value="<?php echo $this->session->userdata('username') ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email"  value="<?php echo $this->session->userdata('email') ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Comment</label>
                                    <textarea name="comment" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
                                <button class="btn btn-primary"> Submit</button>
                            
                            </form>



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



</body>



















































<!--
 <body>
  <div class="container">






  </div>
</body>
-->
