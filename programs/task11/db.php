<?php
    $servername='localhost';
    $username='root1';
    $password='root1';
    $dbname = "time_zone";
    
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }




    // class xyz{
    //   public $db_conn;
    //   function __construct() {
    //       $servername='localhost';
    //       $username='root1';
    //       $password='root1';
    //       $dbname = "time_zone";
          
    //       $this->db_conn=mysqli_connect($servername,$username,$password,"$dbname");
  
    //         if(!$this->db_conn){
    //             die('Could not Connect MySql Server:' .mysql_error());
    //           }
             
  
    //       }  
    //     function get_zone() {
    //         $arr = array();
    //       $result = mysqli_query($this->db_conn,"SELECT * FROM `zone` ");
    //            while($row = mysqli_fetch_array($result)) {
    //             array_push($arr, $row);
    //       }
    //       return $arr;
    //      }
    //   }


?>