<?php 
    $s_email = filter_input(INPUT_POST, 's_email');
    $c_phone = filter_input(INPUT_POST, 'c_phone');
    $action = filter_input(INPUT_POST,  'action');
    include 'connect.php';
    $sql = "SELECT `Pending` FROM `projects` WHERE `Customer Phone` = '$c_phone'";
    $retval = mysqli_query($conn,$sql );
    if(!$retval){
      echo "Sorry We Are Down :(";
    }
    else
    {
      $row = mysqli_fetch_array($retval);
      $pending = unserialize($row[0]);
      if(!$pending)
      {
        $pending =  array('0' => $action );
      }
      else
      {
        array_push($pending, $action);
      }
      $serialize_array = serialize($pending);
      $sql = "UPDATE  `projects` SET `Pending` = '$serialize_array' WHERE `Customer Phone` = '$c_phone'";
      $retva = mysqli_query($conn,$sql );
      if(!$retva){
      echo "Sorry We Are Down :(";
      }
      else
      {
        header("Location:http://www.yourwebsite.com/panel/supervisor_project_page.php?email=".$s_email."&phone=".$c_phone);
      }
    }
?>