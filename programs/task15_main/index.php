<?php
include 'db.php';
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
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
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
          
            <div class="livesearch" >
                <input type="text" placeholder="Search" onkeyup="userData()" class="form-control" id="search" style="width: 30%; margin-left:70%; margin-top: -36px;">
            </div>
            <br>
            <div class="deletebutton">
            <button id="delete-btn" name="delete_data" class="btn btn-danger"> Delete </button>
            </div>
            <br>
        <div class='container' >
            <table class="table table-bordered" cellpadding='10'>
                <thead class="bg-primary text-white text-center">
                    <tr> 
                        <input type='hidden' id='sort_column' value='id'>
                        <input type='hidden' id='page' value='1'>
                        <input type='hidden' id='sort' value='ASC'>
                        <th>#</th>
                        <th class="column_sort" data-order="" data-id="id" >ID </i></th>
                        <th class="column_sort" data-order="" data-id="fname">FNAME</th>
                        <th class="column_sort" data-order="" data-id="lname">LNAME</th>
                        <th class="column_sort" data-order="" data-id="dob">DOB</th>
                        <th class="column_sort" data-order="" data-id="age">AGE</th>
                        <th class="column_sort" data-order="" data-id="email">EMAIL</th>
                        <th class="column_sort" data-order="" data-id="phone_no">PHONE_NO</th>
                        <th class="column_sort" data-order="" data-id="source1">SOURCE1</th>
                        <th class="column_sort" data-order="" data-id="campaign">CAMPAIGN</th>
                        <th class="column_sort" data-order="" data-id="country">COUNTRY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="reviewpage" class="paginate">
                  <br>
                 </tbody>
            </table>
            <div class="pag-data"></div>

            <div id="error-message"></div>
        <div id="success-message"></div>
        </div>
            

        <script>
                function userData(page=1,data_name,data_dir) {
                   // alert("page");
                    var limit = $("#limit").val();
                    var search = $("#search").val();
                    var sort = $("#sort").val();
                   //  console.log(search);
                   // console.log(sort);
                   //console.log(data_name);

                    $.ajax({
                        type: "POST",
                        url: "db.php",
                        data: {
                            limit: limit,
                            search: search,
                            sort: sort,
                            page_id:page,
                            data_name: data_name,
                            data_dir: data_dir
                        },

                        success: function(data) {
                            $("#reviewpage").html(data);
                        }
                    });
                }
                 
                function pagination (page=1){
                    var data_name = $("#sort_column").val();
                  // console.log($("#sort_column").val());
                    var data_dir = $("#sort").val();
                  // console.log($("#sort").val());
                    $("#page").attr("value", page);
                   // console.log( $("#page").attr("value", page))

                    userData(page, data_name, data_dir);
                }


                $(document).ready(function() {
                    userData();    


                    $(".column_sort").click(function(e) {
                        //alert();
                        var data_name = $(this).attr("data-id");
                       // console.log($(this).attr("data-id"));
                        var data_dir = $(this).attr("data-order");
                       // console.log($(this).attr("data-order"));
                        var page = $("#page").val();
                       // console.log($("#page").val());
                       
                        $("#sort_column").attr("value", data_name);
                        //console.log($("#sort_column").attr("value", data_name));

                        if (data_dir == "ASC" || data_dir == "" ) {
                            $(".column_sort").attr("data-order", "DESC");
                         //   console.log( $(".column_sort").attr("data-order", "DESC"));
                            $("#sort").attr("value", "ASC");
                             //arrow = '<span class="glyphicon glyphicon-arrow-down"></span>';  
                        } else {
                            $(".column_sort").attr("data-order", "ASC");
                            $("#sort").attr("value", "DESC");
                            // arrow = '<span class="glyphicon glyphicon-arrow-up"></span>';  

                        }
                        userData(page, data_name, data_dir);

                    });

                });

                    //delete data
                    $(document).on("click",".delete-btn",function(){
                        var stuId = $(this).data("id");
                       // console.log(stuId);
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
                            url:"db.php",
                            type:"POST",
                            data : {id :id},
                            success: function(data){
                           // console.log(data);
                            if(data == true){
                                $("#error-message").slideUp();
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