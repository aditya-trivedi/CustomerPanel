<!DOCTYPE html>
<html>
 <head>
 	<title> iFurnish Customer Panel </title>
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
    background-color: #66a3ff;
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
<?php 
$email = $_GET['email'];
session_start();
if (isset($_SESSION['c_loggedin']) && $_SESSION['c_loggedin'] == true && $_SESSION['c_email'] == $email  ) {

}
else 
{
	header('Location: http://www.yourwebsite.com/panel/invalid_login_customer.html');
}
 ?>
   <nav>
    <div class="nav-wrapper red lighten-1">
      <a href="#" class="brand-logo hide-on-med-and-down" >iFurnish | Customer  Panel</a>
        <a href="#" class="brand-logo" >iFurnish</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="https://www.yourwebsite.com/" target="_blank">Visit Our Website</a></li>
      </ul>
    </div>
 </nav>

<div class="row">
  <div class="col card l2 m2 " id="link_card">
    <?php echo "<center><p><a class=\"truncate\" href=\"selected_designs.php?email=$email\"  target=\"content_frame\"> Selected Designs </a><p></center>"; ?>
  </div>
  <div class="col card l2 m2" id="link_card">
    <?php echo "<center><p><a class=\"truncate\" href=\"request_changes.php?email=$email\"  target=\"content_frame\"> Request Change </a><p></center>"; ?>
  </div>
  <div class="col card l2 m2" id="link_card">
   <?php echo "<center><p><a class=\"truncate\" href=\"pending_actions.php?email=$email\"  target=\"content_frame\"> My Pending Actions </a><p></center>"; ?>
  </div>
  <div class="col card l2 m2" id="link_card">
    <?php echo "<center><p><a class=\"truncate\" href=\"supervisor_contact.php?email=$email\"  target=\"content_frame\"> Supervisor Contact</a><p></center>"; ?>
  </div>
  <div class="col card l2 m2" id="link_card">
    <?php echo "<center><p><a class=\"truncate\" href=\"daily_update.php?email=$email\"  target=\"content_frame\"> Daily Site Update </a><p></center>"; ?>  
 </div>
</div>
</div>

<div class="row">
  <iframe src="" name="content_frame" id="content_frame" style="position: absolute; height: 75%; border: none ; overflow: hidden;"></iframe>
</div>
 </body> 	
 </html> 