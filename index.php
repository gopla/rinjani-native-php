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
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <!-- <link rel="stylesheet" href="assets/css/docs.theme.min.css"> -->

    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.cycle.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Satisfy|Open+Sans|Cinzel" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="assets/js/app.js"></script>
    <title>Rinjani | Outdoor Shop</title>
</head>

<body>
    <div class="navbar">
        <img src="assets/img/logo.png" alt="logo">
        <div>
            <a href="index.php?menu=home" id="linkHome" class="navLink">
                <i class="fas fa-campground    "></i>
                <span>Home</span>
            </a>
            <a href="index.php?menu=catalogue" id="linkCat" class="navLink">
                <i class="fas fa-list    "></i>
                <span>Catalogue</span>
            </a>
            <a href="index.php?menu=mycart" id="linkCart" class="navLink">
                <i class="fas fa-cart-arrow-down    "></i>
                <span>My Cart</span>
            </a>
            <a href="index.php?menu=mytrans" id="linkTrans" class="navLink">
                <i class="fas fa-money-check-alt    "></i>
                <span>My Transaction</span>
            </a>
            <a href="index.php?menu=about" id="linkAbout" class="navLink">
                <i class="fas fa-phone    "></i>
                <span>About Us</span>
            </a>

            <a href="login/logout.php" id="linkLogout" class="navLink">
                <i class="fas fa-power-off    "></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
    <?php
    if (empty($_GET['menu'])) {
        require_once "user/home.php";
    } else {
        switch ($_GET['menu']) {
            case 'home':
                require_once "user/home.php";
                break;

            case 'catalogue':
                require_once "user/catalogue.php";
                break;

            case 'about':
                require_once "user/about.php";
                break;

            case 'mycart':
                require_once "user/cart.php";
                break;

            case 'detail':
                require_once "user/detailProduk.php";
                break;

            case 'checkout':
                require_once "user/formConfirm.php";
                break;

            case 'mytrans':
                require_once "user/mytrans.php";
                break;
        }
    }
    ?>
</body>

</html>