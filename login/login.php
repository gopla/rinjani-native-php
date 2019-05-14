<?php
require_once("../config/connect.php");

$user = $_POST['username'];
$pass = md5($_POST['password']);

$query = "select * from users where username = '$user' and password = '$pass'";
$login = mysqli_query($con, $query);
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	session_start();
	if ($data['role'] == "admin") {

		$_SESSION['username'] = $user;
		$_SESSION['id'] = $data['id_user'];
		$_SESSION['level'] = "admin";

		header("location:../admin/");
	} else if ($data['role'] == "user") {
		$_SESSION['username'] = $user;
		$_SESSION['id'] = $data['id_user'];
		$_SESSION['level'] = "user";

		header("location:../index.php");
	}
} else {
	echo "
		<script>
			alert('Wrong Username / Password!');
			document.location='cobalogin.html';
		</script>
	";
}
