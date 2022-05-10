<?php
class Connect
{

    private $servarname = "localhost";
    private $username = "root1";
    private $password = "root1";
    private $database = "participant";


    public function __construct()
    {

        $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);

        if ($this->conn) {
            echo "Connected";
        } else {
            echo "Sorry not connected";
        }
    }
    public function dataupdated($id)
    {
         //  print_r($_POST);
        if (isset($_POST['updateform1'])) {
            $id = $_POST['edit_id'];
           // echo $id;
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone_no'];
            $source1 = $_POST['source1'];
            $campaign = $_POST['campaign'];
            $country = $_POST['country'];
            $mysql_query = mysqli_query($this->conn, 
            "UPDATE person_data 
            set fname = '$fname',
                lname= '$lname',
                dob='$dob',
                age = '$age',
                email = '$email',
                phone_no = '$phone_no',
                source1= '$source1',
                campaign = '$campaign',
                country = '$country' 
                WHERE id = '$id'");
          //  print_r($mysql_query);
        if ($mysql_query == true) {
            header("Location:viewpg.php");
        } else {
            echo "Data can't be updated";
        }
    }
}
}
$userobj = new Connect();
$userobj->dataupdated($id);
?>