<?php

$filepath=realpath(dirname(__FILE__));
require_once $filepath.'/../lib/Session.php';
Session::init();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP LOGIN AND REGISTION</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php
    if (isset($_GET['action']) && $_GET['action']=='logout') {
       Session::destory();
    }
?>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary  ">
        
            <a class="navbar-brand text-white">Jami</a>

            <ul class="navbar-nav ml-auto ">
                <?php
                    $id=Session::get('id');
                    $UserLogin=Session::get('login');
                    if ($UserLogin==true) { ?>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="index.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="profile.php?id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($id)))); ?>">Profile</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="note.php">Note</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="?action=logout">Logout</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="login.php">login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="register.php">Register</a>
                </li>
                 <?php } ?>
            </ul>
       

    </nav>
    </div>