<?php
  
  $user_id =$_POST['id'];
  // print_r($user_id);
  $str = implode($user_id,",");
  //echo $str;
  $conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

    $sql = "DELETE FROM person_data WHERE id IN ({$str})";

      if (mysqli_query($conn,$sql)) {
        echo true;
      }else{
        echo false;
    }


?>