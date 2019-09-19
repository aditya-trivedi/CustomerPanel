
<?php
include 'connect.php';

$email = filter_input(INPUT_POST,'email');
$pass = filter_input(INPUT_POST,'password');
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST,'phone');

$sql = "INSERT INTO `admin` (`Name`, `Email` ,`Password` ,`Phone` ) VALUES ('$name','$email','$pass','$phone')";

if (mysqli_query($conn, $sql)) {
    header('Location: http://www.yourwebsite.com/panel/add_admin_form.php');
} else{
  echo 'Sorry , Some Error Occured.';
}

mysqli_close($conn);
?>