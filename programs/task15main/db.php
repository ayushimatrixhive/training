<?php
class Maketable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root1", "root1", "participant");
    }


    public function dataTable()

    {
     $query = "SELECT * FROM person_data";
        $main_res = mysqli_query($this->conn, $query);

      
            $limit = $_POST['limit'];

            if($_POST['search']){
                $search_value= $_POST['search'];

                $query .= " ". "WHERE" ." ". "fname". " ". "LIKE"." ". "'%".$search_value."%'" ."OR"
                                       . " ".  "lname". " ". "LIKE"." ". "'%".$search_value."%'" ."OR"
                                       . " ".  "dob". " ". "LIKE"." ". "'%".$search_value."%'" ."OR"
                                       . " ".  "age". " ". "LIKE"." ". "'%".$search_value."%'"."OR"
                                       . " ".  "email". " ". "LIKE"." ". "'%".$search_value."%'"."OR"
                                       . " ".  "phone_no". " ". "LIKE"." ". "'%".$search_value."%' " ."OR"
                                       . " ".  "source1". " ". "LIKE"." ". "'%".$search_value."%'" ."OR"
                                       . " ".  "campaign". " ". "LIKE"." ". "'%".$search_value."%'"."OR"
                                       . " ".  "country". " ". "LIKE"." ". "'%".$search_value."%'";
               // echo $query;
            }
            if ($_POST['limit']) {
                $query .= " " . "LIMIT" . " " . $limit;
               //  echo $query;

            }
                $limit_res = mysqli_query($this->conn,$query);
                if ($limit_res->num_rows > 0) {
                   
                    while ($row = $limit_res->fetch_assoc()) {


                        echo "<tr>
                        <td><input type = 'checkbox' id=". $row['id'] ."'></td>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['fname'] . "</td>
                        <td>" . $row['lname'] . "</td>
                        <td>" . $row['dob'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone_no'] . "</td>
                        <td>" . $row['source1'] . "</td>
                        <td>" . $row['campaign'] . "</td>
                       <td>" . $row['country'] . "</td>
                        <td><a href='crud-form.php?delete=" . $row['id'] . "'>Delete</a></td>
                 </tr>";
                 
                    }

               
                }
          
            echo" <ul class='pagination'  style='height:10%; margin-left:75%; margin-bottom : -30px;' >

            <li class='page-item'><a class='page-link' href='#'>Previous</a></li>
            <li class='page-item'><a class='page-link' href='#'>1</a></li>
            <li class='page-item'><a class='page-link' href='#'>2</a></li>
            <li class='page-item'><a class='page-link' href='#'>3</a></li>
            <li class='page-item'><a class='page-link' href='#'>Next</a></li>
            </ul>";

        }

    // Prepare a select statement



    public function deleteRecord($id)
    {

        //echo "deleteRecord";
        $query = mysqli_query($this->conn, "DELETE FROM person_data WHERE id = '$id'");
        if ($query == true) {
            header("Location:view.php");
        } else {
            echo "Record does not delete try again";
        }
    }
}
   

$obj = new Maketable();
//if(count($_POST) > 0){
    $obj->dataTable();
//}
