<?php include "includes/header.php"?>
<!-- Navigation -->
<?php include "includes/navigation.php"?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 

                    if(isset($_GET['p_auth'])){
                        $post_auth = $_GET['p_auth'];
                    }
                ?>
                 <h1 class="page-header">
                    All Posts by <?php echo "'" . $post_auth . "'"?>
                </h1> 
                <?php

                    $query = "SELECT * FROM posts WHERE post_author = '{$post_auth}'";
                    $select_all_posts_query = mysqli_query($conn, $query);
                    if(!$select_all_posts_query){
                        die("Faile" . mysqli_error($conn));
                    }
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
        <hr>

<?php include "includes/footer.php"?>