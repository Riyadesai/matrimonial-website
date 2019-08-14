<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();
?>
<html>
<head>
	<style>
	.password
	{
		 position: absolute; visibility: visible; right: 751px; top: 100px; z-index: 200;
		 background-color:#D4AF37 ; 
    border: none;
    color: #4d0000;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 5px 10px;
    border-radius: 12px
	}
	.picture
	{
		 position: absolute; visibility: visible; right: 551px; top: 100px; z-index: 200;	
		 background-color:#D4AF37 ; 
    border: none;
    color: #4d0000;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 5px 10px;
    border-radius: 12px
	
	}
	.delete1
	{
		 position: absolute; visibility: visible; right: 351px; top: 100px; z-index: 200;
		 background-color:#D4AF37 ; 
    border: none;
    color: #4d0000;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 5px 10px;
    border-radius: 12px
	
		}
	.password1
	{
		 position: absolute; visibility: visible; right: 751px; top: 300px; z-index: 200;
		}
		.picture1
	{
		 position: absolute; visibility: visible; right: 401px; top: 300px; z-index: 200;
		}

	#output_image
{
 max-width:200px;
 max-height:100px;
}
.text
	{font-size:50px;
		font-family: CustomCraft;


	}
</style>
	<script type='text/javascript'>
	function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
	<title>User settings</title>
</head>
<body bgcolor="#820303">


	<center><div class="text"><font color="#D4AF37">
	User Settings</font></div>
	<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>"
		
		<center><input type="Submit" name="password" value="Change password" class="password">
		</form>
		<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>"
		<center><input type="Submit" name="photo" value="change photo"class="picture">
			</form>
			<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>"
		<center><input type="Submit" name="delete" value="Delete profile"class="delete1">
			</form>
		
<?php
if(isset($_POST['password'])) 
{echo'<form method="post" class ="picture1">
<table  style="color:#D4AF37;>
<tr><font color="#D4AF37">
<td>
Enter your old password:
</td>
<td>
<input type="password"  name="password" >
*</td>
<tr>
<td>
Enter new password:
</td>
<td>
<input type="password" name="password1" >
*</td>

</tr>
<tr><td><input type="Submit" name="change" value="change">
</form>';
}
if(isset($_POST['change']))
		{
			$password1=$_POST['password'];
			
			if($password1==$_SESSION['password'])

			{ 			
				$password=$_POST['password1'];
				$gender=$_SESSION['gender'];
 				$sql3="UPDATE ".$gender."
				SET password='$password'
				WHERE username='{$_SESSION['username']}'";
				$sql3="UPDATE login
				SET password='$password'
				WHERE username='{$_SESSION['username']}'";
				if(mysqli_query($conn,$sql3))
{
    echo "<script>
	alert('Your password has been changed!');
	window.location.href='display21.php';
	</script>";
	}
			}
		else
 		{echo "<script>
	alert('Please enter correct password!');
	window.location.href='settings.php';
	</script>";
}
	
}



?>
<?php
if(isset($_POST['photo'])) 
{$username=$_SESSION['username'];
$gender=$_SESSION['gender'];

$sql = "SELECT * FROM ".$gender;
$sth = $conn->query($sql);

while($row=mysqli_fetch_array($sth))
{
	if($row['username']==$username)
	{$img=$row['picture'];
	
	}
}
echo '<form method="post" class="picture1"><table style="color:#D4AF37;>
<tr><td>Your current picture</td>
<td><img src="'.$img.'" alt="HTML5 Icon" style="width:200px;height:100px;"></td></tr>
<tr><td><input type="file" name="filename" accept="image/gif, image/jpeg, image/png" onchange="preview_image(event)">
<img id="output_image"/></td></tr>
<tr><td><input type="Submit" value="Change" name="photochange"></td></tr>
</table>
</form>';
}
if(isset($_POST['photochange']))
{$filename=$_POST['filename'];
$gender=$_SESSION['gender'];
	$sql4="UPDATE ".$gender."
				SET picture='$filename'
				WHERE username='{$_SESSION['username']}'";
				if(mysqli_query($conn,$sql4))
{
    echo "<script>
	alert('Your picture has been changed!');
	window.location.href='display21.php';
	</script>";
	}

}
if(isset($_POST['delete']))
{	$gender=$_SESSION['gender'];
$sql4="DELETE from ".$gender."
WHERE username='{$_SESSION['username']}'";

$sql6="DELETE from login
WHERE username='{$_SESSION['username']}'";

	if(mysqli_query($conn,$sql4) && mysqli_query($conn,$sql6)){
    echo "<script>
	alert('Your profile has been deleted!');
	window.location.href='main.php';
	</script>";
	}

$conn->close();
}




?>
</body>
</html>