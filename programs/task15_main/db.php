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

       
        $query = "SELECT * FROM person_data ";
        $res = mysqli_query($this->conn, $query);
        $total_records = mysqli_num_rows($res);
       // echo $query;

        if ($_POST['search']) {
            $search_value = $_POST['search'];
            $query .=" WHERE fname LIKE '%{$search_value}%' 
                        OR lname LIKE '%{$search_value}%' 
                        OR dob LIKE '%{$search_value}%' 
                        OR phone_no LIKE '%{$search_value}%'
                        OR email LIKE '%{$search_value}%'
                        OR source1 LIKE '%{$search_value}%' 
                        OR age LIKE '%{$search_value}%'
                        OR campaign LIKE '%{$search_value}%'";  
                        }   

        if (isset($_POST['data_name']) && $_POST['data_name'] && $_POST['data_dir']) {
            $data_name = $_POST['data_name'];
            $data_dir = $_POST['data_dir'];
            $query .= " " . "ORDER BY" . " " . $data_name . " " . $data_dir;
           // echo $query;
        }

        $main_res = mysqli_query($this->conn, $query);
        $total_record = mysqli_num_rows($main_res);
         print_r("$total_record");

        $limit = $_POST['limit'] ? $_POST['limit'] : $total_record;
        $offset = ($page - 1) * $limit;
        if ($offset <= 0) {
            $offset = 0;
        } 

       
      
        $query .= " "."LIMIT"." ".$offset.",".$limit;
       // echo $query;

        $pag_id = $_POST['page_id'];
        $result = mysqli_query($this->conn, $query);
        $output = "";
        $total_pages = ceil($result / $limit);

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {
                $output .="<tr>
                <td align='center'><input type='checkbox' value='{$row['id']}'></td>
                <td>{$row['id']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['age']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone_no']}</td>
                <td>{$row['source1']}</td>
                <td>{$row['campaign']}</td>
                <td>{$row['country']}</td>
                <td><button class='delete-btn' data-id='{$row["id"]}'>Delete</button></td>
                </tr>";
        }
            //$query = "SELECT * FROM person_data";
           
            $total_pages = ceil($total_records / $limit);
            echo"<br>";
           // print_r("$total_pages");
            $output .= "<div class = 'pagination' id='pagination' style='margin-left:100%'>";

            if($page>1){

				$output .= "<a class='active' id='{$i}'  onclick = pagination({$i})>Previous</a>";
			} 

            for ($i = 1; $i <= $total_pages; $i++) {

                $output .= "<a class='active' id='{$i}'  onclick = pagination({$i})>{$i}</a>";
            }

			if($i>$page){

				$output .= "<a class='active' id='{$i}'  onclick = pagination({($i++)})>Next</a>";
			} 

            $output .= "</div>";
            echo $output;
			//echo "Total Rows is ". $row['count(*)'];
			
        }
    }

    public function deleteRecord()
        {
            $id=$_POST['id'];
            //print_r("$id");
            $query = "DELETE FROM person_data WHERE id =$id";
            $sql=mysqli_query($this->conn,$query);
            //echo $sql;
             if ($sql==true) {
                echo 1;
             }
        }
        

    public function multipleDelete(){

        $user_id= $_POST['id'];
        $str = implode( $user_id ,",");
        $sql_query= "DELETE FROM person_data WHERE id IN({$str})";
        $delete_res = mysqli_query($this->conn,$sql_query);
        if($delete_res){
            echo 1;
        }
    }
}
$obj= new Makedatatable();
//$obj->multipleDelete();

$rowdelete = new Makedatatable();
// $rowdelete->deleteRecord($id);

$rowobj = new Makedatatable();

if (count($_POST) > 0) {

    $rowobj->tableData();
    $obj->multipleDelete();
    $rowdelete->deleteRecord();
    
}