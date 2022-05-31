<?php
include 'db.php';
$obj=new Makedatatable();
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $rowdelete->deleteRecord($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https:cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https:ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <!-- <script src="//code.jquery.com/jquery-1.12.4.js"></script> -->

   

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Employee details</title>
</head>
<style>
    .pagination {
        margin-left: 50%;
        padding:20px;
      
    }

    .pagination a {
        color: black;
        background-color:green;
        margin:8px;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        /* transition: background-color .3s; */
    }

    .pagination a.active:hover {
        background-color: dodgerblue;
        padding: 8px 16px;
        margin:8px;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
    .delete-btn{
      background-color:red;
      color:white;
      border:0;
      padding:4px 10px;
      border-radius:3px;
      cursor:pointer;

    }
    
</style>

<body>
    <div class="card">
       
        <div class="card-body " id="data">

            <select id="limit" class="form-select limits"  onchange="userData()" style="width: 10%;" name="limits">
            <!-- <option value="">All</option> -->
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="">All</option>

            </select>
          
            <div class="livesearch">
                <input type="text" placeholder="Search" onkeyup="userData()" class="form-control" id="search" style="width: 30%; margin-left:70%; margin-top: -36px;">
            </div>
            <br>
            <div class="deletebutton">
            <button id="delete-btn" name="delete_data" class="btn btn-danger"> Delete </button>
            </div>
            <br>
        <div class='container'>
            <table class="table table-bordered" cellpadding='10'>
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <input type='hidden' id='sort' value='ASC'>
                        <th>#</th>
                        <th onclick='userData("id")'>ID</th>
                        <th onclick='userData("fname")'>FName</th>
                        <th onclick='userData("lname")'>LName</th>
                        <th onclick='userData("dob")'>DOB</th>
                        <th onclick='userData("age")'>AGE</th>
                        <th onclick='userData("email")'>EMAIL</th>
                        <th onclick='userData("phone_no")'>PHONE_NO</th>
                        <th onclick='userData("source1")'>SOURCE1</th>
                        <th onclick='userData("campaign")'>CAMPAIGN</th>
                        <th onclick='userData("country")'>COUNTRY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="reviewpage" class="paginate">
                  <br>
                 </tbody>
            </table>
            <div class="pag-data"></div>
        </div>
            

            <script>
                function userData(columnName) {
                   // alert("aaa");
                    var limit = $("#limit").val();
                    var search = $("#search").val();
                    var sort = $("#sort").val();
                    var page_id = $(this).attr("id");

                   // console.log(sort);

                    $.ajax({
                        type: "POST",
                        url: "db.php",
                        data: {
                            limit: limit,
                            search: search,
                            columnName:columnName,
                            sort: sort,
                            page_id:page_id

                        },

                        success: function(data) {
                           // console.log(data);
                            if (sort == "ASC") {
                                $("#sort").val("DESC");
                            } else {
                                $("#sort").val("ASC");
                            }
                            $(".paginate").html(data);
                        }
                    });
                }

                $(document).ready(function() {
                    userData();    

                });

                 $(document).on("click", "#pagination a", function(e) {
                     e.preventDefault();
                    // userData();
                      var page_id = $(this).attr("id");
                      var limit = $("#limit").val();
                      var search = $("#search").val();
                      var sort = $("#sort").val();

                      $.ajax({
                          type: "POST",
                          url: "db.php",
                          data: {
                                page_id:page_id,
                                 limit:limit,
                                 search:search,
                                // columnName: columnName,
                                 sort:sort
                              
                               },
                          success: function (pagedata) {
                              $(".paginate").html(pagedata);
                          }
                      });
                    // userData(page_id);
                 });

                 //delete-data
                 $(document).on("click",".delete-btn",function(){
                        var stuId = $(this).data("id");
                        var element = this;
                       // alert(stuId);

                        $.ajax({
                            url:"db.php",
                            type:"POST",
                            data :{id:stuId },
                            success: function(data){
                                //console.log(data)
                                if(data==1){
                                    $(element).closest("tr").fadeOut();
                                }
                            }
                        });
                        userData(); 
                    });


                    // //multiple-delete
                    $("#delete-btn").on("click",function(){
                    
                    var id=[];
                     console.log(id);

                    $(":checkbox:checked").each(function(key){
                        id[key] = $(this).val();

                    });
                     console.log(id);
                    if(id.length === 0){
                        alert("PLEASE! select checkbox.");
                    } else {
                    if(confirm ("do you really want delete these records?")){
                        $.ajax({
                            url:"db.php",
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
                        userData();  
                    }   
                  
                    };
                    });

            </script>
        </div>

    </div>

</body>

</html>