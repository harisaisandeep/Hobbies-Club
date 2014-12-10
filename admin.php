<?php 
require_once("include.php");

$usname = $_POST['usname'];
$pwd = $_POST['password'];
if($usname == 'admin' && $pwd == 'admin')
{
session_start();
$_SESSION['user'] = 1;setcookie("users",$_SESSION['user'], time()+3600);

echo $_SESSION['user']."hii".$_COOKIE['users'];

}

else{

    echo "The username doesnot exist .please login again";
}


$e = $_POST['event'];
$p = $_POST['path'];
if(isset($_POST['submit']))
{
$folder = new gallery($e);
$folder->crdir($e,$p);
}

if(isset($_POST['fileSubmit'])){

$pathf = $_POST['path'];
$fname = $_POST['file'];
$files = new gallery();
$files->uploadFile($fname,$pathf);
}
i
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link  type="image/x-icon" rel="shortcut icon" href="images/faviconhc.ico" />
<link rel="stylesheet" href="new.css">

<title>Hobbies Club</title>
<!--<link href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>-->
<!--css links -->
<link rel="stylesheet" href="hobbies.css">
<link rel="stylesheet" href="new.css">
<!-- ends -->
 <!-- java scripts -->

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

</head>
<!-- <div id = "login">
<form action = "admin.php" method = "post">
Username : <input type = "text" name = "usname" placeholder="username"/><br/>
Password : <input type = "pwd" name = "pwd" placeholder="password"/><br/>
<span style = "float : center"><input type = "submit" name = "submit" value = "Login "/></span>
</form>
 -->
</div>
<body>
    <div id="heads"><img src="images/hc1.png" style="position :absolute; top:50px;left:34%;"/>
        <div class="consistent">
                        <a  target="_blank" href="http://172.23.14.210/">DPTV </a>
                        <a target="_blank" href="http://172.23.14.210/Indepth%20portal/">MAPC</a>
                        <a target="_blank" href="http://172.23.14.210/mess_index.php">MESS</a>
                        <a target="_blank" href="http://172.23.14.200/">LIBRARY</a>
            </div>
        <div>
        <ul class="nav">
            <li><a  href="index.php" id="home" class="anchorLink">Hobbies club</a></li>
            <li><a id="webd" href="webd.php" class="anchorLink">Web D</a></li>
            <li><a id="photo" href="photography.php" class="anchorLink">Photography </a></li>
            <li><a id="spon" href="fine_arts.php"class="anchorLink">Fine Arts</a></li>
            <li><a id="team" href="literary.php"class="anchorLink">Literary</a></li>
            <li><a id="team" href="electronics.php" class="anchorLink">Electronics</a></li>
            <li><a id="contact" href="contact.php" class="anchorLink">Contact Us</a></li>
        </ul>
    </div>
</div>
<div style="width:100%;background-color:#F1CB00;height:5px;position:absolute; top:200px;"></div>    

<div>
<div id="details">
<div class="mini" style="background-color:#000; color:#fff;text-align:center;">EVENTS</div>
<?php
$select = mysql_query("SELECT * FROM folder WHERE path = 'gallery'");
while ($row = mysql_fetch_array($select)) {

echo "<a href ='admin.php?path=".$row['path']."/".$row['folderName']."'><div class='mini' id='about'>".$row['folderName']."</div></a>";
 //echo " <a href="gallery.php?path=".$row['path']."/".$row['folderName']."><div class='mini' id='about'>".$row['folderName']."</div></a>";
}

    ?>

    </div>
<div id="mainContent">
<div class="mainContent" >
<!--start code here --> 

<?php
echo "<p style='margin-left:10px;color: #222;font-size: 26px;font-weight: 400;'>".$_GET['path']."<hr class ='line'</div></p><span style = 'font-size:24px; text-decoration:underline;'>Sub Items</span>";
if(isset($_GET['path']))
{
$dir = mysql_query("SELECT * FROM folder WHERE path='$_GET[path]'");
if($_GET['path'] != "gallery"){
    echo "<ul>";
    while($folderArray = mysql_fetch_array($dir))
    {
        echo "<li><a href='?path=".$_GET['path']."/".$folderArray['folderName']."'>".$folderArray['folderName']."</a></li>";
    }
    echo "</ul>";
    

    $file = mysql_query("SELECT * FROM events WHERE filePath='$_GET[path]'");
    if($file != NULL)
    {
    echo "<ul>";
    while($fileArray = mysql_fetch_array($file))
    {
        echo "<li><a href='?file=".$fileArray['fileName']."&extension=".$fileArray['fileExtension']."'>".$fileArray['fileName'].".".$fileArray['fileExtension']."</a></li>";
    }
    echo "</ul>";
    }
    $_SESSION['path'] = $_GET['path'];


}
}
?><hr class = "line">

<div class = "left">
<form method ="post" action ="admin.php<?php 
if($_GET['path']!="") {echo "?path=".$_GET['path'];}
else{ $_GET['path'] = "gallery"; echo "?path=gallery"; }?>">
    <input  type = "hidden" name ="path" value = "<?php echo $_GET['path'];?>"/> 
<input  type = "text" name = "event" placeholder = "Event name"/>&nbsp;<button type = "submit" name = "submit" >Create Event</button>

<?php


if($_GET['path'] != "gallery")
{
?>
<form action="?path=<?php echo $_GET['path']; ?>" method="post" enctype="multipart/form-data">
<legend>Upload File</legend>
Filename: <input type="file" name="file" id="file" />
<input type="hidden" name="path" value="<?php echo $_GET['path']; ?>" />
<input type="submit" name="fileSubmit" value="Upload File" />
</form>
<?php

}
?>
</form>
</div>




</div></div>
<div id="foot">
<div  style="float:left;"class="fb-like" data-href="https://www.facebook.com/groups/113178788783859/" data-send="true" data-layout="button_count" data-width="250" data-show-faces="false"></div>
<p style = "font-size:13px;">&copy;2012 Web-designing club, IIT ROORKEE<span style="position:absolute; right:50px; font-size:16px"><sup>Follow Us</sup>
                <a href="https://www.facebook.com/groups/113178788783859/" target="_blank"><img src="images/fb.png" height="20"/></a> </span>
                </p>

</div><!-- foot -->
</body>

</html>