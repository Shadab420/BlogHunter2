<h5 class="sidebar_title"> Side Menu </h5>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <a href="#" class="sidebarlink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         
            Posts by Categories
        
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
           <ul>

          
                <?php

                    $categories = $this->db->get('categories')->result_array();

                    foreach($categories as $category)
                    {
                ?>
                       <li><a href="<?php echo base_url().'categories/posts/'.$category['id']; ?>"><?php echo $category['cat_name']; ?></a></li>

                <?php
                    }


                  ?>
                  <li><a href="<?php echo base_url().'posts/'; ?>">All Categories </a></li>
             </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <a href="#" class="sidebarlink collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         
            Authors
          
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <ul>

          
                <?php

                    //get authors who posts minimum 1 post.
                    
                    $this->db->select('id');
                    $this->db->select('username');
//                    $this->db->where_in('total_posts', '3');
                    $this->db->where('total_posts >=', '1');
                    $query = $this->db->get('users');

                    // and fetch result
//                    $res = $query->result(); // as object
                    $authors = $query->result_array(); // as array
            
                    

                    foreach($authors as $author)
                    {
                ?>
                    <li><a href="<?php echo base_url(); ?>users/profile/<?php echo $author['username']; ?>" title="view Profile"><?php echo $author['username']; ?></a><a href="<?php echo base_url(); ?>users/posts/<?php echo $author['id']; ?>"> <i class="fa fa-newspaper-o" title="view posts"></i></a></li>   
                    
                <?php
                    }


                  ?>
                  
             </ul>
      </div>
    </div>
  </div>
<!--
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
-->
</div>

