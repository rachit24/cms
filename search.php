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

                <?php 
                    if(isset($_POST["submit"])){
                        $search = $_POST["search"];
                ?>
                <h1 class="page-header">
                    Results showing for <?php echo " '" .  $search .  "' "; ?>
                </h1> 
                <?php   
                        $query = "SELECT * FROM posts where post_tags LIKE '%$search%' ";
                        $search_query = mysqli_query($conn, $query);
                
                        if(!$search_query){
                            die("Query failed". mysqli_error($conn));
                        }
                        $count = mysqli_num_rows($search_query);
                        if($count == 0){
                            echo "<h2>No result found!</h2>";
                        }
                        else{
                            
                            while($row = mysqli_fetch_assoc($search_query)){
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_id = $row['post_id'];
                                $post_image = $row['post_image'];
                                $post_content = substr($row['post_content'], 0, 300) . "...";
                                ?>                                    
                                <!-- Blog Post -->        
                                <h2>
                                    <a href="#"><?php echo $post_title ?></a>
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
                            <?php }        
                        }
                    }?> 

            </div>

            <?php include "includes/sidebar.php" ?>           

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"?>
<?php }?>