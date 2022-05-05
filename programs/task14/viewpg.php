<?php 

include 'config.php';
$obj = new Connection();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $obj->deleteRecord($id);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>View Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
      <h2>Users Information</h2>
<table class="table">
 <thead>
     <tr>
         <th>ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>DOB</th>
         <th>AGE</th>
         <th>Phone_no</th>
         <th>Country</th>
         <th>Source1</th>
         <th>Campaign</th>

     </tr>
</thead>

    <tbody> 

        <?php

                $person = $obj->displayData(); 
                foreach ($person as $row) {
        ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['phone_no']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['source1']; ?></td>
                    <td><?php echo $row['campaign']; ?></td>
                    
                   <td>
                       
                   
                   
                   
                   
                   <a class="btn btn-danger" href="viewpg.php?id=<?php echo $row['id']; ?>">Delete</a>&nbsp;
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    edit
  </button>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
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
     <select id="country1" name='country' >
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
     </form>

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
   
  </div>
    
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

                
                </td>


                   
                 </tr>   
            
                  <?php    
            }
        ?>                
    </tbody>
</table>
    </div> 
</body>
</html>