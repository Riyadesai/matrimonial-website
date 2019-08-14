<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();


if(isset($_POST['del']))
{
	$username=$_POST['uname'];

	$sql1="select * from login where username='".$username."'";
	echo $sql1;
	if($result=mysqli_query($conn,$sql1)){
		if(mysqli_num_rows($result)>0)
			$row=mysqli_fetch_array($result);
	}

$gender=$row['gender'];
	
	$del_from_login="delete from login where username='".$username."'";
	mysqli_query($conn,$del_from_login);
		


	$del_from_table="delete from ".$gender." where username='".$username."'";
	mysqli_query($conn,$del_from_table);
	

	$del_from_fav="delete from favourites where username='".$username."'";
	mysqli_query($conn,$del_from_fav);
		
echo "<script>window.location.href='updation.php'</script>";

}
?>