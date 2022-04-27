<?php

 
class xyz{
    public $db_conn;
    function __construct() {
        $servername='localhost';
        $username='root1';
        $password='root1';
        $dbname = "con";
       
        $this->db_conn=mysqli_connect($servername,$username,$password,"$dbname");

          if(!$this->db_conn){
              die('Could not Connect MySql Server:' .mysql_error());
            }
          

        }  
      function get_country() {
        $arr = array();
        $result = mysqli_query($this->db_conn,"SELECT * FROM `con1` ORDER BY position ");
             while($row = mysqli_fetch_array($result)) {
                // echo '
                // <tr data-index="'.$data['id'].' " data-position= "'.$data['position'].'" >
                //     <td>'.$data['name'].'</td>
                // </tr>
                //  ';
              array_push($arr, $row);
              //print_r($arr);
             }
        return $arr;
   }
}

       if(isset($_POST['update'])) {
           foreach($_POST['positions'] as $position){
             
               $index = $position[0];
               $newPosition = $position[1];

               $db_conn-> query ( " UPDATE `con1` SET position = '$newPosition' WHERE id='$index' ");

           }
           exit ('success');
       } 
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</head>
<body>
<div class="container"  style="margin-top:100px;">
           <div class="row justify-content-center">
             <div class="col-md-4 col-md-offset-4">
                <table class= "table table-stripped table-hover table-bordered">
                  <thead>
                      <tr>
                          <td> Name </td>
                       </tr>
                   </thead>                       
                        <tbody>
                            <?php 
                               $obj = new xyz();
                               $data1 = $obj->get_country();
                            //   print_r($data1);
                               foreach($data1 as $data){
                            //   while($data=$sql->fetch_array()){
                                  echo '
                                      <tr data-index="'.$data['id'].' " data-position= "'.$data['position'].'" >
                                          <td>'.$data['name'].'</td>
                                      </tr>
                                       ';
                                // }
                            }
                             ?>
     
                        </tbody>
                 </table>
              </div>
           </div>
        </div>

            <script type="text/javascript">
                $(document).ready(function(){
                 $('table tbody').sortable({
                      update: function (event,ui) {
                        //  console.log($(this));
                       $(this).children().each(function(index){
                         //  console.log(index);
                            if($(this).attr('data-position')!= (index+1)){
                             $(this).attr('data-position',(index+1)).addClass('updated');
                             }
                         });
                         saveNewPositions();
                         }
                     });

                 });

                 function saveNewPositions(){
                    var positions = [];
                    $('.updated').each(function(){
                        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                        $(this).removeClass('updated');
                        console.log($(this));
                    });

                    $.ajax({
                        url:'index.php',
                        method:'POST',
                        dataType:'text',
                        data: {
                            update:1,
                            positions: positions
                        },
                        success: function (response){
                         console.log(response);
                        }
                     });
                 }

            </script>
    
</body>
</html>

