<?php 

include "config.php"; 
$obj= new Connection();


// $obj->deleteRecord($deleteId);
// if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
//    $deleteId = $_GET['deleteId'];
//    $bj->deleteRecord($deleteId);
// }
 if (isset($_GET['id'])) {
   $user_id = $_GET['id'];
   $sql = "DELETE FROM `person_data` WHERE `id`='$user_id'";
     $result = $conn->query($sql);
    if ($result == TRUE) {
       echo "Record deleted successfully.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
 } 
?>