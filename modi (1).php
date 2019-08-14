<?php
//include("main.php");
$count=1;
$gender;
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();
?>

<!DOCTYPE html>
<html>
<head>
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
<script>
function down()
{
alert("This username does not exist");
}
</script>
	<style>
	.button {
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
	.text
	{font-size:50px;
		font-family: CustomCraft;


	}
	.position1
{ position: absolute; visibility: visible; right :60px; top: 10px; z-index: 200; 
}
 #output_image
{
 max-width:200px;
 max-height:100px;
}
	
	</style>
	<title>My Profile</title>

</head>

<body bgcolor="#820303">
	<center><div class="text"><font color="#D4AF37">
	My Profile
	<br>
	</div>

<?php
$username=$_GET['name'];

$sql1="SELECT * FROM login";
$res=mysqli_query($conn,$sql1);

while($row=mysqli_fetch_array($res))
{
	if($row['username']==$username){
		$gender=$row['gender'];	
$count=0;		
	}
}
if($count==0)
{

if($gender=='male')
	$sql1="SELECT * FROM male";
else
	$sql1="SELECT * FROM female";
$res=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res))
{
	if($row['username']==$username){	
	
	
	echo'<form method="post">
<table cellspacing="10" style="color:#D4AF37;font-style:italic;">
<tr>
<td>

Name</td>
<td>';
   
echo $row['name'];
echo'</td>
</tr>
<td>
Photo:
</td>
<td>
<input type="file" name="filename" accept="image/gif, image/jpeg, image/png" onchange="preview_image(event)">
<img id="output_image"/>';
//$img=$row['picture'];
	//echo '<img src="'.$img.'" alt="HTML5 Icon" style="width:100px;height:100px">';
	
echo'</td>
</tr>
<tr>
<td>
Email(Username):
</td>
<td>';
 echo $_GET['name'];
echo'</td>
</tr>

<tr>
<td>
Gender:
</td>
<td>
female
</td>
</tr>

<tr>
<td>
Phone number:
</td>
<td>
<textarea rows="1" cols="50"  name="phone">'.$row['phone'].'</textarea>
</td>
</tr>
<tr>
<td>
Date of Birth:
</td>
<td>';
echo $row['dob'];
echo'</td>
</tr>
<tr>
	<td>
		City: 
	</td>
	<td>
		<select name="city">
		<option>Pune</option>
		<option>Mumbai</option>
		<option>Chennai</option>
		<option>Hyderabad</option>
		</select>
	 </td>
</tr>
<tr>
	<td>
		Language:
	</td>
	<td>';
		echo $row['language'];
	echo'</td>
</tr>
<tr>
	<td>
		Profession:
	</td>
	<td>';
		echo $row['profession'];
	echo'</td>
</tr>


<tr>
<td>
Hobbies:
</td>
<td>
<textarea rows="2" cols="50"  name="hobbies">'.$row['hobbies'].'</textarea>
</td>
</tr>


<tr>
<td>
About Me:
</td>
<td>
<textarea name="about" rows="4" cols="50">'.$row['about'].'</textarea>
</td>

</tr>
<tr>
<td>
Describe your desired partner:
<td>
<textarea name="expect" rows="4" cols="50">'.$row['expect'].'</textarea>
</td>


</tr>
<tr>
<td>
Change Passsword:
</td>
<td>
<input type="password"  name="password" >
*</td>
<tr>
<td>
Confirm Password:
</td>
<td>
<input type="password"  password="" >
*</td>

</tr>
<tr>
<td>
<input type="Submit" name="Submit" value="Update">

</td>
<td>
<input type="Submit" name="Delete" value="Delete">
</td>
</tr>

</table>
</form>

</center>';
}
}
 if(isset($_POST['Submit']))
{	
	
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$hobbies=$_POST['hobbies'];
	$about=$_POST['about'];
	$expect=$_POST['expect'];
	$password=$_POST['password'];
	$filename=$_POST['filename'];
	//echo '$filename';

  $sql3="UPDATE ".$gender."
SET hobbies='$hobbies',phone='$phone',about='$about',expect='$expect',picture='$filename'
WHERE username='$username'";

if(mysqli_query($conn,$sql3)){
    echo "<script>
	alert('Your profile has been updated!');
	window.location.href='m_display.php';
	</script>";
	}

$conn->close();
}

$conn->close();
}

if($count!=0)
{

		echo "$username is not present";
	
}

?>
</body>
</html>

