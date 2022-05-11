<?php
 

//  class Connection
//  {
 
//      private $servarname = "localhost";
//      private $username = "root1";
//      private $password = "root1";
//      private $database = "participant";
 
 
//      public function __construct()
//      {
 
//          $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);
 
//          if ($this->conn) {
//              echo "Connected";
//          } else {
//              echo "Sorry not connected";
//          }
//         }
//         public function deleteRecord($id)
//         {
//             $query = "DELETE FROM person_data WHERE id = '$id'";
//             $sql = $this->conn->query($query);
//              if ($sql==true) {
//             header("Location:view.php");
//              }else{
//                echo "Record does not delete try again";
//             }
//         }
//       }

     
$student_id =$_POST['id'];
$str = implode($student_id,",");
echo $str;

$conn = mysqli_connect("localhost","root1","root1", "participant") or die ("connection failed");

$sql = "DELETE FROM person_data WHERE id IN ({$str})";

if(mysqli_query($conn,$sql)){
  echo 1;
} else{
  echo 0;
}

?>