<!DOCTYPE html>
<html>
 <head>
  <title> Project | Add Admin </title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Panorama — A-Frame">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="https://aframe.io/releases/0.6.1/aframe.min.js"></script>

<style >
  
  .margin_up
  {
    margin-top: 4%;
    margin-bottom: 4%;
  }
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
    <div class="nav-wrapper blue z-depth-0">
      <a href="#" class="brand-logo hide-on-med-and-down" >Project | Add Admin</a>
      <a href="#" class="brand-logo hide-on-large-only" >Project </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="https://www.yourwebsite.com/" target="_blank">Visit Our Website</a></li>
      </ul>
    </div>
 </nav>



 <div class="row  margin_up">
  <div class="col  card l4 center-align push-l4 push-s1 push-m3 s10 m6 ">
    <div class="row "><h4 class="center-align">Add Admin</h4></div>
    <div class="center-align">
    <form action="http://www.yourwebsite.com/panel/add_admin.php" method="post">
      <div class="center-align">
      <div class="row">
        <div class="col "><i class="material-icons medium">account_circle</i></div>
        <div class="col l9 m8"><input type="text" name="name" placeholder="Name" required="true"></div>
      </div>
    </div>
      <div class="row">
        <div class="col"><i class="material-icons medium">mail</i></div>
        <div class="col l9 m8"><input type="email" name="email" placeholder="Email" required="true"></div>
      </div>
    </div>
    <div class="center-align">
      <div class="row">
        <div class="col "><i class="material-icons medium">phone</i></div>
        <div class="col l9 m8"><input type="text" name="phone" placeholder="Phone" required="true"></div>
      </div>
    </div>
    <div class="center-align">
      <div class="row">
        <div class="col "><i class="material-icons medium">security</i></div>
        <div class="col l9 m8"><input type="password" name="password" placeholder="Password" required="true"></div>
      </div>
    </div>
    <div class="center-align">
      <button class=" btn wave-blue blue darken-2" type="submit">Add </button>
    </div>  
  </form> 
    <div>
      <p class="center-align white-text">Forgot Password? Mail us on : panel@Project.in</p>
    </div>
  </div>
</div>
 
<div class="center-align"><h4> Currrent Admins</h4></div>


<?php
include 'connect.php';
$sql = 'SELECT * FROM  `admin` WHERE 1 ';
$retval = mysqli_query( $conn ,$sql);
if(! $retval ) {
      die("Sorry We Are Down :( ");
   }; 
while ($row = mysqli_fetch_array($retval)) {
  echo "<div class=\"row\">
  <div class=\"col card l4 push-l4 s12 push-m3 m6\">
    <div class=\"row\">
      <div class=\"col l6 s6 m6 \">
        <p>$row[0]</p>
      </div>
       <div class=\"col l6 s6 m6 \">
        <form action=\" delete_admin.php\" method=\"post\"> 
          <input type=\"text\" name=\"email\" value=\"$row[1]\" hidden=\"true\">
          <br>
          <button class=\"btn blue white-text center-align\">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
";
}
mysqli_close($conn);
?>



 <footer class = "page-footer blue l12">
         <div class = "row">
            <div class = "col s12 m6 l6">
               <h5 class = "white-text">Project</h5>
            </div>

            <div class = "col right">
               <ul > 
                  <li><a href = "http://www.yourwebsite.com/about/" class = "grey-text text-lighten-4 right">
                     Help</a></li>
                  
                  <li><a href = "http://www.yourwebsite.com/privacy-policy/" class = "grey-text text-lighten-4 right ">
                     User Agreement</a></li>
                  <li><a href = "http://www.yourwebsite.com/terms-conditions/" class = "grey-text text-lighten-4 right">
                     Privacy and Terms</a></li>
               </ul>
            </div>
         </div>

         <div class = "footer-copyright">
            <div class = "container">
               © 2019 Copyright Information
            </div>
         </div>
       </footer>
 </body>  
 </html> 