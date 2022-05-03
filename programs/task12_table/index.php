<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script src=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"></script>
    </head>
<style>

    .abc{
        background-color: rgb(224, 222, 221);
        color: black;
        border: 1px solid black;
        margin: 20px;
        padding: 20px;
        text-align:center;
        font-size: large;
        height:30%;
    }
    table
     {
        border-collapse:collapse;
        margin-right:50;
     }
    table, td, th
     {
        border:1px solid black;
     }
    .xyz {
            height: 400px;
            overflow-y: auto;
            width: 220px;
            float:left;
         }
    #table1 {
            margin-right: 80px;
         }
    .child tr { cursor: pointer; }

    .selectedRow,
    .child tr:active {
            background-color: #E7E7E7;
            cursor: move;
         }

</style>
<body>
    <div class=abc>
         <div id="table1" class="xyz">
             <table id="table1" class="child">
                                <tr class="dragg">                               
                                    <td>Item 1</td>                                             
                                </tr>
                                <tr class="dragg">                              
                                    <td>Item 2</td>                                                                              
                                </tr>       
                                <tr class="dragg">                                 
                                    <td>Item 3</td>                                                                              
                                </tr>  
                                <tr class="dragg">                               
                                    <td>Item 4</td>                                                                              
                                </tr>  
                                <tr class="dragg">                              
                                    <td>Item 5</td>                                                                              
                                </tr>                              
              </table>
         </div>
						
         <div id="table2" class="xyz">
						<table id="table2" class="child">
                                <tr class="dragg">                                
                                    <td>Item 6</td>                                             
                                </tr>
                                <tr class="dragg">                                  
                                    <td>Item 7</td>                                                                              
                                </tr>       
                                <tr class="dragg">
                                     <td>Item 8</td>                                                                              
                                </tr>  
                                <tr class="dragg">                             
                                    <td>Item 9</td>                                                                              
                                </tr>  
                                <tr class="dragg">  
                                    <td>Item 10</td>                                                                              
                                </tr> 
                        </table>
                 </div>

               
             <script>
                $("#table1 .child tr, #table2 .child tr").draggable({
                helper: function(){

                var select = $('.child tr.selectedRow');
                if (select.length === 0) {
                    select = $(this).addClass('selectedRow');
                }
                var contain = $('<div>').attr('id', 'item');
                contain.append(select.clone().removeClass("selectedRow"));
                return contain;
                }
                });
               
                $("#table1.child, #table2.child").droppable({
                drop: function (event, ui) {

                $(this).append(ui.helper.children());
                $('.selectedRow').remove();
                }
                });

                $(document).live("click", ".child tr", function () {
                $(this).toggleClass('selectedRow');
                });
             </script>
</body>
</html>
