<?php

// class Connect
// {

//     private $servarname = "localhost";
//     private $username = "root1";
//     private $password = "root1";
//     private $database = "participant";


//     public function __construct()
//     {

//         $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);

//         if ($this->conn) {
//             echo "Connected";
//         } else {
//             echo "Sorry not connected";
//         }
//     }



//     public function enterdatavalue()
//     {

//         if (isset($_POST['submit_value'])) {

//             $mysql_query = mysqli_query($this->conn, "UPDATE person_data  limit 0,5");
        
            
//         }
//         if ($mysql_query == true) {
//             header("Location:view.php");
//         } else {
//             echo "Data can't be updated";
//         }
//         }
//         }



//

$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

$output="";
$sql="SELECT * FROM person_data limit 0,5";
$result = mysqli_query($conn , $sql) or die("sql query failed");
if(mysqli_num_rows($result)>0)
{
    $output .= "<table  width='100%'  >

                <tr>
                    <th width='120px' class= id='select_all'> Select </th>
                    <th width='80px'> ID </th>
                    <th width='120px'> F NAME </th>
                    <th width='120px'> L NAME  </th>
                    <th width='120px'> DOB </th>
                    <th width='90px'>  AGE </th>
                    <th width='120px'> PHONE_NO </th>
                    <th width='190px'> EMAIL </th>
                    <th width='150px'> SOURCE1 </th>
                    <th width='120px'> CAMPAIGN </th>
                   
                </tr>";
        while($row = mysqli_fetch_array($result))
        {

            $output .="<tr>
                <td><input type='checkbox' value='{$row['id']}'></td>
                <td>{$row['id']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['age']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone_no']}</td>
                <td>{$row['source1']}</td>
                <td>{$row['campaign']}</td>
            </tr>";
        }
        echo $output;
        $output .='</table>';
        }
        else {
            echo 'data not found';
            
        }


if ($result == true) {
    header("Location:view.php");
} else {
    echo "Data can't be updated";
}



?>
