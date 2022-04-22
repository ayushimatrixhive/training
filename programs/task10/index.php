<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <style>
     .container {
         padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
         width: 970px;
         margin-top: 50px;
     }
    .form-group {
         padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
         width: 970px;
         }
    </style>
    <body>
        <div class=" container">
            <label for="Country"> Select Country:</label>
            <select name="country" class ="form-control" id="country">
                <option value="">Select Country</option>

                <?php
                 require_once "db.php";
                    $result = mysqli_query($conn,"SELECT * FROM country ");
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row["country"];?></option>
                <?php
                }
                ?>
                
                
            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="country"> Select state:</label>
            <select name="state"  class ="form-control" id="state">
                <option value="">Select state</option>
            </select> 
        </div>

        <div class= "form-group">
            <label for="city"> Select city:</label>
            <select name="city" class ="form-control" id="city">
                <option value="">Select city</option>
              
            </select> 
        </div>
        <script>
         $(document).ready(function() {
            $('#country').on('change', function() {
            var country_id = this.value;
            $.ajax({
                    url:"country-state-city.php",
                    type: "POST",
                    data: { country_id: country_id },
                    success: function(result){
                    $("#state").html(result);
                    $('#city').html('<option value="">Select State First</option>'); 
                    }
                  });
             });    
            $('#state').on('change', function() {
            var state_id = this.value;
            $.ajax({
                     url:"country-state-city.php",
                     type: "POST",
                     data: {state_id: state_id },
                     success: function(result){
                     $("#city").html(result);
                    }
                  });
              });
            });
         </script>


    </body>


</html>
