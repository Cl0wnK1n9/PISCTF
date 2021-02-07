<?php
ob_start();
if (!defined('check_access')) 
{
  header("Location: ./?page=home");
  die("ÔH NÂU!!");
  ob_end_flush();
}
echo "<h1> style='color: white'>ITS JUST KIDDING :)) </h1>";
$flag="christCTF{*******}" ; 

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
		$password=$_POST("password");
		$username=$_POST("username");
		if($username==="admin"){
			if($password==="Q2hyaXN0Q1RGe2shRGQhbkchfQ==" && $username!=="admin" ){
					echo $flag;
			}	
		}
}
else {highlight_file(__FILE__);}		
?>
