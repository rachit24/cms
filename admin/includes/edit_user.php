<?php 
        if(isset($_GET['edit_user'])){
            $user_id = $_GET['edit_user'];
        }

        $query = "SELECT * FROM users  WHERE user_id = $user_id";
        $select_users = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($select_users)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            // $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_role = $row['user_role'];
            // $user_image = $row['user_image'];
            $user_email = $row['user_email'];
        }

        if(isset($_POST['edit_user'])){

            $username = $_POST['username'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_role = $_POST['user_role'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];

            $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
     
            $query = "UPDATE users SET ";
            $query .="user_firstname  = '{$user_firstname}', ";
            $query .="user_lastname = '{$user_lastname}', ";
            $query .="user_role   =  '{$user_role}', ";
            $query .="username = '{$username}', ";
            $query .="user_email = '{$user_email}',";
            $query .="user_password   = '{$user_password}'";
            $query .= "WHERE user_id = {$user_id} ";

            $edit_user_query = mysqli_query($conn,$query);
    
            confirmQuery($edit_user_query);

            echo "User Updated" . " <a href='users.php'>View Users?</a>";
            
        }
?>


<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
        </div>
        
        <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
        </div>
        <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
        </div>

        <div class="form-group">
           <label for="user_email">Email</label>
            <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
          </div>

        <div class="form-group">
           <label for="user_password">Password</label> 
            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
          </div>

      <div class="form-group">
         <label for="user_role">Role</label>
         <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php 
            if($user_role == 'admin') {
                echo "<option value='subscriber'>subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            }
            ?>
         </select>
      </div>
            
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update">
      </div>

</form>