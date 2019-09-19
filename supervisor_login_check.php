
<?php
include 'connect.php';
session_start();
$email = filter_input(INPUT_POST,'email');
$pass = filter_input(INPUT_POST,'password');

$sql = "SELECT  * FROM `supervisor` WHERE  `Email` = '$email';";
$retval = mysqli_query($conn , $sql);
if ($retval) {
	$row = mysqli_fetch_array($retval);
	if(mysqli_num_rows($retval) and $row[3] == $pass){
		
		$_SESSION['s_loggedin'] = true;
    	$_SESSION['s_email'] = $email; 
		header("Location: http://www.yourwebsite.com/panel/supervisor_main_panel.php?email=".$email);
	}
	else {
		header('Location: http://www.yourwebsite.com/panel/invalid_login_supervisor.html');
	}

} else{
  echo 'Sorry , Some Error Occured.';
}

mysqli_close($conn);
?>