
<?php

$limit_value=$_POST["limit"];
$limit = 5;

//print_r($limit_value);

$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

$query="SELECT * FROM person_data  LIMIT 10";
//print_r($query);
$output="";
$result = mysqli_query($conn , $query)  OR die("sql query failed");
print_r($result);

$limit = 10;
var_dump($limit);
if(isset($_POST["limit"])){

    $limit_value = $_POST["limit"];
    if ($query->num_rows > 0) {
         $data = array();
         while ($row = $query->fetch_assoc()) {
                $data[] = $row;
         }
          return $data;
         }else{
          echo "No found records";
         }
  
}
// if ($result == true) { 
//    echo "<script>alert('data FETCH')</script>";
//   }else{
//     echo "<script>alert('data not inserted')</script>";
//   }
   
  
?>