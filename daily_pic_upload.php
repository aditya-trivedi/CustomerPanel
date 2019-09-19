
<?php
$phone = $_GET['phone'];
$email = $_GET['email'];
include 'connect.php'; 
define ("filesplace","./");
$rooms = array("bedroom_1","bedroom_2","living_room","exterior","kitchen_1","kitchen_2","bathroom_1","bathroom_2");
$room = array("Bedroom 1","Bedroom 2","Living Room","Exterior","Kitchen 1","Kitchen 2","Bathroom 1","Bathroom 2");
for ($x = 0; $x < 8; $x++) {
 $temp_name = $rooms[$x];
 if (is_uploaded_file($_FILES[$temp_name]['tmp_name'])) {

 	if ($_FILES[$rooms[$x]]['type'] == "image/jpeg" or $_FILES[$rooms[$x]]['type'] == "image/jpg"  or $_FILES[$rooms[$x]]['type'] == "image/png") {
 		$pic_name = $phone."_".$rooms[$x]."_update";
 		$result = move_uploaded_file($_FILES[$rooms[$x]]['tmp_name'], filesplace."/$pic_name.jpg");
 		if ($result != 1) {
			echo "Some Error Occured While Uploading ".$room[$x]." Design.";
			break;
		}
		else{
			header("Location:http://www.yourwebsite.com/panel/supervisor_project_page.php?email=".$email."&phone=".$phone);
		}
 		
 	} 
 	else {
 		
		echo "<p>Pictures must be uploaded in JPG/JEPG/PNG format.</p>";
		}
 
}
}




mysqli_close($conn);
?>






