<?php 
    session_start();
    if($_SESSION['logged']==0){
        header("Location: index.php") ;
    }else{
?>

<?php  include "includes/header.php"; ?>   
<?php  include "includes/navigation.php"; ?>    

<?php 
    if(isset($_POST['submit'])){
        $body = $_POST['body'] ."   My Email:" . $_SESSION['user_email'];
        $subject = wordwrap($_POST['subject'],70);
        $to = "rachit.khurana@yahoo.com";
        $header = "From: rachit.khurana@yahoo.com";

        if(mail($to,$subject,$body,$header)){
            echo "<script>alert('We have received your message. Thank you for contacting us!')</script>";
        }else{
            echo "<script>alert('Whoops! Message not sent, please try again later')</script>";
        }
    }   
    // if(isset($_POST['submit'])){
    //     $body = $_POST['body'] ."   My Email: " . $_SESSION['user_email'];
    //     $name = "Message Received From: " . $_POST['name'];
    //     $subject = wordwrap($_POST['subject'],70);
    //     include "mail.php";
    // }
        
?>
    <!-- Page Content -->
    <div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-9 col-xs-offset-1">
                    <div class="form-wrap">
                    <h1>Contact Form</h1>
                    <label>We will respond to your email: <?php echo $_SESSION['user_email'];?> </label>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter the Subject">
                            </div>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Enter your message"></textarea>
                    
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send">
                        </form>
                    
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
</div>
            <hr>

<?php include "includes/footer.php";?>
<?php }?>