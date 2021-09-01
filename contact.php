<?php  include "includes/header.php"; ?>   
<?php  include "includes/navigation.php"; ?>    

<?php 
    if(isset($_POST['submit'])){
        $body = $_POST['body'];
        $email = $_POST['email'];
        $subject = wordwrap($_POST['subject'],70);
        $to = "dekhlo30@gmail.com";
        $header = "From: ". $_POST['email'];

        if(mail($to,$subject,$body,$header)){
            echo "Messagesent";
        }else{
            echo "nahi jaa raha yar";
        }
    }   
        
?>
    <!-- Page Content -->
    <div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                    <h1>Contact Form</h1>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter the Subject">
                            </div>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                    
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                        </form>
                    
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
</div>
            <hr>

<?php include "includes/footer.php";?>
