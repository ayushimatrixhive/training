
<?php

//$limit=$_POST["limit"];
$limit = 15;
//print_r($limit_value);

$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");

$query="SELECT * FROM person_data  LIMIT $limit";

//print_r($query);
$output="";
$result = mysqli_query($conn , $query)  OR die("sql query failed");
///print_r($result);

if(isset($_POST["limit"])){
 
if(mysqli_num_rows($result)>0)
{ 
       $output .= '<table  width="100%" cellpadding="5px" >
           <tr>
           <th width="15px" class= id="select_all">  </th>
           <th width="80px"> ID </th>
           <th width="120px"> F NAME </th>
           <th width="120px"> L NAME  </th>
           <th width="120px"> DOB </th>
           <th width="90px">  AGE </th>
           <th width="120px"> PHONE_NO </th>
           <th width="190px"> EMAIL </th>
           <th width="100px"> SOURCE1 </th>
           <th width="120px"> CAMPAIGN </th>
           <th width="120px"> EDIT </th>
           <th width="120px"> DELETE </th>
          </tr>';
       while($row = mysqli_fetch_array($result))
       {

           $output .="<tr>
           <td align='center'><input type='checkbox' value='{$row['id']}'></td>
           <td>{$row['id']}</td>
           <td>{$row['fname']}</td>
           <td>{$row['lname']}</td>
           <td>{$row['dob']}</td>
           <td align='center'>{$row['age']}</td>
           <td>{$row['email']}</td>
           <td>{$row['phone_no']}</td>
           <td>{$row['source1']}</td>
           <td>{$row['campaign']}</td>
           <td><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button>
           <td><button class='delete-btn' data-id='{$row["id"]}'>Delete</button>
           <td>
       </tr>";
       }
       echo $output;
       $output .='</table>';
       }



   
//     if (mysqli_query($conn,$sql)) {
//          echo true;
//          }else{
//           echo false;
//          }
  
}

// if ($result == true) { 
//    echo "<script>alert('data FETCH')</script>";
//   }else{
//     echo "<script>alert('data not inserted')</script>";
//   }
   
  
?>
