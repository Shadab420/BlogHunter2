<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">BlogHunter</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>/about">About</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>posts">Blog</a>
          </li>
          
          
        </ul>
        
        
        
        
        <ul class="nav navbar-nav navbar-right">
            
          <?php if(!$this->session->userdata('logged_in')): ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url()?>users/login">Login</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url()?>users/register">Register</a>
          </li>
          
          
          
          <?php else: ?>
          
          <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>categories/create">Create Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>posts/create">Create Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>users/posts/<?php echo $this->session->userdata('user_id'); ?>">My Posts</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url()?>users/profile/<?php echo $this->session->userdata('username'); ?>"><?php echo ucfirst($this->session->userdata('username')); ?>'s Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url()?>users/logout">Logout</a>
          </li>
          
          <?php endif; ?>
          
          
        </ul>
        
        
      </div>
</nav>


<div>
    <!--    Show flash messages -->
    
    <?php if($this->session->flashdata('user_registered')): ?>
        
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_creation_failed')): ?>
        
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_creation_failed').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_created')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('post_created').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_created_now_publish')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('post_created_now_publish').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_updated')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('post_updated').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_published')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('post_published').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_hided')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('post_hided').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('post_deleted')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('post_deleted').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('category_created')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('category_created').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('not_loggedin')): ?>
        
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_loggedin').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('user_loggedin')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('user_loggedin').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('login_failed')): ?>
        
        <?php echo '<p class="alert alert-danger animated tada">'.$this->session->flashdata('login_failed').'</p>' ?>
    
    <?php endif ?>
    
    <?php if($this->session->flashdata('user_loggedout')): ?>
        
        <?php echo '<p class="alert alert-success animated tada">'.$this->session->flashdata('user_loggedout').'</p>' ?>
    
    <?php endif ?>
</div>