
<?php
include 'connect.php';

$email = filter_input(INPUT_POST,'email');

$sql = "DELETE FROM `supervisor` WHERE `Email`='$email'";
if (mysqli_query($conn, $sql)) {
    header('Location: http://www.yourwebsite.com/panel/add_supervisor_form.php');
	}
 else{
  echo 'Sorry , Some Error Occured.';
}

mysqli_close($conn);
?>