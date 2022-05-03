$(function () {
    $.widget("custom.myCustomWidget", {
       _create: function () {
           console.log (this.element.parent().attr('class'))
          // console.log (this.element.attr('class'))
          // console.log (this.element.attr('id'))
           console.log("parentBlock")
           var parentBlock = this.element.parent().attr('class');
         
           this.element.parent().append('<br><span style ="position:absolute" class="inc">' +
          '<button type="button" class="'+parentBlock+'decrement btn btn-primary">-</button>' +
             '<span class="counting">0</span>' +
          '<button type="button" class="'+parentBlock+'increment btn btn-primary" value = "+">+</button>' +
             '</span>'   )
            //  $("input").focus(function(){
            //     $("span.inc").css("display", "");
            //   });

             var value = 0;

             $("."+parentBlock+"increment").live("click", function () {
                var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);
                value++;
                $(this).parent(".inc").find(".counting")[0].innerHTML = value;
                $(this).parent(".inc").prevAll("input").first().val(value);
                console.log($(this).parent(".inc").prevAll("input").val(value))
    
             });

             $("."+parentBlock+"decrement").live("click", function () {
                var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);
                value--;
                $(this).parent(".inc").find(".counting")[0].innerHTML = value;
                $(this).parent(".inc").prevAll("input").val(value);
                console.log($(this).parent(".inc").prevAll("input").val(value))
             });
         }
    });
 });