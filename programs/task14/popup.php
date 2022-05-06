<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <!-- <h2>click to update form</h2>-->
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Update Form
  </button> 
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body">
        <body>
        <h2>  INFORMATION UPDATE </h2>
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
            <input type="date" id='dob' name = 'dob'  onchange="getAge()";>
            <span class="error" id = "dobError">*</span>
            <br>
            Age:<br>
            <input type="text" name='age' id = 'age' >
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
            <select id="country1" name='country'>
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
                <button type="submit" name='update' value="update"  onclick="validate();"> Update  </button>
            <button type="reset" name="clear" value="clear" >Clear </button>
        </form>
<script type="text/javascript">
$(document).ready(function() {
let check = $("#form").validate(
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
                sourcecheck: "<br>source can  accept charectrers",
                },
            campaign: {
                required: "<br>Enter your campaign value",
                campaigncheck: "<br>campaign can accept special values ",
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
        return /^[a-zA-Z]*$/;i.test(value);
    });
    $.validator.addMethod("lnamecheck",
    function(value, element) {
        return /^[a-zA-Z]*$/;i.test(value);
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
   </script>
      </form>
    </body>
</html>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>