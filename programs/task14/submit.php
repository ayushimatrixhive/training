<?php

class submit
{
    private $servarname = "localhost";
    private $username = "root1";
    private $password = "root1";
    private $database = "participant";
    public function __construct()
    {
        $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);
      
    }

    
    public function submitData($id)
    {
       // $id = $_GET['id'];

        if (isset($_POST['submit'])) { 
            $edit_id = $_POST['id'];
            $fname_id = $_POST['fname'];
            $lname_id = $_POST['lname'];
            $dob_id = $_POST['dob'];
            $age_id = $_POST['age'];
            $email_id = $_POST['email'];
            $phone_no_id = $_POST['phone_no'];
            $source1_id = $_POST['source1'];
            $campaign_id = $_POST['campaign'];
            $country_id = $_POST['country'];

            $mysql_query = mysqli_query($this->conn, "UPDATE person_data set fname_id = '$fname',lname_id= '$lname',dob_id='$dob',age_id = '$age', email_id = '$email',phone_no_id = '$phone_no',source1_id= '$source1',campaign_id = '$campaign', country_id = '$country' WHERE edit_id = '$id'");

            print_r($mysql_query);
           }
           if ($mysql_query == true) {
            header("Location:viewpg.php");
         } else {
            echo " ";
         }
     }
    }
$objdata = new submit();