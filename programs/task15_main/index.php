<?php
include 'db.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $deleteId = $_GET['id'];
    $rowobj->deleteRecord($id);
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
            <!-- <button type="button" type="submit"  id="deletebtn" value="delete" class="btn btn-primary btn-sm delete"  data-id="<?=$row['id'];?>">Delete</button>  </div> -->
            <button id="delete-btn" name="delete_data" class="btn btn-danger"> Delete </button>
            </div>
            <br>
            

            <table class="table table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>#<p><select  onchange="userData()" id="sorting">
                        <option value="">Sorting Data</option>
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option></select></p></th>
                        <th>Id</th>
                        <th>F Name</th>
                        <th>L Name</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>phone_no</th>
                        <th>Source1</th>
                        <th>Campign</th>
                        <th>Country</th>
                       
                    </tr>
                </thead>
                <tbody id="reviewpage" class="paginate">
                  <br>

                </tbody>

                <!-- <div class="table-responsive" id="employee_table">
                    <table class = "table table-bordered">
                        <tr>
                            <th> <a class="coloumn_sort" id="id" data-order="desc" href="#">ID</a></th>
                            <th> <a class="coloumn_sort" id="fname" data-order="desc" href="#">Fname</a></th>
                            <th> <a class="coloumn_sort" id="lname" data-order="desc" href="#">Lname</a></th>
                            <th> <a class="coloumn_sort" id="dob" data-order="desc" href="#">DOB</a></th>
                            <th> <a class="coloumn_sort" id="age" data-order="desc" href="#">AGE</a></th>
                            <th> <a class="coloumn_sort" id="phone_no" data-order="desc" href="#">PHONE_NO</a></th>
                            <th> <a class="coloumn_sort" id="source1" data-order="desc" href="#">SOURCE1</a></th>
                            <th> <a class="coloumn_sort" id="campaign" data-order="desc" href="#">CAMPAIGN</a></th>
                            <th> <a class="coloumn_sort" id="country" data-order="desc" href="#">COUNTRY</a></th>

                        </tr> -->

            </table>
           
            

            <script>
                function userData(page) {
                   // alert("aaa");
                    var limit = $("#limit").val();
                    var search = $("#search").val();
                    var sort = $("#sorting").val();
                    console.log(sort);

                    $.ajax({
                        type: "POST",
                        url: "db.php",
                        data: {
                            limit: limit,
                            search: search,
                            sort:sort,
                            data: {
                                page: page,
                            }

                        },

                        success: function(data) {
                            $("#reviewpage").html(data);
                        }
                    });
                }

                $(document).ready(function() {
                    userData();    

                });

                $(document).on("click", "#pagination a", function(e) {
                    e.preventDefault();
                    var page_id = $(this).attr("id");
                    var limit = $("#limit").val();
                    var search = $("#search").val();
                    

                    $.ajax({
                        type: "POST",
                        url: "db.php",
                        data: {page_id:page_id,
                               limit:limit,
                               search:search,
                             },
                        success: function (pagedata) {
                            $(".paginate").html(pagedata);
                        }
                    });
                    //userData(page_id);

                })
            

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