<!DOCTYPE html>
<html>
 <head>
 	<title> Project Customer Panel </title>
 	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Panorama — A-Frame">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="https://aframe.io/releases/0.6.1/aframe.min.js"></script>

<style >
	
	
	html, body 
	{
    height: 100%;
    width: 100%;
    font-family:Arial;
    background-color: #4d94ff;
	}

  #link_card
  {
    margin-left: 2.5%;
  }

  #content_frame
  {
    width: 100%;  
    height: 100%;
  }


</style>
</head>
<body> 
<div class="row">
<?php 
  include 'connect.php';
  $email = $_GET['email'];
  $rooms = array("bedroom_1","bedroom_2","living_room","exterior","kitchen_1","kitchen_2","bathroom_1","bathroom_2");
  $room = array("Bedroom 1","Bedroom 2","Living Room","Exterior","Kitchen 1","Kitchen 2","Bathroom 1","Bathroom 2");
  $sql = 'SELECT `Rooms` FROM  `projects`';
  $retval = mysqli_query( $conn ,$sql);
  if(! $retval ) {
        die("Sorry We Are DDown :( ");
     }; 
  $sql = "SELECT `Customer Phone` FROM `projects` WHERE `Customer Email` = '$email'";
  $ret_phone = mysqli_query( $conn ,$sql);
  if(! $ret_phone ) {
        die("Sorry We Are Down :( ");
     }
  else
  {
    $row = mysqli_fetch_array($ret_phone);
    $phone =  $row[0];
  }
  while ($row = mysqli_fetch_array($retval)) {
    $array = unserialize($row[0]);
    for ($x = 0; $x <= 7; $x++) {
      if($array[$x] == 1){
        $img_name = $phone."_".$rooms[$x].".jpg";
        echo "<div class=\"col s12 m4 l3\">
        <div class=\"card\">
          <div class=\"card-image\">
            <img onerror=\"this.onerror=null;this.src='nia.jpg';\"  src=\"$img_name\">
            <span class=\"card-title\">$room[$x]</span>
          </div>
        </div>
      </div>";
    }
  }
}
  mysqli_close($conn);
?>
</div>



</body> 	
</html> 
