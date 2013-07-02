<?php
   include("class/database_manager.class.php");
    $db_manager=new Database_manager;
	echo $db_manager->dbstate;
?>

<?php 
$sval=$_POST['name_tb'];
if (isset($sval) && $sval!='') {
	$sval=mysql_real_escape_string($sval);
	$query = "SELECT * FROM enc WHERE name LIKE '%".$sval."%' OR keywords LIKE '%".$sval."%'";
	$db_manager->run_search_query($query);
} else {
	echo "No value was set";
}


?>
<link rel="stylesheet" type="text/css" href="styles/search_style.css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function()
	{
		$("#name_tb").keyup(function() {
		var nval= $("#name_tb").val();
		if (nval.length()>1)
		$.ajax({
			type: "POST",
			url: "search_form.php",
			data: "name="+nval,
			success: function (option) {
			  $("#results").html(option);
			}
		});
		else
		{
			$("#results").html("");
		}
		return false;
		});
		
		$(".overlay").click(function()
		{
			$(".overlay").css('display','none');  
			$("#results").css('display','none');  
		});
		$("#keywords").focus(function() 
		{
			$(".overlay").css('display','block');  
			$("#results").css('display','block');  
		});
	});
</script>

<?php 
   
?>
<div>
	<div id="textspan">
		<span>
		Поиск
		</span>
	</div>
	<div id="inputbox">
		<input type="text" id="name_tb" name="name_tb" value="" />
	</div>
	<div id="results">
		
	</div>
	<div></div>
</div>