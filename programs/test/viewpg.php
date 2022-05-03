<?php 
include "config.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>View Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
      <h2>Employee Information</h2>
<table class="table">
 <thead>
     <tr>
         <th>ID</th>
         <th>UUID</th>
         <th>Name</th>
         <th>DOB</th>
         <th>Age</th>
         <th>Mobile_no</th>
         <th>Salary</th>
         <th>Image</th>
         
     </tr>
</thead>

    <tbody> 

        <?php

           $sql = "SELECT*FROM employee";
           $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['UUID']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['mobile_no']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><img src="uploads/<?php echo $row['image'];?>" style="width:150px;height:150px "></td>
                   
                <td><a class="btn btn-info" href="updateform.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                 </tr>                      
                  <?php    }
            }
        ?>                
    </tbody>
</table>
    </div> 
</body>
</html>