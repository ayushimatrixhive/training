<?php
include "config.php";
$obj= new Connection();
$obj->updateRecord($_GET['id']);

?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        
            <style>
                body {background-color: lightblue;},
                div { border-radius: 5px; background-color: #F2F2F2; padding: 20px;}
            </style>
            </head>
            <body>
            <h4> Upadte Form </h4>
            <body>
            <?php $data = $obj->displyaRecordById($_GET['id']) ?>
            <form id="form1" action="" method="POST"  enctype="multipart/form-data">
                First Name:<br>
                    <input type="text" name='fname' id='fname' value='<?php echo $data['fname'] ?>' >
                    <span class="error" id = "fnameError">*</span>
                    <br>
                Last Name:<br>
                    <input type="text" name='lname' id='lname' value='<?php echo $data['lname'] ?>' >
                    <span class="error" id = "lnameError">*</span>
                    <br>
                DOB:<br>
                    <input type="date" id='dob' name = 'dob' max="<?php echo date("Y-m-d");?>" onchange="getAge();" value='<?php echo $data['dob'] ?>'>
                    <span class="error" id = "dobError">*</span>
                    <br>
                Age:<br>
                    <input type="text" name='age' id = 'age' value='<?php echo $data['age'] ?>' readonly/>
                    <span class="error" id = "ageError">*</span>
                    <br>
                Email:<br>
                    <input type="text" name='email' id = 'email' value='<?php echo $data['email'] ?>' >
                    <span class="error" id = "emailError">*</span>
                    <br>
                Phone_no:<br>
                    <input type="text" name='phone_no' id = 'phone_no' value='<?php echo $data['phone_no'] ?>'>
                    <span class="error" id = "phoneError">*</span>
                    <br>
                Country:<br>
               
                    <select id="country" name='country'value='<?php echo $data['country'] ?>'  >
                    <option value="">select country</option>
                    <option value="INDIA">INDIA</option>
                    <option value="USA">USA</option>
                    <option value="JAPAN">JAPAN</option>
                    <option value="DUBAI">DUBAI</option>
                    </select>
               
                    <br>
                Source:<br>
                    <input type="text" id='source1' name='source1' value='<?php echo $data['source1'] ?>'>
                    <span class="error" id = "sourceError">*</span>
                    <br>
                Campaign:<br>
                    <input type="text" id='campaign' name='campaign' value='<?php echo $data['campaign'] ?>'>
                    <span class="error" id = "campaignError">*</span>
                    <br>
                    <br>
                <button type="submit" name='update' value="update"  onclick="validate();"> Update  </button>
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