<?php


$student_id= $_POST["id"];

$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

$output="";
$sql="SELECT * FROM person_data WHERE id = {$student_id}";
$result = mysqli_query($conn , $sql) or die("sql query failed");
if(mysqli_num_rows($result)>0)
{
        while($row = mysqli_fetch_array($result))
        {

            $output .="<tr>
                            <td> First Name </td>
                            <td><input type='hidden ' id='edit-fname' ></td>
                            <td><input type='text' id='edit-fname' value='{$row["fname"]}'></td>
                       </tr>
                        <tr>
                            <td> Last Name </td>
                            <td><input type='text' id='edit-lname' value='{$row["lname"]}'></td>
                       </tr>
                        <tr>
                            <td> DOB </td>
                            <td><input type='text' id='edit-dob' value='{$row["dob"]}'></td>
                    </tr>
                    <tr>
                            <td> AGE </td>
                            <td><input type='text' id='edit-age' value='{$row["age"]}'></td>
                    </tr>
                    <tr>
                            <td> EMAIL </td>
                            <td><input type='text' id='edit-email' value='{$row["email"]}'></td>
                    </tr>
                    <tr>
                            <td> PHONE_NO </td>
                            <td><input type='text' id='edit-phone_no' value='{$row["phone_no"]}'></td>
                    </tr>
                    <tr>
                            <td> SOURCE1 </td>
                            <td><input type='text' id='edit-source1' value='{$row["source1"]}'></td>
                    </tr>
                    <tr>
                            <td> CAMPAIGN </td>
                            <td><input type='text' id='edit-campaign' value='{$row["campaign"]}'></td>
                    </tr>
                    <tr>
                            <td></td>
                            <td><input type='submit' id='edit-submit' value='save'></td>
                    </tr>";
                }
        echo $output;
        $output .='</table>';
        }
        else {
            echo 'data not found';
            
        }

if ($result == true) {
    header("Location:view.php");
} else {
    echo "Data can't be updated";
}
?>