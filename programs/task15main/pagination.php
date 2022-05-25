<?php

class pagination
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root1", "root1", "participant");
    }


    public function paging()

    {

        if(isset($_GET['page']))
        {
             $page=$_GET['page'];
        }
        else
        {
            $page=1;
        }

        $num_per_page=05;
        $start_from=($page-1)*5;

        $query = "select *from person_data limit $start_from,$num_per_page";
        $result = mysqli_query($conn, $query);

        $total_record=(mysqli_num_row($result));
        
        $total_page=ceil($total_record/$limit);

    }
}




 $limit_per_page=5;

        $page ="";
        if(isset($_POST["page_no"])){
            $page= $_POST["page_no"];

        }else{
            $page=1;

        }

        $offset=( $page -1)*$limit_per_page;


        $sql_total ="SELECT*FROM person_data"; 
        $records=mysqli_query($this->conn,$sql_total) or die ("Query failed");
        $total_record = mysqli_num_rows($records);
        $total_pages = ceil($total_records / $limt_per_page);

        $output.='<div id="pagination">';

        for($i=1 ; $i<=$total_pages ; $i++){
           echo"
            <a class='active'  id='{$i}' href=''>{$i}</a></li>";

        }
        $output.='</div>';
    ?>

""."WHERE"  ."fname"."LIKE"."'%".$search_value."%'" ."OR"
                                       ."lname"."LIKE"."'%".$search_value."%'" ."OR"
                                       ."dob"."LIKE"."'%".$search_value."%'" ."OR"
                                       ."age"."LIKE"."'%".$search_value."%'"."OR"
                                       ."email"."LIKE"."'%".$search_value."%'"."OR"
                                       ."phone_no"."LIKE"."'%".$search_value."%' " ."OR"
                                       ."source1"."LIKE"."'%".$search_value."%'" ."OR"
                                       ."campaign"."LIKE"."'%".$search_value."%'"."OR"
                                       ."country"."LIKE"."'%".$search_value."%'";