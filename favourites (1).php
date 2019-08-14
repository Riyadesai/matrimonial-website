<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();


if(isset($_POST['fav']))
{
	$username =$_SESSION['username'];
	$fav=$_POST['uname'];

	
	$sql="insert into favourites (username,favourite) values ('$username','$fav')";
	mysqli_query($conn,$sql);
	
echo "<script>window.location.href='display2.php'</script>";

}
?>