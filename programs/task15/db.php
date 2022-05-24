
    <?php
    class dataPopup
    {
        private $servarname = "localhost";
        private $username = "root1";
        private $password = "root1";
        private $database = "participant";
        public function __construct()
        {
            $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);
          
        }
        public function fetchdata($student_id )
        {
        if (isset($_POST['delete_data'])) {
                $student_id  = $_POST['user_id'];
               // echo $return = $user_id;
                $result_array= [];
               //var_dump($result_array);
                $query = mysqli_query($this->conn,"DELETE * FROM person_data WHERE id= '$student_id '");
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
    }
    $obj1 = new dataPopup();
    $obj1->fetchdata($student_id);
    ?>