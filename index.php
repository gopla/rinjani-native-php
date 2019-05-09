<?php
include("config/protect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/js/jquery-ui-1.12.1/jquery-ui.min.css">
    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="assets/js/app.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="navbar">
        <img src="assets/img/logo.png" alt="logo">
        <div>
            <a href="index.php?menu=catalogue" id="linkCat" class="navLink">
                <i class="fas fa-list    "></i>
                <span>Catalogue</span>
            </a>
            <a href="index.php?menu=mycart" id="linkCart">
                <i class="fas fa-cart-arrow-down    "></i>
                <span>My Cart</span>
            </a>
            <a href="index.php?menu=about" id="linkAbout" class="navLink">
                <i class="fas fa-phone    "></i>
                <span>About Us</span>
            </a>

            <a href="login/logout.php" id="linkLogout">
                <i class="fas fa-power-off    "></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
    <?php
    if (empty($_GET['menu'])) {
        require_once "user/catalogue.php";
    } else {
        switch ($_GET['menu']) {
            case 'catalogue':
                require_once "user/catalogue.php";
                break;

            case 'about':
                require_once "user/about.php";
                break;

            case 'mycart':
                require_once "user/cart.php";
                break;
        }
    }
    ?>
</body>

</html>