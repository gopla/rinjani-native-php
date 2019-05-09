<?php
    include '../../config/connect.php';

    switch ($_GET['act']) {
        case 'delete':
            $btn = $_GET['id'];
            $sql = "delete from categories where id_categories = '$btn'";
            $q = mysqli_query($con, $sql);
            if ($q) {
                header("location:../index.php?menu=categories");
            }
            break;

        case 'store':
            $name = $_POST['var_name'];
            $sql = "insert into categories(name) values('$name')";
            $q = mysqli_query($con, $sql);
            if ($q) {
                header("location:../index.php?menu=categories");
            }
            break;

        case 'update':
            $name = $_POST['var_name'];
            $id = $_POST['var_id'];
            $sql = "update categories set name = '$name' where id_categories = '$id'";
            $q = mysqli_query($con, $sql);
            if ($q) {
                header("location:../index.php?menu=categories");
            }
            break;
    }
?>