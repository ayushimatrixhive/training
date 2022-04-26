<?php

class xyz{
    public $db_conn;
    function __construct() {
        $servername='localhost';
        $username='root1';
        $password='root1';
        $dbname = "time_zone";
        
        $this->db_conn=mysqli_connect($servername,$username,$password,"$dbname");

          if(!$this->db_conn){
              die('Could not Connect MySql Server:' .mysql_error());
            }
        }  

      function get_zone() {
          $arr = array();
         // print_r($row);
          $result = mysqli_query($this->db_conn,"SELECT * FROM `zone` ");
                 while($row = mysqli_fetch_array($result)) {
                      array_push($arr, $row);
                   print_r($arr);
        }
        return $result; 
       }
    }
?>
<html>
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
         <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
         <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <style>
     .container {
         padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
         width: 970px;
         margin-top: 50px;
     }
    .form-group {
         padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
         width: 970px;
         }
    </style>
    <body>
        <div class=" container">
            <label for="single "> Single Select:</label>
            <select name="single" class ="form-control" id="single">
                <option value="">Single SelectSelect </option>

            </select>
        </div>

        <div class=" container">
            <label for="multiple "> multiple Select:</label>
            <select name="multiple[]" class ="form-control multiple" multiple>
            
                <!-- <option value="">multiple SelectSelect </option> -->
                <?php
                   $obj = new xyz();
                   $data = $obj->get_zone();    
                     foreach($data as $row) { 
                ?>
               
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                <?php
                   }
                ?>                                                                                                                  
            <script>
                $(".multiple").select2({
                  // maximumSelectionLength: 2
                 });
            </script>
                

            </select>
        </div>