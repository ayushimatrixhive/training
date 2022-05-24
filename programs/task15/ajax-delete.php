<?php
  
  // $student_id =$_POST["id"];
  // $user_id =$_POST['id'];
  // $str = implode($user_id,",");
  // // print_r($user_id);

  // $conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

  //   $sql = "DELETE FROM person_data WHERE id ={$student_id}";
  //   $sql1 = "DELETE FROM person_data WHERE id IN ({$str})";

  //   if (mysqli_query($conn,$sql)) {
  //       echo 1;
  //     }else{
  //       echo 0;
  //   }

  //   if (mysqli_query($conn,$sql1)) {
  //       echo true;
  //     }else{
  //       echo false;
  //   }

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
        public function deleteRecord($student_id)
        {
            $query ="DELETE FROM person_data WHERE id ={$student_id}";
            $sql = $this->conn->query($query);
             if ($sql==true) {
              echo 1;
             }else{
               echo "Record does not delete try again";
            }
        }
        public function deletemultipleRecord($user_id)
        {
            $query1 = "DELETE FROM person_data WHERE id IN ({$str})";
            $str = implode($user_id,",");
            $sql1 = $this->conn->query($query1);
             if ($sql1==true) {
              echo 1;
             }else{
               echo "Record does not delete try again";
            }
        }
       
     
  // $user_id =$_POST['id'];
  // // print_r($user_id);
  // $str = implode($user_id,",");
  // //echo $str;
  // $conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

  //   $sql = "DELETE FROM person_data WHERE id IN ({$str})";

     
      }

?>