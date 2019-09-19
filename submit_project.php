
<?php
include 'connect.php';


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = filter_input(INPUT_POST,'customer_name');
$phone = filter_input(INPUT_POST,'customer_number');
$email = filter_input(INPUT_POST,'customer_email');
$pass = filter_input(INPUT_POST,'password');
$address = filter_input(INPUT_POST,'customer_address');
$supervisor = filter_input(INPUT_POST, 'supervisor');
$budget = filter_input(INPUT_POST,'estimated_budget');

 
define ("filesplace","./");
$room_array = array(0,0,0,0,0,0,0,0);
$rooms = array("bedroom_1","bedroom_2","living_room","exterior","kitchen_1","kitchen_2","bathroom_1","bathroom_2");
$room = array("Bedroom 1","Bedroom 2","Living Room","Exterior","Kitchen 1","Kitchen 2","Bathroom 1","Bathroom 2");
for ($x = 0; $x < 8; $x++) {
 if (is_uploaded_file($_FILES[$rooms[$x]]['tmp_name'])) {

 	if ($_FILES[$rooms[$x]]['type'] == "image/jpeg" or $_FILES[$rooms[$x]]['type'] == "image/jpg"  or $_FILES[$rooms[$x]]['type'] == "image/png") {
 		$pic_name = $phone."_".$rooms[$x];
 		$result = move_uploaded_file($_FILES[$rooms[$x]]['tmp_name'], filesplace."/$pic_name.jpg");
 		if ($result != 1) {
			echo "Some Error Occured While Uploading ".$room[$x]." Design.";
			break;
		}
		else{
			$room_array[$x] = 1;
		}
 		
 	} 
 	else {
 		
		echo "<p>Pictures must be uploaded in JPG format.</p>";
		}
 
}
}

if ($x == 8) {

	$serialize_array = serialize($room_array);
	$sql = "INSERT INTO `projects`(`Customer Name`, `Customer Phone`, `Customer Email`, `Password`,`Address`, `Supervisor`, `Budget` , `Rooms`) VALUES ('$name','$phone','$email','$pass','$address','$supervisor','$budget' ,'$serialize_array')";
			if (mysqli_query($conn, $sql)) {
    			header('Location: http://www.yourwebsite.com/panel/add_project.php');
			}
			else{
  				echo 'Sorry , Some Error Occured.';
			}
	
}



mysqli_close($conn);
?>






