<?php

$search_value =$_POST["search"];

//print_r($search_value);
$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

$sql="SELECT * FROM person_data 
WHERE fname LIKE '%{$search_value}%' 
   OR lname LIKE '%{$search_value}%' 
   OR dob LIKE '%{$search_value}%' 
   OR phone_no LIKE '%{$search_value}%'
   OR email LIKE '%{$search_value}%'
   OR source1 LIKE '%{$search_value}%' 
   OR age LIKE '%{$search_value}%'
   OR campaign LIKE '%{$search_value}%'";
$output="";
$result = mysqli_query($conn , $sql) or die("sql query failed");

if(mysqli_num_rows($result)>0)
{
    $output .= '
                <tr>
                    <th width="80px">  </th>
                    <th width="80px"> ID </th>
                    <th width="120px"> FIRST NAME </th>
                    <th width="120px"> LAST NAME  </th>
                    <th width="120px"> DOB </th>
                    <th width="90px">  AGE </th>
                    <th width="120px"> PHONE_NO </th>
                    <th width="190px"> EMAIL </th>
                    <th width="150px"> SOURCE1 </th>
                    <th width="120px"> CAMPAIGN </th>
                    <th width="120px"> ACTION </th>
                </tr>';
        while($row = mysqli_fetch_array($result))
        {

            $output .='
            <tr>
                <td align="center"><input type="checkbox">'. $row[""].'</td>
                <td>'. $row["id"].'</td>
                <td>'. $row["fname"].'</td>
                <td>'. $row["lname"].'</td>
                <td>'. $row["dob"].'</td>
                <td>'. $row["age"].'</td>
                <td>'. $row["phone_no"].'</td>
                <td>'. $row["email"].'</td>
                <td>'. $row["source1"].'</td>
                <td>'. $row["campaign"].'</td> 
             <td> <a  href="update.php?id=<?php echo $row["id"]; ?>Edit</a>&nbsp;
                  <a  href="view.php?id=<?php echo $row["id"]; ?>Delete</a>&nbsp;
             </td>
            </tr>';
        }
        echo $output;
        $output .='</table>';
        }
        else {
            echo 'data not found';
            
        }


if ($mysql_query == true) {
    header("Location:view.php");
} else {
    echo "Data can't be updated";
}


?>