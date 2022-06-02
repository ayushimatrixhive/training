<?php
include 'db.php';
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- DataTables JS library -->
      <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      </head>   
      <body>  
          <br>
          <br>
           <div class="container"> 
                <div class="table-responsive">  
                    <table id="employee_data" class="table table-striped table-bordered">  
                        <thead>  
                          <tr>  
                          <th>ID</th>  
                          <th>NAME</th>  
                          <th>ADDRESS</th>  
                          <th>GENDER</th>  
                          <th>AGE</th>  
                          <th>CITY</th>  
                          </tr>  
                        </thead> 
                      <tfoot>
                          <tr>
                            <th>ID</th>  
                            <th>NAME</th>  
                            <th>ADDRESS</th>  
                            <th>GENDER</th>  
                            <th>AGE</th>  
                            <th>CITY</th>  
                          </tr>
                      </tfoot>
                    </table>  
                </div> 
           </div>  
      </body>  
 </html>  
    <script>  
    $(document).ready(function(){  
        $('#employee_data').DataTable({
          processing: true,
          serverSide: true, 
          
          ajax:{
            url:"db.php",      
            type :"POST",
          }           
        });  
    });  
 </script>