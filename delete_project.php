
<?php
include 'connect.php';

$phone = filter_input(INPUT_POST,'customer_phone');

$sql = "DELETE FROM `projects` WHERE `Customer Phone`='$phone'";
$rooms = array("bedroom_1","bedroom_2","living_room","exterior","kitchen_1","kitchen_2","bathroom_1","bathroom_2");
if (mysqli_query($conn, $sql)) {
	$query = "SELECT  `Rooms` FROM `projects` WHERE `Customer Phone`='$phone'";
	$retval = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($retval);
	for($i = 0 ; $i < 8 ; $i++){
		$file_name1 = $phone."_".$rooms[$i].".jpeg";
		$file_name2 = $phone."_".$rooms[$i].".jpg";
		if(file_exists($file_name1))
		{
			unlink($file_name1);
		}
		elseif(file_exists($file_name2))
		{
			unlink($file_name2);
		}
	}
    header('Location: http://www.yourwebsite.com/panel/add_project.php');
	}
 else{
  echo 'Sorry , Some Error Occured.';
}

mysqli_close($conn);
?>