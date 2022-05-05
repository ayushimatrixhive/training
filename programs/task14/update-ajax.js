var editData = function(id){
    $('#table-container').load('update.php')
     $.ajax({
         type: "GET",
         url: "update.php",
         data:{editId:id},
         dataType: "html",
         success: function(data){
           var userData=JSON.parse(data);
           $("input[name='id']").val(userData.id);
           $("input[name='fname']").val(userData.fname);
           $("input[name='lname']").val(userData.lname);
           $("input[name='phone_no']").val(userData.phone_no);
           $("input[name='email']").val(userData.email);
           $("input[name='dob']").val(userData.dob);
           $("input[name='age']").val(userData.age);
           $("input[name='country']").val(userData.country);
           $("input[name='source1']").val(userData.source1);
           $("input[name='campaign']").val(userData.campaign);
         }
     });
 };
 $(document).on('submit','#updateForm',function(e){
         e.preventDefault();
          var id= $("input[name='id']").val();
          var fname= $("input[name='fname']").val();
          var lname= $("input[name='lname']").val();
          var email= $("input[name='email']").val();
          var dob= $("input[name='dob']").val();
          var phone_no= $("input[name='phone_no']").val();
          var age= $("input[name='age']").val();
          var country= $("input[name='country']").val();
          var source1= $("input[name='source1']").val();
          var campaign= $("input[name='campaign']").val();
         $.ajax({
         method:"POST",
         url: "update.php",
         data:{
           updateId:id,
           fname:fname,
           lname:lname,
           email:email,
           phone_no:phone_no,
           dob:dob,
           age:age,
           country:country,
           source1:source1,
           campaign:campaign
         },
         success: function(data){
         $('#table-container').load('viewpg.php');
         $('#msg').html(data);
     }});
 });