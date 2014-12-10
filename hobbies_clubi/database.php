<?php
require_once("config.php");
// $con=mysql_connect("localhost","root","");
// $sel=mysql_select_db("dptv",$con);
// if(!$sel)
// {
// 	mysql_error() or die();
// }


class Mysql_db
{
private $con;public $fetch;
function __construct(){

	$this->openCon();
}
//f1
public function openCon(){

$this->con = mysql_connect(server_name , user_name , password);
if(!$this->con){
//	echo die("There is an error in connecting : ".mysql_error());
	}
else{

$db = mysql_select_db("mla",$this->con);
$this->check($db);
}
}
//f2
public function closeCon(){
if($this->con){

	mysql_close($this->con);
	unset($this->con);
}
}
//f3
public function check($var = ""){

if(!$var){//echo die("There is an error ".mysql_error());}

}
//f4
public function query($sql = ""){

$query = mysql_query($sql);
$this->fetch = mysql_fetch_array($query);

} 
//f5
public function call()
{

echo "Hii i am coming from the function";

}

}
?>

