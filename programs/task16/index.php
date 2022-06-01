<?php
include 'db.php';
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
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
                        <tbody>
                            <?php
                                $user = $Obj->displayData();
                                foreach ($user as $row) {
                            ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                        </tr>
                            <?php  
                                }
                            ?> 
                           </tbody> 
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
    <script>  
    $(document).ready(function(){  
        $('#employee_data').DataTable();  
    });  
 </script>