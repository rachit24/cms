<?php 
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['logged'] = 0;
    $_SESSION['user_role'] = 'subscriber';
    header("Location: index.php");

?>