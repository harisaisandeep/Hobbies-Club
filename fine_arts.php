<?php 
require_once("database.php");
$database = new Mysql_db();

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
<link rel="stylesheet" href="new.css">
<!-- ends -->
 <!-- java scripts -->

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

<!--ends-->
</head>

<body>
    <div id="heads"><img src="images/hc1.png" style="position :absolute; top:50px;left:34%;"/>
        <div class="consistent">
                        <a  target="_blank" href="http://172.23.14.210/">DPTV </a>
                        <a target="_blank" href="http://172.23.14.210/Indepth%20portal/">MAPC</a>
                        <a target="_blank" href="http://172.23.14.210/mess_index.php">MESS</a>
                        <a target="_blank" href="http://172.23.14.200/">LIBRARY</a>
            </div>
        <div>
        <ul class="nav"><li ><a  href="index.php" id="home" class="anchorLink">Hobbies club</a></li><li><a id="webd" class="anchorLink" href="webd.php">Web D</a></li>
            <li><a id="photo" class="anchorLink" href="photography.php">Photography </a></li>
            <li class = "active"><a id="spon" href="fine_arts.php" class="anchorLink">Fine Arts</a></li>
            <li><a id="team" class="anchorLink" href="literary.php">Literary</a></li>
            <li><a id="team" class="anchorLink"  href="electronics.php">Electronics</a></li>
            <li><a id="contact" class="anchorLink" href="contact.php">Contact Us</a></li>
        </ul>
    </div>
</div>
<div style="width:100%;background-color:#F1CB00;height:5px;position:absolute; top:200px;"></div>    
    

<div>
<div id="details">
<a href="#"><div class="mini" id="about">ABOUT</div></a>
<a href="#"><div class="mini" id="activity">ACTIVITY</div></a>
<a href="#"><div class="mini" id="members">MEMBERS</div></a>
<a href="#"><div class="mini" id="events">EVENTS</div></a>
<a href = "gallery.php"><div class="mini">GALLERY</div></a>
<div class="mini" style="background-color:#000; color:#fff;text-align:center;">Latest Online</div>
<div><!--news display-->
         <ul id="ticker">
            <?php
            
            $see=mysql_query("SELECT * FROM notices WHERE designation LIKE '%Secretary'");
            while($row=mysql_fetch_array($see))
            {
                 $id=$row['id'];
            $dat=date('20y-m-d H:i:s');
            $new=strtotime ('-40 week' , strtotime($dat));
            $newdate=date('20y-m-d H:i:s' , $new);
            $expire=$row['date'];
            $today_time = strtotime($newdate);
            $expire_time = strtotime($expire);
            if ($expire_time > $today_time)
                {
                ?> 
                
                <li><a href="#" class="big-link" data-reveal-id="<?php echo $row['id'];?>"> <?php echo $row['heading'];?> </a> </li>
                
                <?php
            }
            
            }
            ?>
        </ul>
    </div><!--news display-->
    </div>
<div id="mainContent">
<div class="mainContent" id="aboutd"> 
<p style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">About Fine Arts Club</p><hr class ="line"><p class="para">
With the expansion & increasing sophistication of human brain, the need to express the creative feelings making waves in his brain became urgent. 
This urge led to the birth of art and the aesthetic sense in human life. Artistic images reflect & embody the finest of human feelings ,
 the dreams & ideals.The inner ripples of the heart is captured by the sketch & the words of the artist, who cunningly enough, 
 knows your personal feelings towards someone and crystallizes it in the form of few lines,
 hence helping us to present the entangled thoughts & feelings in an integral and clear form.
 Fine Arts Section is a place where all the students can flaunt their artistic skills. 
 This section helps you to master that hidden cunning artist in you. Here you get all facilities in painting and sculpture besides handicrafts.</p>


<p style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">Our Mission</p><hr class ="line">
<!--content here-->

<p style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">Contact Info</p><hr class ="line">
<p class ="para">Secretary : </p>
<p class ="para">email id : </p>
<p class ="para">Contact No : </p>

</div>
<div class="mainContent"  id="activityd"> 

<p style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">Recent Activity</p><hr class ="line">
<?php 
                    
                    
                    $note=mysql_query("SELECT * FROM notices WHERE designation ='Fine Arts Club Secretary'");
                        while($club=mysql_fetch_array($note))
                        {    
                        $dat=date('20y-m-d H:i:s');
                        $expire=$club['expiry'];
                        $today_time = strtotime($dat);
                    $expire_time = strtotime($expire);
                    
                    if ($expire_time < $today_time)
                    {
                    ?>
                                <div id = "eventz"><a href="#" class="big-link" data-reveal-id="<?php echo $club['id']?>"> <?php echo "<sub><img id = 'plus' src='images/bg/single.png'/></sub> ".$club['heading'];?></a>
                                    <div id="hdate"><?php echo date('d M ,Y', strtotime($club['expiry']));?></div>
                           </div>
                    <?php
                    }
                    else{
                ?><div style="position:relative; top:40%; left:40%; font-size:48px; color:#CCC;">NO EVENTS</div><?php
                        break;
                    }
                        }
                    ?>
</div>
<div class="mainContent"   id="membersd">
<p style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">Members Info</p><hr class ="line">
</div>
<div class="mainContent"   id="eventsd"> 
<p style="margin-left:10px;color: #222;font-size: 26px;font-weight: 400;">Upcoming Events<hr class="line"></p>
<?php 
                    
                    
                    $note=mysql_query("SELECT * FROM notices WHERE designation ='Fine Arts Club Secretary'");
                        while($club=mysql_fetch_array($note))
                        {    
                        $dat=date('20y-m-d H:i:s');
                        $expire=$club['expiry'];
                        $today_time = strtotime($dat);
                    $expire_time = strtotime($expire);
                    
                    if ($expire_time > $today_time)
                    {
                    ?>
                                <div id = "eventz"><a href="#" class="big-link" data-reveal-id="<?php echo $club['id']?>"> <?php echo "<sub><img id = 'plus' src='images/bg/single.png'/></sub> ".$club['heading'];?></a>
                                    <div id="hdate"><?php echo date('d M ,Y', strtotime($club['expiry']));?></div>
                           </div>
                    <?php
                    }
					else{
				?><div style="position:relative; top:40%; left:40%; font-size:48px; color:#CCC;">NO EVENTS</div><?php
						break;
					}
                        }
                    ?>
</div>
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