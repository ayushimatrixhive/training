<?php


include 'db.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $deleteId = $_GET['id'];
    $obj->deleteRecord($deleteId);
}


$num_per_page=05;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See USERS Details</title>
</head>

<body>
    <div class="card">
        <!-- <div class="card-header bg-primary text-white text-center">USER DATA</div> -->
        <div class="card-body " id="data">
            <!-- <div class="search-box" style="width: 25%;margin-left:75%" >
        <input type="text" autocomplete="off" placeholder="Search country..." class="form-control">
        <div class="result"></div> -->
        <!-- <lable> select data value </lable> -->

            <select id="limit" class="form-select limits" style="width: 10%;" name="limits" onchange="userData()">
                <option value="">All</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>

            </select>

            <div class="searchbar">
                <input type="text" placeholder="Search" onkeyup="userData()" class="form-control" id="search" style="width: 30%; margin-left:70%; margin-top: -36px;">
            </div>
            <br>
            <div class="deletebutton">
            <!-- <button type="button" type="submit"  id="deletebtn" value="delete" class="btn btn-primary btn-sm delete"  data-id="<?=$row['id'];?>">Delete</button>  </div> -->
            <button id="delete-btn" name="delete_data" class="btn btn-danger"> Delete </button>
            </div>

           <table class = "table table-bordered">
                <thead class = "bg-primary text-white text-center">
                    <tr> 
                        <th>#</th>
                        <th>Id</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Source1</th>
                        <th>Campign</th>
                        <th>Country</th>
                        <th>Action</th>
                     </tr> 
                    <thead id="response"> 

            </table>

         <!-- <div id="pagination" class="pagination-container" style="height : 500% ; margin-left:75%; margin-bottom : -30px;"> 
                    <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> -->
            </div>

            <!-- <script type="text/lavascript" src="js/jquery.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    function  userData(page){
                        $.ajax({
                            url:"ajax-pagination.php",
                            type:"post",
                            data:{page_no:page},
                            success : function(data){
                                $("#data").html(data);
                            }
                        });
                    }

                userData();

                $(document).on("click","#pagination a",function(e){
                    e.preventDefault();
                    var page_id =$(this).attr("id");

                    userData();
                })


           </script> -->
            <script>

                function userData() {
                    var limit = $("#limit").val();
                    var search = $("#search").val();
                    var page = $("#page").val();


                    //console.log(limit)
                    //console.log(search)                    

                    $.ajax({
                        type: "POST",
                        url: "db.php",
                        data: {
                            limit: limit,
                            search:search,
                            page: page,

                        },
                         success: function(data) {
                              $("#response").html(data);
                             }
                     });
                 }
                 userData();

                $(document).ready(function() {
                

                });


                //multiple-delete
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
                            url:"ajax-delete.php",
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
                    userData();  
                    };
                    });
              
            </script>
        </div>

    </div>

</body>

</html>