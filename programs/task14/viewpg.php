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
      <h2>Users Information</h2>
<table class="table">
 <thead>
     <tr>
         <th>ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>DOB</th>
         <th>AGE</th>
         <th>Phone_no</th>
         <th>Country</th>
         <th>Source1</th>
         <th>Campaign</th>

     </tr>
</thead>

    <tbody> 

        <?php

           $sql = "SELECT*FROM person_data";
           $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['phone_no']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['source1']; ?></td>
                    <td><?php echo $row['campaign']; ?></td>
                    
                   <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                 </tr>                     
                  <?php    }
            }
        ?>                
    </tbody>
</table>
    </div> 
</body>
</html>