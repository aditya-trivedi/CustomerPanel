<!DOCTYPE html>
<html>
 <head>
 	<title> Project | Supervisor Panel </title>
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
    font-family:Palatino Linotype;
	}
</style>
 </head>
 <body>



 <nav>
    <div class="nav-wrapper blue darken-3">
      <a href="#" class="brand-logo hide-on-med-and-down" >Project | Admin Panel</a>
        <a href="#" class="brand-logo" >Project</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="https://www.yourwebsite.com/" target="_blank">Visit Our Website</a></li>
      </ul>
    </div>
 </nav>

<div class="center-align"><h4>All Projects</h4></div>

<?php 
session_start();
include 'connect.php';
$email = $_GET['email'];
if (isset($_SESSION['a_loggedin']) && $_SESSION['a_loggedin'] == true && $_SESSION['a_email'] == $email  ) { 

  $sql = "SELECT * FROM `projects` WHERE 1";
  $retval = mysqli_query($conn , $sql);
  if(!$retval){
    echo "Sorry We Are Down :(";
  }
  else{
    while ($row = mysqli_fetch_array($retval)) {
      echo "<div class=\"row\">
              <div class=\"col card l12 m12 s12\">
                <div class=\"row\">
                  <div class=\"col l2 s6 m4\">
                    <div class=\"center-align\"><p>".$row['Customer Name']."</p></div>
                  </div>
                  <div class=\"col l2 s6 m4\">
                    <div class=\"center-align\"><p>".$row['Customer Phone']."</p></div>
                  </div>
                   <div class=\"col l2 s6 m4\">
                    <div class=\"center-align\"><p class=\"truncate\">".$row['Address']."</p></div>
                  </div>
                  <div class=\"col l2 s6 m4\">
                    <div class=\"center-align \" class=\"truncate\"><p>".$row['Customer Email']."</p></div>
                  </div> 
                   <div class=\"col l2 s6 m4\">
                    <div class=\"center-align\"><p>".$row['Supervisor']."</p></div>
                  </div>
                  <div class=\"col l2 s6 m4 \" style=\"margin-top: 2%;\">
                    <div class=\"center-align\"><a href=\"http://www.yourwebsite.com/panel/admin_project_page.php?email=".$email."&phone=".$row['Customer Phone']."\" > View Project</a></div>
                  </div>
              </div>
              </div>  
            </div>";
    }
  }

}

else{
  header('Location: http://www.yourwebsite.com/panel/invalid_login_admin.html');
}
?>


 
 </body>	
 </html> 