<?php include "includes/header.php"?>
<!-- Navigation -->
<?php include "includes/navigation.php"?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                <?php 
                if(isset($_GET['category'])){
                    $post_category_id = $_GET['category'];
                }
                    $query = "SELECT (cat_title) FROM categories WHERE (cat_id )= '{$post_category_id}'";
                    $select_title = mysqli_query($conn, $query);
                    if(!$select_title){
                        die("Failed! " . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($select_title)){
                        $cat_title = $row['cat_title'];
                        echo $cat_title;
                    }
                ?>
                Posts:-
            </h1> 
                <?php 
                    $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
                    $select_all_posts_query = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_title = $row['post_title'];
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 300) . "...";
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
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> 

                <?php } ?>
      
            </div>

            <?php include "includes/sidebar.php" ?>           

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"?>