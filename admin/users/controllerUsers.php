<?php
include '../../config/connect.php';

switch ($_GET['act']) {
    case 'delete':
        $btn = $_GET['id'];
        $sql = "delete from users where id_user = '$btn'";
        $q = mysqli_query($con, $sql);
        if ($q) {
            header("location:../index.php?menu=users");
        }
        break;

    case 'store':
        $name = $_POST['var_name'];
        $email = $_POST['var_email'];
        $user = $_POST['var_user'];
        $pass = md5($_POST['var_pass']);
        $role = $_POST['var_role'];

        $sql = "insert into users(fullname, email, username, password, role) values('$name', '$email', '$user', '$pass', '$role')";
        $q = mysqli_query($con, $sql);
        if ($q) {
            header("location:../index.php?menu=users");
        }
        break;

    case 'update':
        $name = $_POST['var_name'];
        $email = $_POST['var_email'];
        $user = $_POST['var_user'];
        $pass = md5($_POST['var_pass']);
        $role = $_POST['var_role'];
        $id = $_POST['var_id'];

        $sql = "update users set fullname = '$name', email = '$email', username = '$user', password = '$pass', role = '$role' where id_user = '$id'";
        $q = mysqli_query($con, $sql);
        if ($q) {
            header("location:../index.php?menu=users");
        }
        break;
}
