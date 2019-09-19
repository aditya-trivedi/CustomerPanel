<?php 
    $email = filter_input(INPUT_POST, 'email');
    $change = filter_input(INPUT_POST, 'change');
    include 'connect.php';
    $sql = "SELECT `Changes` FROM `projects` WHERE `Customer Email` = '$email'";
    $retval = mysqli_query($conn,$sql );
    if(!$retval){
      echo "Sorry We Are Down :(";
    }
    else
    {
      $row = mysqli_fetch_array($retval);
      $changes = unserialize($row[0]);
      if(!$changes)
      {
        $changes =  array('0' => $change );
      }
      else
      {
        array_push($changes, $change);
      }
      $serialize_array = serialize($changes);
      $sql = "UPDATE  `projects` SET `Changes` = '$serialize_array' WHERE `Customer Email` = '$email'";
      $retva = mysqli_query($conn,$sql );
      if(!$retva){
      echo "Sorry We Are Down :(";
      }
      else
      {
        header("Location : http://www.yourwebsite.com/panel/customer_panel.php?email=$email");
      }
    }
?>