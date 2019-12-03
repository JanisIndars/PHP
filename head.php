<?php
    session_start();

    require('utilities/DB.php');
    require('models/User.php');
    require('models/Post.php');

    $db = new DB();
    $user = null;

    if (isset($_SESSION['registered'])) {
        $user = User::get($_SESSION['registered']);
    }

    require('functions.php');


    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
?>
