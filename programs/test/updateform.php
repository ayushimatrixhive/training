<?php 

include "config.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    if(isset($_GET['id']))
    {
        $userid = $_GET['id'];
        $sql = "SELECT * FROM `employee` where id = $userid";
        $res= mysqli_query($conn, $sql);
         while($row= mysqli_fetch_array($res))
         {
         // print_r($row);
         
         ?>
         
    <div class="container">
        <form id ="form1" type = "hidden" action="#" method="post" enctype="multipart/form-data">
            <hr>
            <img src="uploads/<?php echo $row['image'];?>" style="width:100px;height:100px ">
            <hr> 
            <legend><h1>Employee:</h1></legend>
    Name:<br>
    <input type="text" name='name' id='name' onchange="validateName();" >
    <span class="error" id = "nameError">*</span>
    <br>
   
    DOB:<br>
    <input type="date" id='dob' name = 'dob' max="<?php echo date("Y-m-d");?>" onchange="getAge();">
    <span class="error" id = "dobError">*</span>
    <br>

    Age:<br>
    <input type="text" name='age' id = 'age' readonly/>
    <span class="error" id = "ageError">*</span>
    <br>

    Mobile_no:<br>
    <input type="text" name='mobile_no' id = 'mobile' onchange="mobileValidation();">
    <span class="error" id = "mobileError"></span>
    <br>

    Salary:<br>
    <input type="number" id="salary" name='salary' min="1"  >
    <span class="error" id = "salaryError">*</span>
    <br>
    <br>
    
    Image:<br>
    <input type="file" name="image">
    <span class="error" id = "imageError">*</span>

    <br>
    <br>
    <button type="submit" name='update' value="update"  onclick="validate();"> Update  </button>

    <button type="reset" name="clear" value="clear" >Clear </button>

<script type="text/javascript">

$(document).ready(function() {
let check = $("#form1").validate(
   {
      rules: {
        name: {
             required: true,
             namecheck: true,
             },
        mobile_no: {
            required: true,
            numcheck: true,
            minlength: 10,
             maxlength: 10,
             },

        salary: {
            required: true,
            salcheck: true
               },
             },
        // image:{
        //   required:true,
        // }

        messages: {
            name: {
                required: "<br> Enter your name",
                namecheck: "Name can only accept charectrers",
            },
            mobile_no: {
                numcheck: "<br>enter number only",
                required: "<br>Enter Mobile no",
                minlength: "<br>The mobile number should be 10 digits",
                maxlength: "<br>Don't enter more than 10 numbers",
            },
            salary: {
                required: "<br>Enter your salary value",
                salcheck: "Salary should be in numeric format",
                },
            // image: {
            //     required: "<br>select your image ",
                
            // },
              },
           });
    $.validator.addMethod("numcheck",
    function(value, element) {
        return /^\+?[1-9][0-9]{7,14}$/.test(value);
    });

    $.validator.addMethod("namecheck",
    function(value, element) {
        return /^[a-zA-Z\s]*$/;i.test(value);
    });

    $.validator.addMethod("salcheck",
    function(value, element) {
        return /^[0-9]+$/.test(value);
    });


});

     function validateName() {
      var name = document.getElementById('name').value;
      var nameRegex =  /^[a-zA-Z\s]*$/;
      if (name.length === 0 ) {
        document.getElementById('nameError').innerHTML = "";
      } else if(!nameRegex.test(name)){ 
        document.getElementById('nameError').innerHTML = "<br>Please provide valid name";
      } else {
        document.getElementById('nameError').innerHTML = "";
      }
    }
   
      //Get Age Caluation 
      function getAge() {  
          var dobValue = document.getElementById('dob').value;
          if (dobValue === "") {
            document.getElementById('dobError').innerHTML = "<br>Please Select DOB";
          } else {
              //Create Today Date
              var today = new Date();
              //change string to date
              var birthDate = new Date(dobValue);
              var age = today.getFullYear() - birthDate.getFullYear();
              //calculate month difference from current date in time
              var m = today.getMonth() - birthDate.getMonth();
              if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                  age--;
              }
              if (age > 18) {
                document.getElementById('dobError').innerHTML = "";
                document.getElementById('ageError').innerHTML = "";
                //display the calculated age
                document.getElementById('age').value=  age;
              } else {
                document.getElementById('dobError').innerHTML = "<br>Please! Select Valid DOB";
                document.getElementById('ageError').innerHTML = "<br>Sorry! you are not eligible. Your age is " + age;
              }
          }
        }
        function mobileValidation() {
          var phoneNumber = document.getElementById('mobile').value;
          var phoneno = /^\d{10}$/;
          if(phoneNumber.match(phoneno)) {
            document.getElementById('mobileError').innerHTML = "";
          } else {
              document.getElementById('mobileError').innerHTML = " <br>Enter 10 digit Number";               
          }
        }
      
       
   </script>

        </form>
        <?php
         }
        ?>
 <?php

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $dob =$_POST['dob'];
    $age = $_POST['age'];
    $mobile_no = $_POST['mobile_no'];
    $salary = $_POST['salary'];
    $image = $_POST['image'];
    $image = $_FILES['image']['name'];
    $tmpname  = $_FILES['image']['tmp_name'];
    $dir = "uploads/";
    $targetpath = $dir . basename($_FILES['image']['name']);
    $sql = mysqli_query($conn,"UPDATE `employee` SET `name`='$name',`dob`='$dob',`age`='$age',`mobile_no`='$mobile_no',`salary`='$salary',`image`='$image' WHERE id=$userid");
    if($sql == true){
    echo "<script>alert('data updated')</script>";
    }
    else{
        echo "<script>alert('data not updated')</script>";
      }
      }       
    } 
?> 

    </body>
</html>