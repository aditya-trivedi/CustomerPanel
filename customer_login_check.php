
<?php
include 'connect.php';
session_start();
$email = filter_input(INPUT_POST,'email');
$pass = filter_input(INPUT_POST,'password');

$sql = "SELECT  * FROM `projects` WHERE  `Customer Email` = '$email';";
$retval = mysqli_query($conn , $sql);
if ($retval) {
	$row = mysqli_fetch_array($retval);
	if(mysqli_num_rows($retval) and $row['Password'] == $pass){

		$_SESSION['c_email'] = $email;
		$_SESSION['c_loggedin'] = true;
		header('Location: http://www.yourwebsite.com/panel/customer_panel.php?email='.$email);

	}
	else {
		header('Location: http://www.yourwebsite.com/panel/invalid_login_customer.html');
	}

} else{
  echo 'Sorry , Some Error Occured.';
  mysqli_close($conn);
}


?>