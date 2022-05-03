<?php 

include "config.php"; 
if(isset($_GET['id'])){
$userid = $_GET['id'];
$sql =mysqli_query($conn,"SELECT * FROM employee where id = $userid");
$row=mysqli_fetch_array($sql);
echo $row['image'];
$delquery ="DELETE FROM employee WHERE id = $userid ";
$res = mysqli_query($conn,$delquery);
if($res == true){
    unlink("uploads/".$row['image']);
    echo "deleted";
    header('Location:viewpg.php');
}
else{
    echo "Not deleted";
}
}
?>

?>
