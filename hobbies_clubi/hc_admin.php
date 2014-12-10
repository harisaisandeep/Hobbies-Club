<?php
	if($_COOKIE["admin"] == "san"){
		require_once("admin.php");
	}
	else{
		echo "Please login to continue <a href='login.php'>here</a>";
		
	}
	
?>