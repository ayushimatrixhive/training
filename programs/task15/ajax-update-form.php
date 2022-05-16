<?php

$student_id=$_POST["id"];
$fname =$_POST["fname"];
$lname =$_POST["lname"];
$dob =$_POST["dob"];
$age =$_POST["age"];
$email =$_POST["email"];
$phone_no =$_POST["phone_no"];
$source1 =$_POST["source1"];
$campaign =$_POST["campaign"];

 echo$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

 $sql = "UPDATE person_data 
      set fname = '$fname',
        lname= '$lname',
        dob='$dob',
        age = '$age',
        email = '$email',
        phone_no = '$phone_no',
        source1= '$source1',
        campaign = '$campaign'
         WHERE id = '$student_id'";

      if (mysqli_query($conn,$sql)) {
        echo 1;
      }else{
        echo 0;
    }

    if ($mysql_query == true) {
             header("Location:view.php");
         } else {
             echo "Data can't be updated";
         }


