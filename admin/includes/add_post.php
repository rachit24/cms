<?php   
   if(isset($_POST['create_post'])) {
   
            $post_title        = $_POST['post_title'];
            $post_author        = $_POST['post_author'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tags         = $_POST['post_tags'];
            $post_content      = $_POST['post_content'];
            $post_date         = date('d-m-y');
       
        move_uploaded_file($post_image_temp, "../images/$post_image" ); 
       
      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status,post_comment_count,post_views_count) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}', '0', '0')"; 
             
      $create_post_query = mysqli_query($conn, $query);  
          
      confirmQuery($create_post_query);

      echo "<h4 class='bg-success'>Post Added.</h4>";
       
   }
    
?>

    <form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for="post_title">Post Title</label>
         <textarea class="form-control" name="post_title" cols="30" rows="1"></textarea>
      </div>

      <div class="form-group">
           <label for="post_category_id">Post Category</label>
           <br>
           <select class="form-select" aria-label=".form-select example" name="post_category" id="post_category">
           <option value="Miscellaneous">Select Category</option>
               <?php 
                    $query = "SELECT * FROM categories";
                    $select_category = mysqli_query($conn, $query);
                    confirmQuery($select_category);
                    while($row = mysqli_fetch_assoc($select_category)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<option value= '{$cat_id}'>{$cat_title}</option>";
                    }
                    ?>
           </select>
        </div>
        
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" name="post_author">
        </div>
        
        <div class="form-group">
           <label for="post_status">Post Status</label>
           <br>
         <select class="form-select" name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
      
    <div class="form-group">
         <label for="image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
      </div>
      <script>
            CKEDITOR.replace('post_content');
            CKEDITOR.replace('post_title');
      </script>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>

</form> 
    