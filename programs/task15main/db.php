<?php
class Maketable
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root1", "root1", "participant");
    }


    public function dataTable()

    {

        $query = "SELECT * FROM person_data ";
        $main_res = mysqli_query($this->conn, $query);
        
        $limit_per_page=5;

        $pages="";
        if(isset($_POST['page'])){
            $pages=$_POST["page"];
            print_r("$page");

        }else {
            $pages=1;

        }
        $output = "";

        $total_record = mysqli_num_rows($main_res);
        print_r(" $total_record");
        
        $offset=($pages-1)*$limit_per_page;
        print_r(" $offset");
        

      
            $limit = $_POST['limit'];
            $query = "SELECT * FROM person_data ";
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
                  $query = "SELECT * FROM person_data ";

                  $total_record = mysqli_num_rows($main_res);
                  print_r(" $total_record");
                  
                  $offset=($pages-1)*$limit_per_page;
                  print_r(" $offset");

                $query .= "LIMIT" . " " . $limit ;
               // echo $query;

            }

                // if ($_POST['page']) {
                //     $pages = $_POST['page'];
                //     var_dump($pages);
                // }else{
                //     $pages=1;
                // }

                $query1 = "SELECT * FROM person_data  LIMIT  {$offset}, {$limit_per_page}";
             
                $records =mysqli_query($this->conn,$query1) or die ("query failed");
                $total_record= mysqli_num_rows($records);
                $total_pages = ceil($total_record/ $limit_per_page);
                print_r("$total_pages");
                print_r(" $limit_per_page");

                $limit_res = mysqli_query($this->conn,$query);
                //print_r("$limit_res");

                if ($limit_res->num_rows > 0) {
                     echo' <table class = "table table-bordered">
                     <thead class = "bg-primary text-white text-center">
                       
                         <thead id="review"> ';
                    
                         
     
                    while ($row = $limit_res->fetch_assoc()) {


                        $output.= "<tr>
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
                        <td><a href='index.php?delete=" . $row['id'] . "'>Delete</a></td>
                        </tr>";
                 
                    }
            
                    $output .='<div id="pagination id="pagination" style="margin-left:400%"';

                    for ($i=1;$i<=$total_pages;$i++){
                
                    $output.="<a class='active' id='{$id}' href=''>{$id}</a>";
                }
                $output.='</div>';

            }
          
           $output.="  <div id='pagination'>
           <a class='active' id='1' href=''>1</a>
           <a  id='2' href=''>2</a>
           <a  id='3' href=''>3</a>

           </div>";
           
        echo $output;

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
if(count($_POST) > 0){
    $obj->dataTable();
}
