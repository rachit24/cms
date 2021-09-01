<?php 
    session_start();
    if($_SESSION['logged']==0){
        header("Location: login_page.php") ;
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
                <?php
                    $per_page = 3;
                     if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = "";
                    }
                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }else{
                        $page_1 = ($page*$per_page)-$per_page;
                    }
                ?>
            <h1 class="page-header">
                All Posts:-
                <!-- <small>All Blogs:-</small> -->
            </h1> 

                <?php 
                    $post_query_count = "SELECT * from posts";
                    $find_count = mysqli_query($conn,$post_query_count);
                    $count = mysqli_num_rows($find_count);
                    $count = ceil($count/$per_page);

                    $query = "SELECT * FROM posts LIMIT $page_1 , $per_page";
                    $select_all_posts_query = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_title = $row['post_title'];
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 300) . "...";
                        $post_status = $row['post_status'];

                        if($post_status == 'published'){
                            
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
                <a href="post.php?p_id=<?php echo $post_id ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> 

                <?php } }?>
      
            </div>

            <?php include "includes/sidebar.php" ?>           

        </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
            <?php 
                for($i=1;$i<=$count;$i++){

                    if($i == $page){
                        echo "<li><a style='background-color:black; color:white;' href='home.php?page={$i}'>{$i}</a></li>";
                    }
                    else{
                        echo "<li><a href='home.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>

        </ul>

<?php include "includes/footer.php"?>

<?php }?>