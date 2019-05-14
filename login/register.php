<?php
require_once "../config/connect.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$user = $_POST['username'];
$pass = md5($_POST['password']);

$sql = "insert into users(fullname, email, username, password) values('$fullname','$email','$user','$pass')";
$q = mysqli_query($con, $sql);
if ($q) {
    require_once "login.php";
}
