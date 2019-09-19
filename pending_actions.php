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

  textarea
  {
    height: 100%;
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
  <div class="col l8 m8 s12 card push-l2 push-m2">
    <center><h5 class="row">My Pending Actions</h5></center>
    <center><p>(All the actions pending from your side appear  here)</p></center>
    <?php 
    $email = $_GET['email'];
    include 'connect.php';
    $sql = "SELECT `Pending` FROM `projects` WHERE `Customer Email` = '$email'";
    $retval = mysqli_query($conn,$sql );
    if(!$retval){
      echo "Sorry We Are Down :(";
    }
    else
    {
      $row = mysqli_fetch_array($retval);
      $changes = unserialize($row[0]);
      if($changes){
        foreach($changes as $change){
          echo "<p class=\"row\"> ~ $change</p></center>";
        }
      }
    }
    ?>
  </div>
</div>



</body> 	
</html> 
