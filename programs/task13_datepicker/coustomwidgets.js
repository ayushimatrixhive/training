$( function() {
    // the widget definition, where "custom" is the namespace,
    // "colorize" the widget name
    alert("hello");
   $.widget( "custom.myCustomWidget", {

   // The constructor
   _create: function() {
   // alert("hello1");
        console.log(this.element);
   // this.element.datepicker();

    this.element.attr("type","date");
    }
   });
});


