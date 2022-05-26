<?php
class Makedatatable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root1", "root1", "participant");
    }
    public function tableData()
    {
       // $limit_per_page = 5;

        $page = "";
        if (isset($_POST["page_id"])) {
            $page = $_POST["page_id"];
        } else {
            $page = 1;
        }
        // $offset = ($page - 1) * $limit_per_page;
        $query = "SELECT * FROM person_data";

        if ($_POST['search']) {
            $search_value = $_POST['search'];
            $query .= " " . "WHERE" . " " . "fname" . " " . "LIKE" . " " . "'%" . $search_value . "%'" . "OR"
                                    . " " .  "lname" . " " . "LIKE" . " " . "'%" . $search_value . "%'" . "OR" 
                                    . " " .  "dob" . " " . "LIKE" . " " . "'%" .  $search_value. "%'" . "OR" 
                                    . " " .  "age" . " " . "LIKE" . " " . "'%" .  $search_value . "%'" . "OR" 
                                    . " " .  "email" . " " . "LIKE" . " " . "'%" . $search_value . "%'" . "OR" 
                                    . " " .  "phone_no" . " " . "LIKE" . " " . "'%" . $search_value . "%' " . "OR"
                                    . " " .  "source1" . " " . "LIKE" . " " . "'%" . $search_value . "%'" . "OR" 
                                    . " " .  "campaign" . " " . "LIKE" . " " . "'%" . $search_value . "%'" . "OR" 
                                    . " " .  "country" . " " . "LIKE" . " " . "'%" . $search_value . "%'";
                            }
                            
            if($_POST['sort']){
                $sorting = $_POST['sort'];
                $query .= " ". "ORDER BY". " " ."id". " " . $sorting;
                echo $query;
            }
           // var_dump($sorting);


    
        $main_res = mysqli_query($this->conn, $query);
        $total_record = mysqli_num_rows($main_res);
         print_r("$total_record");

        $limit = $_POST['limit'] ? $_POST['limit'] : $total_record;
        $offset = ($page - 1) * $limit;

      
        $query .= " " . "LIMIT" . " " . $offset . "," . $limit ;
        //echo $query;

       $pag_id = $_POST['page_id'];
       $offset = ($pag_id - 1) * $limit;
        echo "<br>";
        $result = mysqli_query($this->conn, $query);
        $output = "";
        $total_pages = ceil($result / $limit);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output .= '<tr> 
                <td><input type="checkbox" name="customer_id[]" onclick="userData()" class="delete_customer" value="<?php echo $row["id"]; ?></td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['fname'] . '</td>
                <td>' . $row['lname'] . '</td> 
                <td>' . $row['dob'] . '</td> 
                <td>' . $row['age'] . '</td> 
                <td>' . $row['email'] . '</td> 
                <td>' . $row['phone_no'] . '</td> 
                <td>' . $row['source1'] . '</td> 
                <td>' . $row['campaign'] . '</td> 
                <td>' . $row['country'] . '</td> 
                </tr>';
                
              
            }
            $sql = "select * from person_data";
            $res = mysqli_query($this->conn, $sql);
            $total_records = mysqli_num_rows($res);
            $total_pages = ceil($total_records / $limit);
           //  print_r("$total_pages");
            $output .= "<div class = 'pagination' id='pagination' style='margin-left:100%'>";

            for ($i = 1; $i <= $total_pages; $i++) {

                $output .= "<a class='active' id='{$i}' href=''>{$i}</a>";
            }
            $output .= "</div>";
            echo $output;
        }
    }

    public function deleteRecord($id)
    {

        $query = mysqli_query($this->conn, "DELETE FROM person_data WHERE id = '$id'");
        if ($query == true) {
            header("Location:view.php");
        } else {
            echo "Record does not delete try again";
        }
    }
}

$rowobj = new Makedatatable();
if (count($_POST) > 0) {

    $rowobj->tableData();
}