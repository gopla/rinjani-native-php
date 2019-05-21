<?php
include '../../config/connect.php';

$id = $_POST['idTrans'];

$sql = mysqli_query($con, "update transactions set status = 0 where id_trans = '$id'");

if ($sql) {
    header("location:../index.php?menu=transactions");
}
