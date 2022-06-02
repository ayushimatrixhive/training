<?php

class Database{

    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root1","root1","testing");
    } 

 public function displayData()
 {
         $request=$_REQUEST;
        //  $col = array(
        //      0 => 'id',
        //      1 => 'name',
        //      2 => 'address',
        //      3 => 'gender',
        //      4 => 'age',
        //      5 => 'city',
        //  );

        $sql = "SELECT * FROM tbl_employee";
        $query = mysqli_query($this->conn , $sql);
          // echo $query;
        $totalData = mysqli_num_rows($query);
        $totalFilter=$totalData;
        
        $data = array();
            while ($row=mysqli_fetch_array($query)) {
                $subdata = array();
                $subdata[]=$row[0]; 
                $subdata[]=$row[1]; 
                $subdata[]=$row[2]; 
                $subdata[]=$row[3]; 
                $subdata[]=$row[4]; 
                $subdata[]=$row[5]; 
                $data[]=$subdata;

            }
            
            $json_data = array(
            "draw"             => intval($request['draw']),
            "recordsTotal"     => intval($totalData),
            "recordsFiltered"  => intval($totalFilter),
            "data"             => $data
            );
           echo json_encode ($json_data);
        
     }
    }
     $Obj= new Database();
     $Obj->displayData()
?>