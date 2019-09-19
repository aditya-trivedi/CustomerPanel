<!DOCTYPE html>
<html>
 <head>
  <title> Project | Project Page </title>
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
      <a href="#" class="brand-logo hide-on-med-and-down" >Project |  Project Page</a>
      <a href="#" class="brand-logo hide-on-large-only" >Project </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="https://www.yourwebsite.com/" target="_blank">Visit Our Website</a></li>
      </ul>
    </div>
 </nav>





<div class="row">
  <div class="col s12 m12 l8 push-l2 card">
      <div class="row">
        <div class="col l12 s12 m12 ">
          <div class="row"><h4 class="center-align">Requested Changes</h4></div>
           <?php 
            session_start();
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            include 'connect.php';
            if (isset($_SESSION['s_loggedin']) && $_SESSION['s_loggedin'] == true && $_SESSION['s_email'] == $email  ){
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
          <div class="row"><h4 class="center-align">Add Pending Action From Client</h4></div>
          <div class="row">
            <div class="card col l12 m12 s12">
              <div class="row">
                <form action ="add_pending_action.php"  method="post" id="form">
                  <div class = "input-field row m6 l5 s12">
                    <textarea  class="materialize-textarea " placeholder="Request a Pending action..." name="action" required="true"></textarea>
                  </div>
                  <?php  
                  echo "<input type=\"text\" name=\"s_email\" value=\"$email\" hidden=\"true\">
                  <input type=\"text\" name=\"c_phone\"  value=\"$phone\" hidden=\"true\">"
                  ?>
                  <div class="center-align"><button class="  row btn blue  " type="submit" name="action_button">Add</button></div>
                </form>
              </div>
            </div>
            <div class="col card l12 m12 s12">
              <div class="row"><h4 class="center-align">Existing Pending Actions</h4></div>
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
      <div class="row "><h4 class="center-align">Image Upload</h4></div>
      <?php echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"daily_pic_upload.php?phone=".$phone."&email=".$email."\">" ?>
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
          <div class="center-align"><input type="submit" name="submit_button"></div>
        </div> 
        </form>
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