<?php  include "includes/cred_header.php"; ?>   
<?php include "includes/db.php"?>
    <!-- Page Content -->
    <div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-9 col-xs-offset-1">
                    <div class="form-wrap">
                    <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="firstname" class="sr-only">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Firstname">
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="sr-only">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Lastname">
                            </div>
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Create A Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>
                    
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>
                    
                    </div>
                    <p class= 'bg-warning'>Already Registered? <a href="index.php">Login Here</a></p>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
</div>
<hr>

<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !empty($email)){

            $result = mysqli_query($conn,"SELECT user_id FROM users WHERE username = '{$username}'");
            if(mysqli_num_rows($result) == 0) {
                $username = mysqli_real_escape_string($conn, $username);
                $email    = mysqli_real_escape_string($conn, $email);
                $password = mysqli_real_escape_string($conn, $password);

                $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));                
                    
                $query = "INSERT INTO users (username,user_firstname, user_lastname, user_email, user_password, user_role) ";

                $query .= "VALUES('{$username}','{$firstname}','{$lastname}','{$email}', '{$password}', 'subscriber')";

                $register_user_query = mysqli_query($conn, $query);
                echo "<center><h4 class='bg-success'>Thanks for registering with us {$username}. You are now a subscriber! <a href = 'index.php'>Login</a></h4></center>";                
            } else {
                echo "<center><h4 class='bg-danger'>Please choose a different username, ' {$username} ' is already taken! </h4></center>";
            }            
        }else{
            echo "<script>alert('Please fill all fields')</script>";
        }
        
    }
?>

<?php include "includes/footer.php";?>
