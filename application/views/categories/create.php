<?php 
    $this->load->view('partial-views/header');
    $this->load->view('partial-views/navbar'); 
?>
 <body>
  
  <div class="container container2">
      <h2><?= $title ?></h2>
      
      <?php echo validation_errors(); ?>
      <?php echo form_open('categories/create'); ?>
      
      <div class="form-group">
          <label for="cat_name">Category Name: </label>
          <input type="text" class="txt-field form-control" name="cat_name" id="cat_name" placeholder="Category Name" required>
      </div>

      
            
              
      <div><input type="submit" value="Create" class="btn btn-primary"></div>
      
          
      
  </div>
   
   <?php
        $this->load->view('partial-views/scriptLinks');
        $this->load->view('partial-views/footer');
    ?>
    
</body>
