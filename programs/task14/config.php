

<?php
class Connection
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

    public function enterdata()
    {
      //  print_r($_POST);
      if (isset($_POST['submit'])) {
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $country=$_POST['country'];
        $phone_no = $_POST['phone_no'];
        $source1 = $_POST['source1'];
        $campaign = $_POST['campaign'];
        
        $sql=  mysqli_query($this->conn,"INSERT INTO person_data(`fname`, `lname`, `dob`, `age`,`email`,`country`, `phone_no`, `source1`,`campaign`) VALUES ('$fname', '$lname','$dob','$age','$email','$country','$phone_no','$source1','$campaign')");
        //$result = mysqli_query($this->conn,$sql);
            if ($sql == TRUE) { 
               echo "<script>alert('data inserted')</script>";
              }else{
                echo "<script>alert('data not inserted')</script>";
              }
    
        }
    }
    public function displayData()
        {
            $query = "SELECT * FROM person_data";
            $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;
            }else{
             echo "No found records";
            }
        }
        // Fetch single data for edit from customer table
        public function displyaRecordById($id)
        {
            $query = "SELECT * FROM person_data WHERE id = '$id'";
            $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
            }else{
            echo "Record not found";
            }
        }

        public function deleteRecord($id)
        {
            $query = "DELETE FROM person_data WHERE id = '$id'";
            $sql = $this->conn->query($query);
             if ($sql==true) {
            header("Location:viewpg.php");
             }else{
               echo "Record does not delete try again";
            }
        }
    }
