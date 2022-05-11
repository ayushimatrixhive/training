

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
        
        $sql=  mysqli_query($this->conn,
        "INSERT INTO person_data(`fname`, `lname`, `dob`, `age`,`email`,`country`, `phone_no`, `source1`,`campaign`)
         VALUES ('$fname', '$lname','$dob','$age','$email','$country','$phone_no','$source1','$campaign')");
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

    public function updateRecord($id)
        {
           // $id = $_GET['id'];

            if (isset($_POST['update'])) {
                // echo $fname;  
               // $id = $_POST['edit_id'];
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
                  country = '$country' WHERE id = '$id'");

                print_r($mysql_query);
               }
            if ($mysql_query == true) {
                header("Location:viewpg.php");
             } else {
                echo " ";
             }
         }
    

    public function deleteRecord($id)
        {
            $query = "DELETE FROM person_data WHERE id = '$id'";
            $sql = $this->conn->query($query);
             if ($sql==true) {
            header("Location:view.php");
             }else{
               echo "Record does not delete try again";
            }
        }
        public function fetchdata($uesrid)
        {
        if (isset($_POST['editbtn'])) {
                $userid = $_POST['user_id'];
               // echo $return = $user_id;
                $result_array= [];
               //var_dump($result_array);
                $query = mysqli_query($this->conn,"SELECT * FROM person_data WHERE id= '$userid'");
                //var_dump($query);
                    if (mysqli_num_rows($query) > 0) {
                        foreach ($query as $row){
                            array_push($result_array,$row);
                            echo json_encode($result_array);
                        }
                  
                    } else {
                        echo "No found records";
                    }
            }
        }
    public function dataupdate($id)
        {
             //  print_r($_POST);
            if (isset($_POST['updateform'])) {
                $id = $_POST['id'];
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
        // $userobj = new Connection();
        // $userobj->dataupdated($id);
?>
