<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>

<div id="wrapper">        
    
    <?php include "includes/admin_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Comments Page
                        </h1>
                        <?php 
                            if(isset($_GET['source']))    {
                                $source = $_GET['source'];
                            }else{
                                $source='';
                            }
                            switch($source){
                                case 'add_post':
                                    include "includes/add_comment.php";
                                    break;
                                case 'edit_post':
                                    include "includes/edit_comment.php";
                                    break;
                                default:
                                include "includes/view_all_comments.php";
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>

<?php include "includes/admin_footer.php" ?>