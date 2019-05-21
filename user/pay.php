<?php
require_once "../config/connect.php";

$idUser = $_POST['idUser'];
$fullName = $_POST['fullname'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$dir = "../assets/img/receipt-img/";
$file = $_FILES['receipt']['name'];
$file_name = $file;
$file_tmp = $_FILES['receipt']['tmp_name'];

$sqlIdTrans = mysqli_query($con, "select * from transactions where id_user = '$idUser' order by id_trans desc limit 1");
$idTrans = mysqli_fetch_array($sqlIdTrans);

$insertShipment = mysqli_query($con, "insert into shipment(id_trans,fullname,address,phone) values ('$idTrans[0]','$fullName','$address','$phone')");

if ($insertShipment) {
    move_uploaded_file($file_tmp, $dir . $file_name);
    mysqli_query($con, "update transactions set status = '2', receipt = '$file_name' where id_trans = '$idTrans[0]'");
}
?>

<script>
    alert("Wait your order to be confirmed ^o^");
    document.location = '../index.php?menu=mytrans';
</script>