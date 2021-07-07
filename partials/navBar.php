<?php
    session_start();
    include('database/constants.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Of India</title>

    <!-- Import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Style sheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Header section-->
    <header>
        <div class="user">
            <img src="img/display.jpg" alt="">
            <h3 class="name">Bank <span>of</span> India</h3>
        </div>

        <nav class="navBar">
            <ul>
                <li><a href="<?php echo SITEURL;?>index.php">Home</a></li>
                <li><a href="<?php echo SITEURL;?>users.php">All customers</a></li>
                <li><a href="<?php echo SITEURL;?>new_user.php">Create new user</a></li>
                <li><a href="<?php echo SITEURL;?>contact.php">Contact us</a></li>
            </ul>
        </nav>   
    </header>
    <div class="fas fa-bars" id="menu"></div>
