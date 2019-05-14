<?php
require_once "../config/connect.php";

$id = $_POST['id'];
$idUser = $_POST['idUser'];
switch ($_GET['act']) {
    case 'plus':
        $sql = "update cart set qty = qty+1 where id_products = $id && id_user = $idUser";
        break;

    case 'minus':
        $sqlCek = mysqli_query($con, "select * from cart where id_products = $id");
        $row = mysqli_fetch_array($sqlCek);
        if ($row[1] == 1) {
            $sql = "delete from cart where id_products = $id && id_user = $idUser";
        } else {
            $sql = "update cart set qty = qty-1 where id_products = $id && id_user = $idUser";
        }
        break;

    case 'store':
        $sqlCek = mysqli_query($con, "select * from cart where id_products = $id");
        $row = mysqli_fetch_array($sqlCek);
        if ($row[0] == $id) {
            $sql = "update cart set qty = qty+1 where id_products = $id && id_user = $idUser";
        } else {
            $sql = "insert into cart values($idUser,$id,1)";
        }
        break;

    case 'del':
        $sql = "delete from cart where id_products = $id && id_user = $idUser";
        break;

    case 'drop':
        $sql = "delete from cart where id_user = $idUser";
        break;
}

mysqli_query($con, $sql);
if ($_GET['act'] != 'store') {
    header("location:../index.php?menu=mycart");
} else {
    header("location:../index.php?menu=catalogue");
}
