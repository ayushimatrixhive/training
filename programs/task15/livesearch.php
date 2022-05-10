<?php

$servarname='localhost';
$username='root1';
$password='root1';
$database = "participant";
$conn=mysqli_connect($servarname,$username,$password,"$database");
if(!$conn)
    {
      die('Could not Connect MySql Server:' .mysql_error());
    }

if(isset($_POST['input'])){

    $input=$_POST['input'];

    $query = "SELECT * FROM  person_data WHERE name LIKE'{$input}%'";

    $result = mysqli_query($conn ,$query);

    if(mysqli_num_rows($result)>0){ ?>
    <table class = "table table-border table-striped mt-4">
        <thead>
            <tr>
                  <th>Id</th>
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
         </thread>
         <tbody>
             <?php while($row = mysqli_fetch_assoc($result)){
                 print_r($id);
                 $id=$row['id'];
                 $fname=$row['fname'];
                 $lname=$row['lname'];
                 $email=$row['email'];
                 $dob=$row['dob'];
                 $age=$row['age'];
                 $phone_no=$row['phone_no'];
                 $source1=$row['source1'];
                 $campaign=$row['campaign'];

                 ?>
                 <tr>
                     <td><?php echo $id;?><td>
                     <td><?php echo $fname;?><td>
                     <td><?php echo $lname;?><td>
                     <td><?php echo $email;?><td>
                     <td><?php echo $dob;?><td>
                     <td><?php echo $age;?><td>
                     <td><?php echo $phone_no;?><td>
                     <td><?php echo $source1;?><td>
                     <td><?php echo $campaign;?><td>

             </tr>

            <?php
             }
             ?>
    </tbody>

    </table>

    <?php


        
    }else {
        echo " data not found";
    }
}

?>