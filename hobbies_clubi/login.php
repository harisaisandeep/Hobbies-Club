<?php
	if(isset($_POST['submit']))
	{
		if(($_POST['usname'] =='admin') && ($_POST['password'] =='san'))
		{
		setcookie("admin" , "san" , time()+3600);
		session_start();
		$_SESSION['value'] = 1;
header("Location: hc_admin.php");
		}
		else {
			echo " OOPS...!!!! The password you entered is Wrong .Please try again..!!!";
			
		}
	}
?>
<html>
<body>
	<div style = "position:absolute;float:center; top:45%; ">
<form action="login.php" method = "post">
<input type = "text" name = "usname" placeholder = "username "/><br/>
<input type = "password" name = "password" placeholder = "password"/><br/>
<input type = "submit" name = "submit" value ="login"/>

</form>
</div>
</body>
</html>

