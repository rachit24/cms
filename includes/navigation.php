<?php include "db.php" ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Rachit's CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php                       
                        $query = "SELECT * FROM categories LIMIT 3";
                        $select_all_categories_query = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($select_all_categories_query)){
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>
    
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="home_logout.php">Logout</a></li>
                    <li><a href="#">Signed In As
                        <?php 
                            session_start();
                        ?>
                        <?php echo $_SESSION['username'];?>
                        <?php echo "(" . $_SESSION['user_role'] . ")";?>
                    </a></li>

                    <?php 
                        if($_SESSION['user_role']!=='admin'){
                            // echo "Subscriber";
                        }
                        else{
                    ?>

                    <li><a href="admin">Admin</a></li>

                    <?php
                        }
                    ?>

                    <?php 
                        if(isset($_SESSION['username'])){
                            if($_SESSION['user_role']=='admin'){
                                if(isset($_GET['p_id'])){
                                    $post_id = $_GET['p_id'];
                                    echo "<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a></li>";
                                }
                            }
                        }
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
