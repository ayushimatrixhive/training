<?php
class Database{

    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root1","root1","testing");
    }

    public function displayData()
    {

        $query = "SELECT * FROM tbl_employee";
       // echo $query;
        $result = $this->conn->query($query);
       // var_dump($result);
        if ($result->num_rows > 0) {
            
            $data = array();
           //var_dump($data);
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

}
$Obj= new Database();

?>
