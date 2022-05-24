<?php

class pagination
{

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root1", "root1", "participant");
    }


    public function paging()

    {
        $query = "SELECT * FROM person_data";
        $main_res = mysqli_query($this->conn, $query);

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
    }
}
    ?>

