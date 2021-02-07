<?php
ob_start();
if (!defined('check_access')) 
{
  header("Location: /?page=home");die("ÔH NÂU!!");
  ob_end_flush();
}

?>

		
			<div style="margin-top: 200px; ">
				
				<div style="height: 60px"><a  onmouseover="big()" onmouseout="normal()" id=demo   style="color: white; font-size: 40px;text-decoration: none" href="./?page=gifts">Your Gifts!</a></div><?php $_SESSION['name']="children";?>
				<br>
				<br>
				<div><a onmouseover="big1()" onmouseout="normal1()" id=demo1  style="color: white; font-size: 40px;text-decoration: none" href="./?page=upload">Upload!</a></div>

			</div>


			<script>
			function big() {
			  document.getElementById("demo").style.fontSize = "50px";
			  document.getElementById("demo").style.transition = "all 0.3s";
			}
			function normal() {
			  document.getElementById("demo").style.fontSize = "40px";
			  document.getElementById("demo").style.transition = "all 0.5s";
			}
			function big1() {
			  document.getElementById("demo1").style.fontSize = "50px";
			  document.getElementById("demo1").style.transition = "all 0.3s";
			}
			function normal1() {
			  document.getElementById("demo1").style.fontSize = "40px";
			  document.getElementById("demo1").style.transition = "all 0.5s";
			}

			</script>


	

	


