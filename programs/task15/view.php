
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
    #search{
        width:50%;}
    #deletebtn{
        margin:10px;
      }
    #modal{
          background:rgba(0,0,0,0.7);
          position:absolute;
          left:20px;
          top:0;
          width:100%;
          height:150%;
          z-index:100;
          display:none;
        }
    #modal-form{
      background:#fff;
      position:relative;
      left:calc(50%-20%);
      top:20%;
      width:50%;
      padding:100px;
      border-radius:4px;
      display:center;

    }
    #modal-form h2{
      margin: 0 0 15px;
      padding-bottom:10px;
      border-bottom : 1px solid #000;
    }

    .edit-btn{
      background-color:green;
      color:white;
      border:0;
      padding:4px 10px;
      border-radius:3px;
      cursor:pointer;

    }
    .delete-btn{
      background-color:red;
      color:white;
      border:0;
      padding:4px 10px;
      border-radius:3px;
      cursor:pointer;

    }
    #close-btn{
      background-color:red;
      color:white;
      width:30px;
      height:30px;
      line-height:30px;
      text-align:center;
      border-radius:50%;
      position:absolute;
      top:-15px;
      right:-15px;
      cursor:pointer;
    }
   
    </style>

</head>
   <body>

       <div class = "container">
           <h4> User Information </h4>
       <div id="main">
       <div id="search-bar" >
              <input type="text" name ="search" id="search" placeholder="search.." class="form-control" autocomplete="off"> <br>
            
           </div>
<form action="#">
         
<div class ="dataTables_length" id="example_length">
      <label for="lang">select entry</label>
      <select name="limit" id="maxRows">
      <option value="0">SELECT</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="all">all</option>  
      </select>
  </div>

      <!-- <input type="submit" name="submit_value" value="Submit" /> -->
      <div id="location"></div>
</form>
           
           <div id="header">
               <div id="sub-header">
               <div class="row">
               <div class="col-md-2 well">
	               	<span class="rows_selected" id="select_count"></span>
                   <button id="delete-btn" name="delete_data" class="btn btn-danger"> Delete </button>
                </div>
  </div>
  </div>

          <div>
          <table id="mytable" >
            
            <div id="table-data"></div>
          </table>
          </div>
          
       

        <!-- <div id="pagination" class="pagination-container">
          <a class="active" id="1" href="">1</a>
          <a  id="2" href="">2</a>
          <a id="3" href="">3</a>
          <nav>
            <ul class ="pagination admin-pagination"><ul>
          </nav>
        </div> -->

       
        <div id="error-message"></div>
        <div id="success-message"></div>
        <div>

        <div id="modal">
          <div id="modal-form">
          <form id="formdata1" action="view.php" method="POST"  enctype="multipart/form-data">
            <h2>EDIT FORM</h2>
            <table cellpadding="5px" width="100%">
              <tr>
                <input type="hidden" name="edit-id" id="edit-id">
                <td> First Name </td>
                <td><input type="text" name="fname" id="edit-fname" value='' ></td>
              </tr>
              <tr>
                <td> Last Name </td>
                <td><input type="text" name="lname" id="edit-lname" value=''></td>
              </tr>
              <tr>
                <td> DOB </td>
                <td><input type="date" name="dob" id="edit-dob" max="<?php echo date("Y-m-d");?>" onchange="getAge();"  value=''></td>
              </tr>
              <tr>
                <td> AGE </td>
                <td><input type="text" name="age" id="edit-age" value=''></td>
              </tr>
              <tr>
                <td> EMAIL </td>
                <td><input type="text"  name="email" id="edit-email" value=''></td>
              </tr>
              <tr>
                <td> PHONE_NO </td>
                <td><input type="text"  name="phone_no" id="edit-phone_no" value=''></td>
              </tr>
              <tr>
                <td> SOURCE1 </td>
                <td><input type="text" name="source1"  id="edit-source1" value=''></td>
              </tr>
              <tr>
                <td> CAMPAIGN </td>
                <td><input type="text"  name="campaign" id="edit-campaign" value=''></td>
              </tr>
              <tr>
                <td> SUBMIT </td>
                <td><input type="submit" name="updateform1" id="edit-submit"  value="submit"></td>
              </tr>
             </table>
            <div id="close-btn"> x </div>
           </div>
        </div>
</div>  
</body>




<script>
  //delete form
  $(document).on("click",".delete-btn",function(){
    if(confirm("do you really want to delete this record?")){
     var studentId = $(this).data("id");
     var element = this;
    // alert(studentId);

    $.ajax({
      url:"ajax-delete.php",
      type:"POST",
      data:{id:studentId},
      success: function(data){
       if(data==1){
         $(element).closet("tr").fadeOut();

       }else{
        $("#error-message").html("data can't delete ").slideDown();
        $("#success-message").slideUp();
       
       }
      
      }
    });
  }
});


//edit form

  $(document).on("click",".edit-btn",function(){
    $("#modal").show();
    var studentId = $(this).data("eid");
   // alert(studentId );
    $. ajax({
      url:"load-update-form.php",
      type:"POST",
      data:{id:studentId},
      success: function(data){
        $("#model-form table").html(data);
        
      }
    });
 });
  $("#close-btn").on("click",function(){
     $("#modal").hide();
  });

//save update form
  $(document).on("click","#edit-submit", function(){
    var stuId =$("#edit-id").val();
    var fname =$("#edit-fname").val();
    var lname =$("#edit-lname").val();
    var dob =$("#edit-dob").val();
    var age =$("#edit-age").val();
    var email =$("#edit-email").val();
    var phone_no =$("#edit-phone_no").val();
    var source1 =$("#edit-source1").val();
    var campaign =$("#edit-campaign").val();

    $.ajax({
      url:"ajax-update-form.php",
      type:"POST",
      data:{
        id: stuId,
        fname:fname,
        lname:lname,
        dob:dob,
        age:age,
        email:email,
        phone_no:phone_no,
        source1:source1,
        campaign:campaign },
        success: function(data)
       
        {
        //  console.log(data);
          if(data==1){
            $("#model").hide();
            loadData();
          }
         
        }
    });
  });



  //length limit value 

    $('#example_length').on('change', function() {
      // $('#location').text(this.value);
      var limit_value=$(this).val();
     console.log(limit_value);
      $.ajax({
        url:"limit_value.php",
        type:"POST",
        data :{ limit:limit_value},
        success : function(data){
         // console.log(data);
          $("#table-data").html(data);
        }
      });
    }); 
 



// search bar 


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


//multiple-record delete

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
  




  // $(document).ready(function(){
  //   function loadTable(page){
  //     $.ajax({
  //       url:"ajax-pagination.php",
  //       type: "POST",
  //       data:{page_no: page},
  //       success : function(data){
  //         $('#table-data').html(data);
  //       }
  //     });
  //   }
  //   loadTable();

  //    $(document).on("click","#pagination a",function(e){
  //      e.prevemtDefault();
  //      var page_id=$(this).attr("id");
  //    })
  // });

</script>
</html>