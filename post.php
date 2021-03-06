<?php 
    session_start();
    if($_SESSION['logged']==0){
        header("Location: index.php") ;
    }else{
?>
<?php include "includes/header.php"?>
<!-- Navigation -->
<?php include "includes/navigation.php"?>
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                Welcome To the Blogging Site
                <small>All Blogs:-</small>
            </h1> 

                <?php 

                    if(isset($_GET['p_id'])){
                        $post_id = $_GET['p_id'];
      
                        $query = "SELECT * FROM posts WHERE post_id = $post_id";
                        $select_all_posts_query = mysqli_query($conn, $query);
                        if(!$select_all_posts_query){
                            echo("Error in query");
                        }
                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                ?>
                                    
                                    
                <!-- Blog Post -->        
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?p_auth=<?php echo $post_author?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr> 

                <?php }
                    } 
                    else{
                        header("Location:index.php");
                    }
                ?>

                <!-- Blog Comments -->
                <?php 
                    if(isset($_POST['create_comment'])){
                        $post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                            $query = "INSERT into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                            $query .= "VALUES ($post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

                            $create_comment_query = mysqli_query($conn,$query);
                            if(!$create_comment_query){
                                die('Query Failed');
                            }               
                            echo "<script>alert('Your comment has been submitted for approval');</script>";
                        }
                        else{
                            echo "<script>alert('Please Enter all fields');</script>";
                        }  
                    }

                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id";
                    $comment_count = mysqli_query($conn,$query);
                ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post">
                    <div class="form-group">
                        <label for="comment_author">Author</label>
                        <input type="text" name="comment_author" class="form-control" value= "<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input type="text" name="comment_email" class="form-control" value = "<?php echo $_SESSION['user_email'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Your Comment</label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php 
                $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approved' ORDER BY comment_id DESC";
                $select_comment = mysqli_query($conn,$query);
                if(!$select_comment){
                    die('Query Failed');
                }
                while($row= mysqli_fetch_array($select_comment)){
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];
            ?>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author; ?>
                        <small><?php echo $comment_date; ?></small>                        
                    </h4>
                    <?php echo $comment_content; ?>
                </div>
            </div>      

            <?php  }  ?>

        </div>
        <?php include "includes/sidebar.php" ?>           

        </div>
        <hr>

<?php include "includes/footer.php"?>
<?php }?>