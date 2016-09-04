<?php
if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
}
?>
<img id="refresh" src="refresh.svg" width="50"/>
<script>
$("document").ready(function(){
    $("#refresh").click(function(){
        $("#posts").empty();
        $.ajax({
          url: "getMsgs.php",
          context: document.body
          }).done(function(data) {
              $("#posts").append(data);
          });
    });
}
);
</script>
<?php
require("getMsgs.php");
?>