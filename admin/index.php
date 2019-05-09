<?php
include("../config/protectAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets/js/jquery-ui-1.12.1/jquery-ui.min.css" />
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <title>Document</title>
</head>


<body>
    <div class="navbar">
        <img src="../assets/img/logo.png" alt="logo">
        <div>
            <a href="../login/logout.php" id="linkLogout">
                <i class="fas fa-power-off    "></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
    <div class="container_body">
        <div class="sidebar">
            <div class="sidebar_item">
                MENU
            </div>
            <div class="sidebar_container">
                <div class="sidebar_item">
                    <a href="index.php">
                        <i class="fas fa-home    "></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="sidebar_item">
                    <a href="index.php?menu=categories">
                        <i class="fas fa-bars    "></i>
                        <span>Categories</span>
                    </a>
                </div>
                <div class="sidebar_item">
                    <a href="index.php?menu=products">
                        <i class="fas fa-campground    "></i>
                        <span>Products</span>
                    </a>
                </div>
                <div class="sidebar_item">
                    <a href="index.php?menu=users">
                        <i class="fas fa-user-alt    "></i>
                        <span>&nbsp;User</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <?php
                include_once "../config/connect.php";
                $menu = @$_GET['menu'];
                $method = @$_GET['method'];
                if (empty($menu) && empty($method)) {
                    include_once "main.php";
                } else if (!empty($menu) && empty($method)) {
                    switch ($menu) {
                        case 'categories':
                            include_once "categories/index.php";
                            break;

                        case 'products':
                            include_once "products/index.php";
                            break;

                        case 'users':
                            include_once "users/index.php";
                            break;
                    }
                } else if ($menu == "products") {
                    switch ($method) {
                        case 'add':
                            include_once "products/formProducts.php";
                            break;

                        case 'edit':
                            include_once "products/formProducts.php";
                            break;

                        case 'show':
                            include_once "products/detailProducts.php";
                            break;
                    }
                } else if ($menu == "categories") {
                    switch ($method) {
                        case 'add':
                            include_once "categories/formCategories.php";
                            break;

                        case 'edit':
                            include_once "categories/formCategories.php";
                            break;
                    }
                } else if ($menu == "users") {
                    switch ($method) {
                        case 'add':
                            include_once "users/formUsers.php";
                            break;

                        case 'edit':
                            include_once "users/formUsers.php";
                            break;
                    }
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>