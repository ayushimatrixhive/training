<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
  $("p").hide();
 });
$("#show").click(function(){
  $("p").show();
  });
});
</script>
</head>
<body>

<p>You can show and hide me with this buttons.</p>

<button id="hide">Hide the text above</button>
<button id="show">Show the text above</button>

</body>
</html>