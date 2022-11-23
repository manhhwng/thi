<?php
session_start();
$conn = mysqli_connect("localhost", "store", "123456h", "store") or die($conn);

if (isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0)
		{
			echo '<script language="javascript">alert("Email đã có người đăng ký xin vui lòng nhập lại!"); window.location="register.php";</script>';
			die ();
		}
	else 
	{
		$query = mysqli_query($conn, "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')");
		echo '<script language="javascript">alert("Đăng ký thành công"); window.location="Login.php"</script>';
		//header("location:http://localhost/store/Login.php");
	}
}
?>