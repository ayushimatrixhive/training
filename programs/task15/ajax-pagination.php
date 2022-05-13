<?php
$conn = mysqli_connect("localhost","root1","root1","participant") OR die("Connection failed");
$sql="SELECT * FROM person_data";

$result = mysqli_query($conn , $sql) or die("sql query failed");
$output="";

if(mysqli_num_rows($result)>0)
{ 
    $output .= ' 
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
        <td>
    </tr>";
    }
    echo $output;
    $output .="</table>";


  

    $output .='<div id="pagination" class="pagination-container">
    <a class="active" id="1" href="">1</a>
    <a  id="2" href="">2</a>
    <a id="3" href="">3</a>
    <nav>
      <ul class ="pagination admin-pagination"><ul>
    </nav>
  </div>';

   echo $output;
}else{
    echo " no record found";
}

}
?>