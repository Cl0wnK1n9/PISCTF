<?php
function Upload_Single_File($max){
	global $target_file;
	foreach ($_FILES as $key => $value)
	{
		$GLOBALS[$key] = $value;
	}
	$uploadOk = 0;
	$check = getimagesize($target_file["tmp_name"]);
	if($check != false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	$filename="./uploads/HADES_".md5(rand(1000,9999)/rand(1,100)+rand(100,200)).".png";	
	if (file_exists($filename)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	if ($target_file["size"] > $max*1024*1024) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	} 
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($target_file["tmp_name"], $filename)) {
			echo "<p style='color: white' >";
			echo "The file has been uploaded: ".$filename;
			echo "</p>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}	
}
if(isset($_POST["submit"])){
	$target_file="";	
    Upload_Single_File(5);
    echo $_SESSION["name"];
}

?>
<h1 style="color: white;margin-top:200px"> UPLOAD! </h1><br>
<form action="./" method="post" enctype="multipart/form-data">
  <input type="file" name="target_file">
  <input type="submit" value="Upload" name="submit">
</form>
