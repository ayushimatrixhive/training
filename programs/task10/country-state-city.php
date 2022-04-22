<?php
include "db.php";

     $country_id = $_POST["country_id"];
     $result = mysqli_query($conn,"SELECT * FROM `state` where country_id = $country_id ORDER BY `state` ASC");
     ?>

         <option value="">Select State</option>
     <?php
        while($row = mysqli_fetch_array($result)) {
     ?>
         <option value="<?php echo $row["id"];?>"><?php echo $row["state"];?></option>
     <?php
     }

    $state_id = $_POST["state_id"];
    $result = mysqli_query($conn,"SELECT * FROM city where state_id = $state_id ORDER BY city ASC"); 
    ?>

     <?php
        while($row = mysqli_fetch_array($result)) {
     ?>
         <option value="<?php echo $row["id"];?>"><?php echo $row["city"];?></option>
     <?php
    }
?>