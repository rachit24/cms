<?php include "includes/cred_header.php"?>

<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-9 col-xs-offset-1">

                <h4>Login</h4>
                <form action="index.php" method = "post">
                    <div class="form-group">
                        <input name = "username" type="text" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <input name = "password" type="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="login" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
                <p class= 'bg-warning'>Not Registered? <a href="registration.php">Register Here</a></p>
                </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
</div>
<hr>

<?php 
    include "includes/db.php";
    session_start();
    $_SESSION['logged'] = 0;

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
   
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($conn, $query);
        if (!$select_user_query) {
            die("QUERY FAILED" . mysqli_error($conn));
        }
   
        while ($row = mysqli_fetch_array($select_user_query)) {
            $db_user_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
            $db_user_email = $row['user_email'];
   
            if (password_verify($password,$db_user_password)) {
   
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $db_user_firstname;
                $_SESSION['lastname'] = $db_user_lastname;
                $_SESSION['user_role'] = $db_user_role;   
                $_SESSION['user_email'] = $db_user_email; 
                $_SESSION['logged'] = 1;  
                
                if($_SESSION['user_role']=='admin'){
                    echo "<center>";
                    echo "<p class= 'bg-success'>You have been logged in as an admin  successfully!</p>";
                    echo "<a href = './admin' class='btn btn-primary'>Go to Application</a>";                    
                    echo "</center>";
                    // header("Location: ../admin");
                }else{
                    echo "<center>";
                    echo "<p class= 'bg-success'>You have been logged in as a subscriber successfully!</p>";
                    echo "<a href = 'home.php' class='btn btn-primary'>Go to Application</a>";                    
                    echo "</center>";
                }
            }
        }
    }
?>


<?php include "includes/footer.php"?>

