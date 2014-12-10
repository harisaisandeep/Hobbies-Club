<?php
$conn = mysql_connect("localhost" , "root" , "root");
if(!$conn){

	die("there is an error in connecting to database".mysql_error());
}
$db = mysql_select_db("events" , $conn);

class gallery{

private $path;
private $file_name;

public function crdir($file_name , $path){

    mkdir("$path/$file_name" , 0755);
$insert = mysql_query("INSERT INTO folder (folderName,path) VALUES ('$file_name' , '$path') ");
}

public function uploadFile($file_name , $path){

$extend = pathinfo($file_name , PATHINFO_EXTENSION);
$filename = basename($file_name,".".$extend);
		//echo $filename;
		
			if($_FILES["file"]["error"]>0)
			{
				echo "Return Code: ".$_FILES["file"]["error"];
			}
			else
			{
				if(file_exists($path."/".$filename))
				{
					echo "The file with this name already exists";
				}
				else
				{
					
					@move_uploaded_file($_FILES["file"]["tmp_name"],$path."/".$filename);
					$select = mysql_query("INSERT INTO events (filePath, fileName, fileExtension) VALUE('$path', '$filename', '$extend')");
				}
			}

}


}


?>