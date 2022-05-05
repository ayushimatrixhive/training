<?php

class dbconn{
public $mysqli;
function connect(){
$mysqli = mysqli_connect("localhost","root1","root1","participant");

}

function updaterow(){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob =$_POST['dob'];
    $age = $_POST['age'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $source1 = $_POST['source1'];
    $campaign = $_POST['campaign'];


$i=1;
foreach($position as $k=>$v){
    $mysqli = mysqli_connect("localhost","root1","root1","participant");

    $sql = "Update person_data SET * WHERE id=".$v;
    $res=mysqli_query($mysqli,$sql);
}
}
}

$conn = new dbconn();
$conn->connect();

$conn->updaterow();