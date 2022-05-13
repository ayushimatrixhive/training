
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
</div>  
        
  
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
          $("#location").html(data);
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

<!-- <script type="text/javascript">
  $(document).ready(function(){
    function loadTable(page){
      $.ajax({
        url:"ajax-pagination.php",
        type: "POST",
        data:{page_no: page},
        success : function(data){
          $('#table-data').html(data);
        }
      });
    }
    loadTable();

     $(document).on("click","#pagination a",function(e){
       e.prevemtDefault();
       var page_id=$(this).attr("id");
     })
  });
 
 -->

</script>
</html>