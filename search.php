<?php
   include("class/database_manager.class.php");
    $db_manager=new Database_manager;
	
	echo $db_manager->dbstate;
?>

<?php 

if (isset($_POST['kw']) && $_POST['kw'] != '') {
	$sval=$_POST['kw'];
	
	$db_manager->run_search_query($sval);
	
	echo $sval;
} else {
	echo "No value was set";
}


?>