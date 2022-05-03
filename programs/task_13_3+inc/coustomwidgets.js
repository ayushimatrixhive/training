$(function () {
    $.widget("custom.myCustomWidget", {
       options: {
          myvalue: 0
       },
       _create: function () {
            console.log (this.element.parent().attr('class'))
          //console.log (typeof this.element.parent().attr('id') == 'undefined')
          // console.log (this.element.attr('class'))
          // console.log (this.element.attr('id'))
          var parentBlock = (this.element.parent().attr('class') || ''),
          parentBlock1 = (this.element.attr('class') || ''),
          parentBlock2 = (this.element.parent().attr('class') || ''),
          newData = parentBlock,parentBlock1,parentBlock2
         // console.log("parentBlock")
         // alert(newData);
          this.element.parent().append('<br><span data-myCustomWidget-class="'+newData+'" style ="position:absolute" class="inc">' +
          '<button type="button" class="decrement btn btn-primary">-</button>' +
             '<span class="counting" id= "result">0</span>' +
          '<button type="button" class="increment btn btn-primary" value = "+">+</button>' +
             '</span>' )   
             var newValue = this.element.parent(newData);
           //  console.log(this.element.parent(newData))
             $(".increment").click(function () {  
                var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);
             //   console.log(($(this).parent(".inc").find(".counting")[0].innerHTML))
                value++;
                $(this).parent(".inc").find(".counting")[0].innerHTML = value;
                $(this).parent(".inc").prevAll("input").val(value);
              //   console.log( $(this).parent(".inc").prevAll("input").val(value))
                 if (typeof($(this).find(".counting")[0]) !== 'undefined') {
                  $(this).find(".counting")[0].val(value);
                }
             //   console.log($(this).find(".counting")[0])          
             });
             $(".decrement").click(function () {
                var value = ($(this).parent(".inc").find(".counting")[0].innerHTML);
                value--;
                $(this).parent(".inc").find(".counting")[0].innerHTML = value;
                $(this).parent(".inc").prevAll("input").val(value);
                if (typeof($(this).find(".counting")[0]) !== 'undefined') {
                    $(this).find(".counting")[0].val(value);
              }
        });
      }
    });
 });