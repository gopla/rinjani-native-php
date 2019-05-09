<?php
require_once "../config/connect.php";

$id = $_POST['id'];
switch ($_GET['act']) {
    case 'plus':
        $sql = "update cart set qty = qty+1 where id_products = $id";
        break;

    case 'minus':
        $sqlCek = mysqli_query($con, "select * from cart where id_products = $id");
        $row = mysqli_fetch_array($sqlCek);
        if ($row[1] == 1) {
            $sql = "delete from cart where id_products = $id";
        } else {
            $sql = "update cart set qty = qty-1 where id_products = $id";
        }
        break;

    case 'store':
        $sqlCek = mysqli_query($con, "select * from cart where id_products = $id");
        $row = mysqli_fetch_array($sqlCek);
        if ($row[0] == $id) {
            $sql = "update cart set qty = qty+1 where id_products = $id";
        } else {
            $sql = "insert into cart values($id,1)";
        }
        break;

    case 'del':
        $sql = "delete from cart where id_products = $id";
        break;

    case 'drop':
        $sql = "truncate table cart";
        break;

    case 'buy':
        break;
}
mysqli_query($con, $sql);
if ($_GET['act'] != 'store') {
    header("location:../index.php?menu=mycart");
} else {
    header("location:../index.php");
}
