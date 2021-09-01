<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response to</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_GET['delete'])){
            $comment_id = $_GET['delete'];
            $query = "DELETE FROM comments where comment_id= {$comment_id}";
            $delete_query = mysqli_query($conn,$query);
            header("Location: comments.php");
        }
        if(isset($_GET['unapprove'])){
            $comment_id = $_GET['unapprove'];
            $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$comment_id}";
            $unapprove_query = mysqli_query($conn,$query);
            header("Location: comments.php");
        }
        if(isset($_GET['approve'])){
            $comment_id = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$comment_id}";
            $approve_query = mysqli_query($conn,$query);
            header("Location: comments.php");
        }
            $query = "SELECT * FROM comments";
            $select_posts = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($select_posts)){
                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_post_id = $row['comment_post_id'];
                $comment_status = $row['comment_status'];
                $comment_email = $row['comment_email'];
                $comment_date = $row['comment_date'];
                echo "<tr>";
                    echo "<td> $comment_id</td>";
                    echo "<td> $comment_author</td>";
                    echo "<td> $comment_content</td>";
                    echo "<td> $comment_email</td>";
                    echo "<td> $comment_status</td>";
                    echo "<td> $comment_date</td>";

                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                    $select_post_id = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($select_post_id)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        echo "<td><a href = '../post.php?p_id=$post_id'>{$post_title}</td>";
                    }

                    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</td>";
                    echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</td>";
                    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>