<?php
include "config.php";
//please fix the buggy PHP code
if (isset($_POST['submit'])) {
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $country=$_POST['country'];
    $phone_no = $_POST['phone_no'];
    $source1 = $_POST['source1'];
    $campaign = $_POST['campaign'];

    $sql= " INSERT INTO `person_data`(`fname`, `lname`, `dob`, `age`,`email`,`country`, `phone_no`, `source1`,`campaign`) VALUES ('$fname', '$lname','$dob','$age','$email','$country','$phone_no','$source1','$campaign')";
      $result = mysqli_query($conn,$sql);
        if ($result == TRUE) { 
           echo "<script>alert('data inserted')</script>";
          }else{
            echo "<script>alert('data not inserted')</script>";
          }

   $conn->close(); 
  }
  ?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="lib/jquery1.5.2.js"></script>
<script src="lib/jquery.validate.js"></script>
<script src="lib/myjs.js"></script>

<style>
     body {background-color: lightblue;},
     div { border-radius: 5px; background-color: #f2f2f2; padding: 20px;}

     
</style>

</head>
</head>
<div>
<body>
<h2> ENTER INFORMATION </h2>
<form id="form1" action="" method="POST"  enctype="multipart/form-data">

    First Name:<br>
    <input type="text" name='fname' id='fname'  >
    <span class="error" id = "fnameError">*</span>
    <br>

    Last Name:<br>
    <input type="text" name='lname' id='lname'  >
    <span class="error" id = "lnameError">*</span>
    <br>
   
    DOB:<br>
    <input type="date" id='dob' name = 'dob' max="<?php echo date("Y-m-d");?>" onchange="getAge();">
    <span class="error" id = "dobError">*</span>
    <br>

    Age:<br>
    <input type="text" name='age' id = 'age' readonly/>
    <span class="error" id = "ageError">*</span>
    <br>

    Email:<br>
    <input type="text" name='email' id = 'email' >
    <span class="error" id = "emailError">*</span>
    <br>

    Phone_no:<br>
    <input type="text" name='phone_no' id = 'phone_no'>
    <span class="error" id = "phoneError">*</span>
    <br>

    Country:<br>
    <input type="text" id='country' name='country' >
     <br>
     <select id="country1">
     <option value="">select country</option>
     <option value="INDIA">INDIA</option>
     <option value="USA">USA</option>
     <option value="JAPAN">JAPAN</option>
     <option value="DUBAI">DUBAI</option>
     </select>
     <!-- <span class="error" id = "emailError">*</span> -->
     <br>

     Source:<br>
     <input type="text" id='source1' name='source1'>
     <span class="error" id = "sourceError">*</span>
     <br>

     Campaign:<br>
     <input type="text" id='campaign' name='campaign'>
     <span class="error" id = "campaignError">*</span>


     <br>
     <br>
     <button type="submit" name='submit' value="submit" id="submitbtn" onclick="validate();" >Submit </button>

     <button type="reset" name="clear" value="clear" >Clear </button>


     <script type="text/javascript">

        $(document).ready(function() {
           let check = $("#form1").validate(
              {
                rules: {
                  fname: {
                        required: true,
                        fnamecheck: true,
                        },
                  lname: {
                        required: true,
                        lnamecheck: true,
                        },
                  email:{
                      required: true,
                      emailcheck: true, 
                    },
                  phone_no: {
                      required: true,
                      numcheck: true,
                      minlength: 10,
                      maxlength: 10,
                        },
                  source1: {
                      required: true,
                      sourcecheck: true,
                          },
                  campaign: {
                      required: true,
                      campaigncheck: true,
                          },
                        },
                

                  messages: {
                      fname: {
                          required: "<br> Enter your first name",
                          fnamecheck: "<br>Name can only accept charectrers",
                      },
                      lname: {
                          required: "<br> Enter your  last name",
                          lnamecheck: "<br>Name can only accept charectrers",
                      },
                      phone_no: {
                          numcheck: "<br>enter number only",
                          required: "<br>Enter phone no",
                          minlength: "<br>The phone number should be 10 digits",
                          maxlength: "<br>Don't enter more than 10 numbers",
                      },
                      email:{
                        required: "<br>Enter email address",
                        emailcheck: "<br>enter valid email address",
                      },
                      source1: {
                          required: "<br>Enter your source value",
                          sourcecheck: "<br>source can accept charectrers ,space, number values  values",
                          },
                      campaign: {
                          required: "<br>Enter your campaign value",
                          campaigncheck: "<br>campaign can accept charectrers ,space, number values ",
                          
                          },
                      country: {
                          required: "<br>Enter your country value",
                          countrycheck: "<br>select option menu",
                          },
                      
                        },
                      });

            $.validator.addMethod("numcheck",
              function(value, element) {
                  return /^\+?[1-9][0-9]{7,14}$/.test(value);
              });

            $.validator.addMethod("fnamecheck",
              function(value, element) { 
                return /^[a-zA-Z\s]*$/;i.test(value)
              });

            $.validator.addMethod("lnamecheck",
              function(value, element) {
                return /^[a-zA-Z\s]*$/;i.test(value)
              });

            $.validator.addMethod("emailcheck",
              function(value, element) {
                  return /^[^@]+@[^@]+\.[a-zA-Z]{2,6}/.test(value);
              });

            $.validator.addMethod("sourcecheck",
              function(value, element) {
                return /^[0-9\sa-zA-Z_]+$/.test(value);
              });

            $.validator.addMethod("campaigncheck",
              function(value, element) {
                  return /^[0-9\sa-zA-Z_]+$/.test(value);
              });
            });

            $('#country1').on('change',function(){
            $('#country').val($(this).val());
            });
    
            function getAge() {  
                var dobValue = document.getElementById('dob').value;
                if (dobValue === "") {
                  document.getElementById('dobError').innerHTML = "<br>Please Select DOB";
                } else {             
                    var today = new Date();                
                    var birthDate = new Date(dobValue);
                    var age = today.getFullYear() - birthDate.getFullYear();               
                    var m = today.getMonth() - birthDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    if (age > 18) {
                      document.getElementById('dobError').innerHTML = "";
                      document.getElementById('ageError').innerHTML = "";
                      document.getElementById('age').value=  age;
                    } else {
                      document.getElementById('dobError').innerHTML = "<br>Please! Select Valid DOB";
                      document.getElementById('ageError').innerHTML = "<br>Sorry! you are not eligible. Your age is " + age;
                    }
                }
              }

     </script>
      </form>
  </div>
</body>
</html>