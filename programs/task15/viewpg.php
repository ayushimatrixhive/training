<?php

include 'ajaxdata.php';
include 'config.php';
//include 'ajax-live-search.php';
$obj = new Connection();

$uobj=new dataPopup();
$uobj->dataupdate($id);    
// $obj->updateRecord($_POST['id']);

$userobj = new Connection();
$userobj->dataupdated($id);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<style>
    #live_search{
        width:50%;}
    #delete-btn{
        margin:10px;
       
    }

   

    </style>

</head>
   <body>
  
        <div class="container" >
          <h2>Users Information</h2>
          <div id="header">
               
          <table id="main" cellspacing="0">
            <tr>
              <td id="header">


          <div id="search-bar" >
              <input type="text" name ="search" id="search" placeholder="search.." class="form-control" autocomplete="off"> <br>
            
           </div>
           <div id="sub-header"  class="btn btn-danger">

                   <button id="delete-btn"> Delete </button>
                </div>
           <br>
           <div>
        
  </div>
  
  </div>
  </td>
  </tr>
<br>
<tr>
<td id="table-data"></td>   
    <form id="add form">

          <table class="table" id ="myTable" id="example" >
          <thead>
              <tr>
              
                 <!-- <button type="button" id="selectAll" class="main">select</button>
                 <span class="sub"></span>  <button id='deletebtn'>DELETE</button> -->
                  <th scope="col">Select </button></th>
                  <th scope="col">ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">DOB</th>
                  <th scope="col">AGE</th>
                  <th scope="col">Phone_no</th>
                  <th scope="col">Country</th>
                  <th scope="col">Source1</th>
                  <th scope="col">Campaign</th>
              </tr>
              
          </thead>
                  <tbody>
                       <?php
                         
                          $person = $obj->displayData();
                          foreach ($person as $row) {
                         ?>
                              <tr >
                               
                              <td><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $row["id"]; ?>"></td>  
                              <td class="user_id"><?php echo $row['id']; ?></td>
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
                         

                            <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                            <a class="btn btn-danger" href="update.php?id=<?php echo $row['id']; ?>">edit</a>&nbsp;
                            <a class="btn btn-danger" href="viewpg.php?id=<?php echo $row['id']; ?>">Delete</a>&nbsp;
                            <button type="button" id="sendbtn" class="btn btn-primary editbtn" data-bs-toggle="modal"    data-bs-target="#myModal" >  popup </button>
                            <!-- <button type="button" id="sendbtn" class="btn btn-primary popup" >  popup </button>
                                </div>
                                <!-- The Modal -->
                                <div class="modal" id="myModal" id="empviewmodel">
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
                                <form id="formdata1" action="config.php" method="POST"  enctype="multipart/form-data">

                              

                                      <input type="hidden" name="edit_id" id="edit_id">
                                        First Name:<br>
                                          <input type="text" name="fname" id="fname_id" class="form-control fname">                              
                                        <br>
                                        Last Name:<br>
                                          <input type="text" name='lname' id='lname_id' class="form-control lname" >                               
                                          <br>
                                        DOB:<br>
                                          <input type="date" id='dob_id' name = 'dob' class="form-control dob" max="<?php echo date("Y-m-d");?>" onchange="getAge();" >                               
                                          <br>
                                        Age:<br>
                                          <input type="text" name='age' id = 'age_id' class="form-control age" readonly/>                            
                                          <br>
                                        Email:<br>
                                          <input type="text" name='email' id ='email_id' class="form-control email" >                              
                                          <br>
                                        Phone_no:<br>
                                          <input type="text" name='phone_no' id = 'phone_no_id' class="form-control phone_no">                              
                                          <br>
                                        Country:<br>
                                          <select id="country1_id" name='country' class="form-control country" >
                                          <option value="">select country</option>
                                          <option value="INDIA">INDIA</option>
                                          <option value="USA">USA</option>
                                          <option value="JAPAN">JAPAN</option>
                                          <option value="DUBAI">DUBAI</option>
                                          </select>
                                          <!-- <span class="error" id = "emailError">*</span> -->
                                          <br>
                                        Source:<br>
                                        <input type="text" id='source1_id' name='source1' class="form-control source1">
                                      
                                        <br>
                                        Campaign:<br>
                                          <input type="text" id='campaign_id' name='campaign' class="form-control campaign"  >
                                          
                                          <br>
                                          <br>
                                        <button type="submit" name="updateform1" value="update" id="updatebtn"  onclick="validate();" > submit </button>
                                        <button type="reset" name="clear" value="clear" >Clear </button>
                                        
                                        </form>
                                        </div>

                                        <!-- <script src="jquery/jquery.min.js"></script>
                                        <script src="js/bootstrap.bundle.min.js"></script> -->
                                        

                                        <script>
                                          $(document).ready(function () {
                                                $(".editbtn").click(function(e) {
                                                    e.preventDefault();
                                                    //alert("hello");
                                                    var userdata=$(this).closest('tr').find('.user_id').text();
                                                    //console.log($(this).closest('tr').find('.user_id').text());
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "ajaxdata.php",
                                                        data:{
                                                            'editbtn':true,
                                                            'user_id':userdata,
                                                          
                                                        },
                                                
                                                      success: function (data) {
                                                         console.log(data)
                                                          $.each(JSON.parse(data)  , function (key, value) {
                                                             //  console.log(value['fname']);
                                                              $("#edit_id").val(value['id']);
                                                              $("#fname_id").val(value['fname']);
                                                              $("#lname_id").val(value['lname']);
                                                              $("#dob_id").val(value['dob']);
                                                              $("#age_id").val(value['age']);
                                                              $("#emai_id").val(value['email']);
                                                              $("#phone_no_id").val(value['phone_no']);
                                                              $("#source1_id").val(value['source1']);
                                                              $("#campaign_id").val(value['campaign']);               
                                                               });
                                                              $("#empviewmodel").modal('show')
                                                             //  console.log(empviewmodel)
                                                                  }
                                                              });                        
                                                           });                                             
                                                       });
                                                      
                                              </script>

                                            
                                            

                                              <script type="text/javascript">

                                              //       // $(document).ready(function () {
                                                    // $('body').on('click', '#selectAll', function () {
                                                    //     if ($(this).hasClass('allChecked')) {
                                                    //         $('input[type="checkbox"]', '#example').prop('checked', false);
                                                    //     } else {
                                                    //     $('input[type="checkbox"]', '#example').prop('checked', true);
                                                    //     }
                                                    //     $(this).toggleClass('allChecked');
                                                    //     })
                                                    // });
                                                    // $().ready(function () {
                                                    //     $('body').on('click', '#deletebtn', function () {
                                                    //             $("#example tr").each(function () {
                                                    //                 var rowSelector = $(this);
                                                    //                 if (rowSelector.find("input[type='checkbox']").prop('checked'))
                                                    //                 {
                                                    //                     rowSelector.remove();
                                                    //                 }

                                                    //             });
                                                    //     });
                                                    // });

                                                    // $(document).ready(function () {
                                                    // $("#live_search").keyup(function(){
                                                    //     var input = $(this).val();
                                                    //     //alert(input);
                                                    //     if(input != ""){
                                                    //         $.ajax({
                                                    //              url:"livesearch.php",
                                                    //              method:"POST",
                                                    //              data:{input:input},

                                                    //              sucess:function(data){
                                                    //                  console.log(data)
                                                    //                  $("#searchresult").html(data);
                                                    //                  $("#searchresult").css("display","block");
                                                    //              }

                                                    //         });
                                                    //     } else{
                                                    //         $("#searchresult").css("display","none");
                                                    //     }
                                                    // });
                                                    // });


                                                  $(document).ready(function() {
                                                    let check = $("#formdata1").validate(
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
                              </table> -->
                          
                
                
                                  </body>
                                  <script>    
                                    $('#example_length').on('change', function() {
                                      // $('#location').text(this.value);
                                      var limit_value=$(this).val();
                                    console.log(limit_value);
                                      $.ajax({
                                        url:"limit_value.php",
                                        type:"POST",
                                        data :{ limit:limit_value},
                                        success : function(data){
                                          console.log(data);
                                          $("#table-data").html(data);
                                        }
                                      });
                                    }); 
                                    </script>


                                <script type="text/javascript">
                                $(document).ready(function(){
                                  //alert("hello");
                                    $('#search').on("keyup",function(){
                                      var search_term=$(this).val();

                                      $.ajax({
                                        url:"ajax-live-search.php",
                                        type:"POST",
                                        data :{search:search_term},
                                        success : function(data){
                                          //console.log(data);
                                          $("#table-data").html(data);

                                        }

                                      });
                                    });
                                  });
                                </script>


                                <script type="text/javascript">
                                $(document).ready(function(){
                                  function loadData(){
                                      $.ajax({
                                          url:"load-data.php",
                                          type:"POST",
                                          success : function (data){
                                          // console.log(data);
                                              $("#table-data").html(data);
                                          }
                                      })
                                  }
                                  loadData();

                                $("#delete-btn").on("click",function(){
                                
                                    var id=[];
                                    // console.log(id);

                                    $(":checkbox:checked").each(function(key){
                                        id[key] = $(this).val();

                                    });
                                      // console.log(id);
                                    if(id.length === 0){
                                        alert("PLEASE! select checkbox.");
                                    } else {
                                      if(confirm ("do you really want delete these records?")){
                                        $.ajax({
                                            url:"delete-data.php",
                                            type:"POST",
                                            data : {id :id},
                                            success: function(data){
                                              console.log(data);
                                              if(data == true){
                                                  $("#success-message").html("data delete successfully.").slideDown();
                                                  $("#error-message").slideUp();
                                              }else{
                                                $("#error-message").html("data can't delete ").slideDown();
                                                $("#success-message").slideUp();
                                              }
                                            }
                                        });
                                      }   
                                      
                                    }
                                });
                                });


                                </script>
</html>













