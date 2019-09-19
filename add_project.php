<!DOCTYPE html>
<html>
 <head>
 	<title> Project | Add Project </title>
 	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Panorama — A-Frame">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
     $(document).ready(function() {
        $('select').material_select();
    });
  </script>
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
  ::placeholder {
  color: black;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: black;
}

::-ms-input-placeholder { /* Microsoft Edge */
   color: black;
}

  
</style>
 </head>
 <body>

 <nav>
    <div class="nav-wrapper blue z-depth-0">
      <a href="#" class="brand-logo hide-on-med-and-down" >Project | Add Project</a>
      <a href="#" class="brand-logo hide-on-large-only" >Project </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="https://www.yourwebsite.com/" target="_blank">Visit Our Website</a></li>
      </ul>
    </div>
 </nav>

 <div class="row margin_up ">
  <div class="col l8 push-l2 card s12 m10 push-m1 ">
    <div class="row "><h4 class="center-align">Add Project</h4></div>
      <form action="submit_project.php" method="post" enctype="multipart/form-data">
        <input type="text" name="customer_name" placeholder="Full Name ( Customer ) :" required="true">
        <div class="row">
          <input type="text" name="customer_number" placeholder="Phone Number :" class="col l3 input-field" required="true">
          <input type="email" name="customer_email" placeholder="Email :" class="col l3 input-field push-l1" required="true"> 
          <input type="text" name="password" placeholder="Customer Password :" class="col l3 input-field push-l2" required="true">      
        </div> 
        <input type="text" name="customer_address" placeholder="Full Address (Customer ) :" required="true">
        <div class="row">
          <div class="input-field col l6 s12 m6">
            <select name="supervisor" required="true">
              <option value="" disabled selected>Assigned Supervisor</option>
              <?php 
                include 'connect.php';
                $sql = 'SELECT `Name` FROM  `supervisor`';
                $retval = mysqli_query( $conn ,$sql);
                if(! $retval ) {
                      die("Sorry We Are Down :( ");
                   }; 
                while ($row = mysqli_fetch_array($retval)) {
                  echo "<option value=\"$row[0]\">$row[0]</option>";
                }
                mysqli_close($conn);
  
                ?>
            </select>
            <label>Supervisor Select</label>
          </div>
          <div class="col l6  m6 s12">
            <label class="row">Estimated Budget</label>
            <input type="text" name="estimated_budget" placeholder="Estimated Budget (In Lacs )" class="row" required="true">
          </div>
        </div>
        <div class="row "><h4 class="center-align">Image Upload</h4></div>
        <div class="row ">
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Bedroom 1</p>
                <div class="row center-align"><input type="file" name="bedroom_1" id="bedroom_1" ></div>
              </div>
            </div>
          </div>
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Bedroom 2</p>
                <div class="row center-align"><input type="file" name="bedroom_2" id="bedroom_2" ></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Living Room </p>
                <div class="row center-align"><input type="file" name="living_room" id="living_room" ></div>
              </div>
           </div>
          </div>
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Exterior</p>
                <div class="row center-align"><input type="file" name="exterior" id="exterior" ></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Kitchen 1</p>
                <div class="row center-align"><input type="file" name="kitchen_1" id="kitchen_1" ></div>
              </div>
            </div>
          </div>
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Kitchen 2</p>
                <div class="row center-align"><input type="file" name="kitchen_2" id="kitchen_2" ></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Bathroom 1</p>
                <div class="row center-align"><input type="file" name="bathroom_1" id="bathroom_1" ></div>
              </div>
            </div>
          </div>
          <div class="col l6 m6 s12">
            <div class="center-align">
              <div class="card l12 col m12 s12">
                <p class="row center-align"> Bathroom 2</p>
                <div class="row center-align"><input type="file" name="bathroom_2" id="bathroom_2" ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="center-align"><button class="btn  blue " type="submit">Add Project</button></div>
        </div> 
      </div>


    </form>
  </div> 
</div>


<div class="center-align"><h4>Current Projects</h4></div>


<?php
include 'connect.php';
$sql = 'SELECT * FROM  `projects` ';
$retval = mysqli_query( $conn ,$sql);
if(! $retval ) {
      die("Sorry We Are Down :( ");
   }; 
while ($row = mysqli_fetch_array($retval)) {
  echo "<div class=\"row\">
  <div class=\"col l10 s12 m12 push-l1 card\">
    <div class=\"row\">
      <div class=\"col l3 s3 m3\">
        <p> $row[0]</p>
      </div>
      <div class=\"col l3 s m3 hide-on-small-only\">
        <p> $row[1]</p>
      </div>
       <div class=\"col l3 s4 m3\">
        <form action=\" delete_project.php\" method=\"post\"> 
          <input type=\"text\" name=\"customer_phone\" value=\"$row[1]\" hidden=\"true\">
          <br>
          <button class=\"btn blue white-text truncate\">Delete</button>
        </form>
      </div>
      <div class=\"col l3 s5 m3\" hidden=\"true\">
        <form action=\" change_supervisor.php\" method=\"post\"> 
          <input type=\"text\" name=\"customer_phone\" value=\"$row[1]\" hidden=\"true\">
          <br>
          <button class=\"btn blue white-text truncate\">Change</button>
        </form>
      </div>
    </div>
  </div>
</div>";
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