<?php
$connect=mysqli_connect('localhost','root');
mysqli_Select_db($connect,"matrimonial");
$usename1=0;

session_start();
?>
<html>
<head>
<script>

function hello(){
	
alert("hello");
<a href="updation.php"></a>;
alert("ok");}
</script>

<style>

	.done
	{ position: absolute; visibility: visible; right: 60px; top: 10px; z-index: 200; } </style>

	
	
</head>

<body bgcolor="#E6E6FA">

<a href="updation.php"><button class="button2 done" type="button">Done</button></a>

<center><form method="post">
<tr>
<td>
Enter username:
</td>
<td>
<input type="text" id="uname" name="uname">
</td>
</tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit">
</td>
</tr>
</form>
</center>
<?php
if(isset($_POST['submit']))
{
{
	$username1=$_POST['uname'];
}
$sq="select * from login where username='$username1'";
$resultan=mysqli_query($connect,$sq);

if($resultan!=null)
{
	$result=mysqli_fetch_array($resultan);
	
	$gender="female";
$squery="delete from ".$gender."  where username='$username1'";
$i=mysqli_query($connect,$squery);


}
}
mysqli_close($connect);
?>
</body>

</html>
