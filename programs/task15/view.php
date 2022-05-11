<?php

include 'ajaxdata.php';
include 'config.php';
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
    #search{
        width:50%;}
    #deletebtn{
        margin:10px;
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
           <div id="header">
               <div id="sub-header">
                   <button id="delete-btn"  class="btn btn-danger"> Delete </button>
                </div>
            <div id="table-data"></div>
          
        </div>
       

           <div id="error-message"></div>
           <div id="success-message"></div>

</div>  
        
  
</body>
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
          console.log(data);
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
          url:"ajax-live-search.php",
          type:"POST",
          success : function (data){
              $("#table-data").html(data);
          }
      })
  }
  loadData();

$("#delete-btn").on("click",function(){
    var id=[];

    $(":checkbox:checked").each(function(key){
        id[key] = $(this).val();

    });
     console.log(id);
    if(id.length === 0){
        alert("PLEASE! select checkbox.");
    } else {
        if(alert("do you really want to delete this record?")){
             // console.log(id);
        $.ajax({
            url:"delete-data.php",
            type:"POST",
            data :{id:id},
            success: function(data){
              //  console.log(data);
              if(data==1){
                  $("#success-message").html("data delete successfully.").slideDown();
                  $("#error-message").slideUP();
              }else{
                $("#error-message").html("data can't delete ").slideDown();
                $("#success-message").slideUP();
              }
            }
        });
        }
       
    }
});
});

</script>
</html>