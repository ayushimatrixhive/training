<?php 

class dbconn{
public $mysqli;
function connect(){
$mysqli = mysqli_connect("localhost","root1","root1","con");

}

function updaterow(){
$position = $_POST['position'];


$i=1;
foreach($position as $k=>$v){
    $mysqli = mysqli_connect("localhost","root1","root1","con");

    $sql = "Update con1 SET position=".$i." WHERE id=".$v;
    $res=mysqli_query($mysqli,$sql);


	$i++;
}
}
}

$conn = new dbconn();
$conn->connect();

$conn->updaterow();