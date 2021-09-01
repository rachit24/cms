<?php 
        if(isset($_GET['p_id'])){
            $post_id = $_GET['p_id'];
        }

        $query = "SELECT * FROM posts WHERE post_id=$post_id";
        $select_posts_id = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($select_posts_id)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_image = $row['post_image'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
        }

        if(isset($_POST['edit_post'])){
            $post_title        = $_POST['post_title'];
            $post_author        = $_POST['post_author'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
            $post_tags         = $_POST['post_tags'];
            $post_content      = $_POST['post_content'];

            move_uploaded_file($post_image_temp, "../images/$post_image" ); 

            if(empty($post_image)) {
                $query = "SELECT * FROM posts WHERE post_id = $post_id ";
                $select_image = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($select_image)) {
                    $post_image = $row['post_image'];
                 
                }
            }

            $query = "UPDATE posts SET ";
            $query .="post_title  = '{$post_title}', ";
            $query .="post_author  = '{$post_author}', ";
            $query .="post_category_id = '{$post_category_id}', ";
            $query .="post_date   =  now(), ";
            $query .="post_status = '{$post_status}', ";
            $query .="post_tags   = '{$post_tags}', ";
            $query .="post_content= '{$post_content}', ";
            $query .="post_image  = '{$post_image}' ";
            $query .= "WHERE post_id = {$post_id} ";
            
            $update_post = mysqli_query($conn,$query);
            
            confirmQuery($update_post); 
            echo "<h4 class='bg-success'>Post Updated. <a href='../post.php?p_id={$post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></h4>";
        }
?>

<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for="post_title">Post Title</label>
         <textarea class="form-control "name="post_title" cols="30" rows="1"><?php echo $post_title?></textarea>
      </div>

        <div class="form-group">
           <label for="post_category">Post Category ID</label>
           <br>
           
           <select name="post_category" id="post_category">
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
         <input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>">
      </div>
      
       <div class="form-group">
            <label for="post_status">Post Status</label>
            <br>
         <select class="form-group" name="post_status" id="">
             <!-- <option value="draft">Post Status</option> -->
             <option value="published"><?php echo $post_status?></option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
      
      <div class="form-group">
          <label for="image">Current Image</label> <br>
          <img src="../images/<?php echo $post_image; ?>" alt="no image" width="100"> 
        </div>

      <div class="form-group">
          <input type="file" name="image">
        </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags?>">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10"><?php echo $post_content?></textarea>
      </div>
      <script>
            CKEDITOR.replace('post_content');
            CKEDITOR.replace('post_title');
      </script>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_post" value="Edit Post">
      </div>

</form>