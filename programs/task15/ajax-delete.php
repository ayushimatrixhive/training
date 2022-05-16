<?php
  
  $student_id =$_POST["id"];
  // print_r($user_id);

  $conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

    $sql = "DELETE FROM person_data WHERE id ={$student_id}";

      if (mysqli_query($conn,$sql)) {
        echo 1;
      }else{
        echo 0;
    }


?>