<?php
session_start();
$idUser = $_POST['idUser'];
$fullName = $_POST['fullname'];
$address = $_POST['address'];
$phone = $_POST['phone'];

require_once "../config/connect.php";

$addTrans = mysqli_query($con, "insert into transactions(id_user) values ($idUser)");
$sqlIdTrans = mysqli_query($con, "select * from transactions where id_user = '$idUser' order by id_trans desc limit 1");
$idTrans = mysqli_fetch_array($sqlIdTrans);

$sqlCart = mysqli_query($con, "select * from cart where id_user = '$idUser'");
while ($rowCart = mysqli_fetch_array($sqlCart)) {
    $updStok = mysqli_query($con, "update products set stock = stock - $rowCart[2] where id_products = $rowCart[1]");

    $sqlProduct = mysqli_query($con, "select * from products where id_products = $rowCart[1]");

    $rowProduct = mysqli_fetch_array($sqlProduct);

    $sub = $rowCart[2] * $rowProduct[3];

    $addTransDetail = mysqli_query($con, "insert into transactions_detail values ('$idTrans[0]','$rowCart[1]','$rowProduct[3]','$rowCart[2]','$sub')");
}

$sqlGrandTotal = mysqli_query($con, "select sum(subtotal) from transactions_detail where id_trans = '$idTrans[0]'");
$grandTotal = mysqli_fetch_array($sqlGrandTotal);
if ($addTransDetail) {
    mysqli_query($con, "update transactions set grandtotal = $grandTotal[0] where id_trans = '$idTrans[0]'");

    mysqli_query($con, "insert into shipment(id_trans,fullname,address,phone) values ('$idTrans[0]','$fullName','$address','$phone')");

    mysqli_query($con, "delete from cart where id_user = $idUser");
}
?>

<script>
    alert("Thanks! Your order will be shipped :)");
    document.location = '../index.php';
</script>