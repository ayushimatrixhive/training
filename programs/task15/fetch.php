<?php

class Connect
{

    private $servarname = "localhost";
    private $username = "root1";
    private $password = "root1";
    private $database = "participant";


    public function __construct()
    {

        $this->conn = mysqli_connect($this->servarname, $this->username, $this->password, $this->database);

        if ($this->conn) {
            echo "Connected";
        } else {
            echo "Sorry not connected";
        }
    }
    public function enterdatavalue()
    {

        if (isset($_POST['submit_value'])) {
            $id = $_POST['id'];
           // echo $id;
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone_no'];
            $source1 = $_POST['source1'];
            $campaign = $_POST['campaign'];
            $country = $_POST['country'];
            $mysql_query = mysqli_query($this->conn, 
            "UPDATE person_data 
             set fname = '$fname',
                 lname= '$lname',
                 dob='$dob',
                 age = '$age',
                 email = '$email',
                 phone_no = '$phone_no',
                 source1= '$source1',
                 campaign = '$campaign', 
                 country = '$country'
                  WHERE id = '$id' limit 0,5");
        
          //  print_r($mysql_query);
        if ($mysql_query == true) {
            header("Location:view.php");
        } else {
            echo "Data can't be updated";
        }
        }
        }


// <!-- <script>    
//    var table ='#mytable'
//    $('#maxRows').on('change',function(){
//      $('.pagination').html()
//      var trnum=0
//      var maxRows = parseInt($(this).val())
//      var totalRows= $(table+'tbody tr').length
//      $(table+'tr:gt(0)').each(function(){
//        trnum++
//        if(trnum>maxRaws){
//          $(this).hide()

//        }
//        if(trnum<+ maxRaws){
//          $(this).show()

//        }
//      })
//      if(totalRows > maxRows){
//        var pagenum = Math.ceil(totalRows/maxRows)
//        for (var i=1;i<=pagenum;){
//          $('.pagination').append('<li data-page="'+i+'">\<span>'+i++ +'<span class="sr-only">(current)</span><span>\</li>').show()
//        }
//      }
//      $('.pagination li:first-child').addClass('active')
//      $('.pagination li').on('click',function(){
//        var pageNum=$(this).attr('data-page')
//        var trIndex=0;
//        $('.pagination li').removeClass('active')
       
//      })
//    })
    
//     </script>
//  -->

?>
