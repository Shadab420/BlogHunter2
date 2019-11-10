<body>
  
  <div class="container container2">
      <h2><?= $title ?></h2>
      
      <?php echo validation_errors(); ?>
      
      <?php echo form_open('posts/update'); ?>
      
      <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
      
      <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" class="txt-field form-control" name="title" id="title" placeholder="title" value="<?php echo $post['title'] ?>" required>
      </div>

      <div class="form-group">
          <label for="body">Body: </label>
          <textarea class="txt-field form-control" name="body" id="body" placeholder="Write here!" required><?php echo $post['body'] ?></textarea>
      </div>
      
      <div class="form-group">
          <label for="category">Category: </label>
          <select name="cat_id" class="form-control">
              <?php foreach($categories as $category): ?>
                   
                   <option value="<?php echo $category['id']; ?>"><?php echo $category['cat_name']; ?></option>
                
              <?php endforeach; ?>
          </select>
      </div>
      
              
      <div><input type="submit" value="Update" class="btn btn-primary"></div>
          
      
  </div>
    
</body>
