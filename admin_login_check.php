
<?php
include 'connect.php';
session_start();
$email = filter_input(INPUT_POST,'email');
$pass = filter_input(INPUT_POST,'password');

$sql = "SELECT  * FROM `admin` WHERE  `Email` = '$email';";
$retval = mysqli_query($conn , $sql);
if ($retval) {
	$row = mysqli_fetch_array($retval);
	if(mysqli_num_rows($retval) and $row['Password'] == $pass){
		
		$_SESSION['a_loggedin'] = true;
    	$_SESSION['a_email'] = $email; 
		header("Location: http://www.yourwebsite.com/panel/admin_main_panel.php?email=".$email);
	}
	else {
		header('Location: http://www.yourwebsite.com/panel/invalid_login_admin.html');
	}

} else{
  echo 'Sorry , Some Error Occured.';
}

mysqli_close($conn);
?>