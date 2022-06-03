<?php

class Database{

    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root1","root1","testing");
    } 

 public function displayData()
 {
         $request=$_REQUEST;
         $col = array(
             0 => 'id',
             1 => 'name',
             2 => 'address',
             3 => 'gender',
             4 => 'age',
             5 => 'city',
            );
            
        $sql= "SELECT * FROM tbl_employee";
        $query = mysqli_query($this->conn , $sql);
        $totalData = mysqli_num_rows($query);
        $totalFilter=$totalData;

         if(!empty($request['search']['value'])){
            $sql.=" WHERE  id LIKE '".$request['search']['value']."%'
                  OR name LIKE '".$request['search']['value']."%'
                  OR address LIKE '".$request['search']['value']."%'
                  OR gender LIKE '".$request['search']['value']."%'
                  OR age LIKE '".$request['search']['value']."%'
                  OR city LIKE '".$request['search']['value']."%' ";

         }

        $sql.=" ORDER BY " .$col[$request['order'][0]['column']]. "   " .$request['order'][0]['dir']. "  "
               . "  LIMIT "  . $request['start'] ." , " . $request['length']." " ;

               
        $query = mysqli_query($this->conn , $sql);
        $totalData = mysqli_num_rows($query);

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
           echo json_encode ($json_data );
        
        
     }
    }
     $Obj= new Database();
     $Obj->displayData()
?>