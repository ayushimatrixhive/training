<?php
  
//   include 'db.php';
//   $obj = new Maketable();
  $student_id =$_POST["id"];
  $user_id =$_POST['id'];
  $str = implode($user_id,",");
  // print_r($user_id);

  $conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

    $sql = "DELETE FROM person_data WHERE id ={$student_id}";
    $sql1 = "DELETE FROM person_data WHERE id IN ({$str})";

    if (mysqli_query($conn,$sql)) {
        echo 1;
      }else{
        echo 0;
    }

    if (mysqli_query($conn,$sql1)) {
        echo true;
      }else{
        echo false;
    }
    ?>

