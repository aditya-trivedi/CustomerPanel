<!DOCTYPE html>
<html>
 <head>
  <title> iFurnish | Project Page </title>
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
      <a href="#" class="brand-logo hide-on-med-and-down" >iFurnish |  Project Page</a>
      <a href="#" class="brand-logo hide-on-large-only" >iFurnish </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="https://www.yourwebsite.com/" target="_blank">Visit Our Website</a></li>
      </ul>
    </div>
 </nav>





<div class="row">
  <div class="col s12 m12 l8 push-l2 card">
      <div class="row">
        <div class="col card l12 s12 m12 ">
          <div class=""><h4 class="center-align">Requested Changes</h4></div>
          <div class="row"><p class="center-align">(Customer Requested changes Appear here)</p></div>
           <?php 
            session_start();
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            include 'connect.php';
            if (isset($_SESSION['a_loggedin']) && $_SESSION['a_loggedin'] == true && $_SESSION['a_email'] == $email  ){
            $sql = "SELECT `Changes` FROM `projects` WHERE `Customer Phone` = '$phone'";
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
                  echo "<div class=\"row\">
                          <div class=\"card col l12 m12 s12\">
                            <p class=\" row center-align\">$change</p>
                          </div>
                        </div>";
                }
              }
            }
          }
          else{
              header('Location: http://www.yourwebsite.com/panel/invalid_login_supervisor.html');
            }
            ?>
      </div>
      <div class="col l12 s12 m12 ">
            <div class="col  card l12 m12 s12">
              <div class=""><h4 class="center-align">Existing Pending Actions</h4></div>
              <div class="row"><p class="center-align">(All the Existing Pending Actions Appear here)</p></div>
              <?php 
                $phone = $_GET['phone'];
                $email = $_GET['email'];
                include 'connect.php';
                $sql = "SELECT `Pending` FROM `projects` WHERE `Customer Phone` = '$phone'";
                $retval = mysqli_query($conn,$sql );
                if(!$retval){
                  echo "Sorry We Are Down :(";
                }
                else
                {
                  $row = mysqli_fetch_array($retval);
                  $pending = unserialize($row[0]);
                  if($pending){
                    foreach($pending as $action){
                      echo "<div class=\"row\"><p class=\"center-align\">~".$action."</p></div>";
                    }
                  }
                }
              ?>

            </div>
          </div>

        </div>
        <div class="col   l12 s12 m12 ">
            <h4 class="center-align">Selected Designs And Corresponding Update</h4>
            <?php 
              include 'connect.php';
              $email = $_GET['email'];
              $phone = $_GET['phone'];
              $rooms = array("bedroom_1","bedroom_2","living_room","exterior","kitchen_1","kitchen_2","bathroom_1","bathroom_2");
              $room = array("Bedroom 1","Bedroom 2","Living Room","Exterior","Kitchen 1","Kitchen 2","Bathroom 1","Bathroom 2");
              $sql = 'SELECT `Rooms` FROM  `projects`';
              $retval = mysqli_query( $conn ,$sql);
              if(! $retval ) {
                    die("Sorry We Are DDown :( ");
                 }; 
              $sql = "SELECT `Customer Phone` FROM `projects` WHERE `Customer Phone` = '$phone'";
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
                    $img_name_update = $phone."_".$rooms[$x]."_update.jpg";
                    echo "<div class=\"col s12 m6 l6\">
                    <div class=\"card\">
                      <div class=\"card-image\">
                        <img onerror=\"this.onerror=null;this.src='nia.jpg';\"  src=\"$img_name\">
                        <span class=\"card-title\">$room[$x]</span>
                      </div>
                    </div>
                  </div>";
                  echo "<div class=\"col s12 m6 l6\">
                    <div class=\"card\">
                      <div class=\"card-image\">
                        <img  onerror=\"this.onerror=null;this.src='nia.jpg';\"  src=\"$img_name_update\">
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

        </div>
      
  </div>
      
  

  </div>
</div>

<br><hr><br>
<div class="center-align"><h4>Client Details</h4></div>
        <div class="row">
          <div class="card col l12 s12 m12">
            <div class="row">
              <?php 
              $email = $_GET['email'];
              $phone = $_GET['phone'];
              include 'connect.php';
              $sql = "SELECT * FROM `projects` WHERE `Customer Phone` = '$phone'";
              $retval = mysqli_query($conn,$sql );
              if(!$retval){
                echo "Sorry We Are Down :(";
              }
              else
              {
                $row = mysqli_fetch_array($retval);
                echo "<div class=\"col  l4 m4 s12\"><p class=\"center-align\">".$row['Customer Name']."</p></div>
              <div class=\"col  l4 m4 s12\"><p class=\"center-align\">".$row['Customer Phone']."</p></div>
              <div class=\"col  l4 m4 s12\"><p class=\"center-align\">".$row['Customer Email']."</p></div>";
              } 

              ?>
            </div>
          </div>
         </div>


 </body>  
 </html> 