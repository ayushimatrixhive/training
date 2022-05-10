<?php
 include "config.php";
 $obj= new Connection();

// Check if delete button active, start this 

if(isset($_POST['deletebtn']))
{
    $checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){

$del_id = $checkbox[$i];
$sql = "DELETE FROM links WHERE link_id='$del_id'";
$result = mysqli_query($sql);
}
// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=view_links.php\">";
}
}

mysqli_close($dbc);

?>