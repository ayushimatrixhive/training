
<?php

$limit=$_POST["limit"];
$limit = 15;

//print_r($limit_value);

$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

$query="SELECT * FROM person_data  LIMIT $limit";

//print_r($query);
$output="";
$result = mysqli_query($conn , $query)  OR die("sql query failed");
print_r($result);


if(isset($_POST["limit"])){

    $limit_value = $_POST["limit"];
    if (mysqli_query($conn,$sql)) {
         echo true;
         }else{
          echo false;
         }
  
}




if ($result == true) { 
   echo "<script>alert('data FETCH')</script>";
  }else{
    echo "<script>alert('data not inserted')</script>";
  }
   
  
?>
