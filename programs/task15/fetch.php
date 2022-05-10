<?php

$connect = mysqli_connect("localhost","root1","root1","participant");
$output=' ';
$sql="SELECT * FROM person_data WHERE fname LIKE '%" .$_POST["search"]."%'";
$result = mysqli_query($connect , $sql);

if(mysqli_num_rows($result)>0)
{
    $output .= '<h4 align ="center"> Search Result</h4>';
    $output .= '<div class ="table-responsive">
                  <table class = "table table bordered">
                  <tr>
                    <th> ID </th>
                    <th> FIRST NAME </th>
                    <th> LAST NAME  </th>
                    <th> DOB </th>
                    <th> AGE </th>
                    <th> PHONE_NO </th>
                    <th> EMAIL </th>
                    <th> SOURCE1 </th>
                    <th> CAMPAIGN </th>
                </TR>';
        while($row = mysqli_fetch_array($result))
        {

            $output .='
            <tr>
                <td>'. $row["id"].'</td>
                <td>'. $row["fname"].'</td>
                <td>'. $row["lname"].'</td>
                <td>'. $row["dob"].'</td>
                <td>'. $row["age"].'</td>
                <td>'. $row["phone_no"].'</td>
                <td>'. $row["email"].'</td>
                <td>'. $row["source1"].'</td>
                <td>'. $row["campaign"].'</td>
            </tr>';

        }
        echo $output;
}
else {
    echo 'data not found';
    
}





?>
