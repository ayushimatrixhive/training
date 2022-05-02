$( function() {
 $.widget( "custom.myCustomWidget", {
   _create: function() {


       $("#b1").click(function(e) {
        $("#btn1").show();
         e.stopPropagation();
       //  console.log(e.stopPropagation);
        })
        //console.log(document);
        $(document).click(function(e) {
        $("#btn1").hide();
        });
        $("#b2").click(function(e) {
        $("#btn2").show();
        e.stopPropagation();
        })
        $(document).click(function(e) {
        $("#btn2").hide();
        });
        $("#b3").click(function(e) {
        $("#btn3").show();
        e.stopPropagation();
        })
        $(document).click(function(e) {
        $("#btn3").hide();
        }); 
       
    $(document).ready(function(){
        $(".increment").on("click", function(){
             var value = ($(this).parent(".clonedInput").find(".counting")[0].innerHTML);
             console.log($(this).parent(".clonedInput").find(".counting")[0].innerHTML)
             value++;
             $(this).parent(".clonedInput").find(".counting")[0].innerHTML = value;

            console.log($(this).parent(".clonedInput").prevAll("input").first().val(value))
             $(this).parent(".clonedInput").prevAll("input").first().val(value);
       
           //   $(".btn_add1").val(value);
        })
        $(".decrement").on("click", function(){
             var value = ($(this).parent(".clonedInput").find(".counting")[0].innerHTML);
             console.log($(this).parent(".clonedInput").find(".counting")[0].innerHTML)
             value--;
             $(this).parent(".clonedInput").find(".counting")[0].innerHTML = value;

             console.log($(this).parent(".clonedInput").prevAll("input").first().val(value))
             $(this).parent(".clonedInput").prevAll("input").first().val(value);
            //  $(".btn_add").val(value);
        })
      })
    }
   });
});