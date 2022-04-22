<?php
    $servername='localhost';
    $username='root1';
    $password='root1';
    $dbname = "country_state_city";
    
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>