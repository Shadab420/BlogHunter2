<body>
  
  <div class="container container2">
      <h2><?= $title ?></h2>
      
      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('posts/create'); ?>
      
      <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" class="txt-field form-control" name="title" id="title" placeholder="title" required>
      </div>

      <div class="form-group">
          <label for="body">Body: </label>
          <textarea class="txt-field form-control" name="body" id="body" placeholder="Write here!" required></textarea>
      </div>
      
      <div class="form-group">
          <label for="category">Category: </label>
          <select name="cat_id" class="form-control">
              <?php foreach($categories as $category): ?>
                   
                   <option value="<?php echo $category['id']; ?>"><?php echo $category['cat_name']; ?></option>
                
              <?php endforeach; ?>
          </select>
      </div>
      
      <div class="form-group">
          <label for="upload">Upload Image: </label>
          <input type="file" class="form-control" name="userfile" size="20">
      </div>
              
      <div><input type="submit" value="Create" class="btn btn-primary"></div>
      
          
      
  </div>
    
</body>
