<form action="" method = "post">
                               <div class="form-group">
                                   <label for="cat_title">Update Category</label>
                                    <?php 

                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                            $select_category = mysqli_query($conn, $query);
                                            while($row = mysqli_fetch_assoc($select_category)){
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                            
                                            ?>
                                            <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>">
                                    <?php }} ?>

                               </div>
                               <div class="form-group">
                                   <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                                    <?php 
                                        if(isset($_POST['update'])){
                                            $cat_title = $_POST['cat_title'];             
                                            $query = "UPDATE categories SET cat_title= '{$cat_title}' WHERE cat_id = '{$cat_id}'";
                                            $update_query = mysqli_query($conn,$query);
                                        }
                                    ?>                
                               </div>
                           </form>
                       