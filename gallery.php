<?php 
$conn = mysql_connect("localhost" , "root" , "sql_sre!");
if(!$conn){

    die("there is an error in connecting to database".mysql_error());
}
$db = mysql_select_db("events" , $conn);

$r = $_GET['path'];
/*echo $r."is got";*/
?>
<!DOCTYPE HTML >
<html>
<head>
<link  type="image/x-icon" rel="shortcut icon" href="images/faviconhc.ico" />
<title>Hobbies Club</title>
<!--<link href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>-->
<!--css links -->
<link rel="stylesheet" href="hobbies.css">
<link rel="stylesheet" href="css/jquery.fancybox-buttons.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="new.css">
<style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>
<!-- ends -->
 <!-- java scripts -->

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>

<script type="text/javascript" src="js/functions.js"></script>

</head>

<body>
    <div id="heads"><img src="images/hc1.png" style="position :absolute; top:50px;left:34%;"/>
        <div class="consistent">
                        <a  target="_blank" href="http://172.23.14.210/">DPTV </a>
                        <a target="_blank" href="http://172.23.14.210/Indepth%20portal/">MAPC</a>
                        <a target="_blank" href="http://172.23.14.210/mess_index.php">MESS</a>
                        <a target="_blank" href="http://172.23.14.200/">LIBRARY</a>
                        <a target="_blank" href="admin.php">ADMIN</a>
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
<div id="details" style='overflow:auto;overflow-x:hidden;'>
    <div class="mini" style="background-color:#000; color:#fff;text-align:center;">ALBUMS</div>
   <?php
$select = mysql_query("SELECT * FROM folder WHERE path = 'gallery'");
while ($row = mysql_fetch_array($select)) {

echo "<a href ='gallery.php?path=".$row['path']."/".$row['folderName']."'><div class='mini'"."id='about'>".$row['folderName']."</div></a>";
 //echo " <a href="gallery.php?path=".$row['path']."/".$row['folderName']."><div class='mini' id='about'>".$row['folderName']."</div></a>";
}

    ?>



    </div>
<div id="mainContent">
<div class="mainContent" id="aboutd"> 
<span style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">Gallery</span><span style='float:right;position:relative;'><a href = "gallery.php">Back</a></span><hr class ="line">
<?php
echo "<p style='margin-left:10px;color: #222;font-size: 16px;'>".$_GET['path']."</p>";
if(isset($_GET['path']))
{
$dir = mysql_query("SELECT * FROM folder WHERE path='$_GET[path]'");
if($_GET['path'] != "gallery"){
    echo "<div id = 'folder'><div class='mini' style='background-color:#000; color:#fff;text-align:center;'>Sub Folders</div>";
    while($folderArray = mysql_fetch_array($dir))
    {
     
        echo "<a href='?path=".$_GET['path']."/".$folderArray['folderName']."'><div class='mini' id='about'>".$folderArray['folderName']."</div></a>";
    }
    echo "</div>";
    

    // $file = mysql_query("SELECT * FROM events WHERE filePath='$_GET[path]'");
    // if($file != NULL)
    // {
    // echo "<ul>";
    // while($fileArray = mysql_fetch_array($file))
    // {
    //     echo "<li><a href='?file=".$fileArray['fileName']."&extension=".$fileArray['fileExtension']."'>".$fileArray['fileName'].".".$fileArray['fileExtension']."</a></li>";
    // }
    // echo "</ul>";
    // }
    $_SESSION['path'] = $_GET['path'];


}
}
?>
<?php
if($_GET['path'] !="")
{

?>
<div id = "box">


<?php
$img = mysql_query("SELECT * FROM events WHERE filePath = '$_GET[path]'");
    while($imgs = mysql_fetch_array($img)){
echo "<p id = 'images'>
        <a class='fancybox-buttons'  data-fancybox-group='button' href='".$imgs['filePath']."/".$imgs['fileName'].".".$imgs['fileExtension']."'>
        <img width = '150px' height='150px' src='".$imgs['filePath']."/".$imgs['fileName'].".".$imgs['fileExtension']."' alt='' /></a><br/>
    <span>".$imgs['title']."</span></p>"; 
}



?>
</div>
<?php
}
else
{

echo "
<div style='position:relative; top:40%; left:10%; font-size:36px; color:#CCC;'>SELECT THE ALBUMS YOU WISH TO SEE</div>
 ";


}

?>


</div>
</div>

<div id="foot">
<div  style="float:left;"class="fb-like" data-href="https://www.facebook.com/groups/113178788783859/" data-send="true" data-layout="button_count" data-width="250" data-show-faces="false"></div>
<p style = "font-size:13px;">&copy;2012 Web-designing club, IIT ROORKEE<span style="position:absolute; right:50px; font-size:16px"><sup>Follow Us</sup>
                <a href="https://www.facebook.com/groups/113178788783859/" target="_blank"><img src="images/fb.png" height="20"/></a> </span>
                </p>

</div><!-- foot -->
<?php

$desc=mysql_query("SELECT * FROM notices");

while($check=mysql_fetch_array($desc))
{
$user=$check['signatureKey'];
$person=mysql_query("SELECT * FROM signupug Where userKey='$user'");
$secy=mysql_fetch_array($person);
?><div id="<?php echo $check['id'];?>" class="reveal-modal">
<h2 style="color:#D50000;"><?php echo $check['heading'];?></h2>
<hr><br/>
<?php echo $check['text'];?>
<br/>
Thanks,<br/>
<?php echo $secy['fname']." ".$secy['lname'];?><br/>
(<?php echo $check['designation'];?>)
<hr><br/>
<p style="position:absolute;right:50px; font-size:9px;">uploaded on : <?php $output = date('Y-m-d', strtotime($check['date'])); echo $output ;?></p><wbr>
<p style="position:absolute;right:50px; font-size:9px;">Valid upto : <?php  $x=date('Y-m-d', strtotime($check['expiry']));echo $x;?></p>
            <a class="close-reveal-modal">&#215;</a>    
        </div>
  <?php 
  
}
     ?> 
</body>
</script>
</html>