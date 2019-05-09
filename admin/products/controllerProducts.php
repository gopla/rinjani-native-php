<?php
    include '../../config/connect.php';

    switch ($_GET['act']) {
        case 'delete':
            $btn = $_GET['id'];
            $sql = "delete from products where id_products = '$btn'";
            $q = mysqli_query($con, $sql);
            if ($q) {
                header("location:../index.php?menu=products");
            }
            break;

        case 'store':
            $name = $_POST['var_name'];
            $cat = $_POST['var_cat'];
            $price = $_POST['var_price'];
            $stock = $_POST['var_stock'];
            $desc = $_POST['var_desc'];
            $dir = "../../assets/img/products-img/";
            $file = $_FILES['var_img']['name'];
            $file_name = $file;
            $file_tmp = $_FILES['var_img']['tmp_name'];

            $sql = "insert into products(name, id_categories, price, stock, description, img) values('$name','$cat','$price', '$stock', '$desc', '$file_name')";
            $q = mysqli_query($con, $sql);
            if ($q) {
                move_uploaded_file($file_tmp,$dir.$file_name);
                header("location:../index.php?menu=products");
            }
            break;

        case 'update':
            $id = $_POST['var_id'];
            $name = $_POST['var_name'];
            $cat = $_POST['var_cat'];
            $price = $_POST['var_price'];
            $stock = $_POST['var_stock'];
            $desc = $_POST['var_desc'];
            $dir = "../../assets/img/products-img/";
            $file = $_FILES['var_img']['name'];
            $file_name = $file;
            $file_tmp = $_FILES['var_img']['tmp_name'];

            $sql = "update products set name = '$name', id_categories = '$cat', price = '$price', stock = '$stock', description = '$desc', img =  '$file_name' where id_products = '$id'";
            $q = mysqli_query($con, $sql);
            if ($q) {
                move_uploaded_file($file_tmp,$dir.$file_name);
                header("location:../index.php?menu=products");
            }else {
                echo $sql;
            }
            break;
    }
?>