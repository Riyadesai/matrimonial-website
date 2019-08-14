<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
	<style type="text/css">
	.back
	{ position: absolute; visibility: visible; left: 60px; top: 10px; z-index: 200; }
	.button2 {
	background: white;
    border: none;
    color: red;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 8px;
    border-radius: 17px;
    min-width: 70px;
	
	}
	.buttonf {
	background: #ae0404;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 1px 1px 3px #000000;
    padding: 10px;
    border-radius: 25px;
    
    min-width: 40px;
    background-image:url("heart1.jpg");
    background-size: 250px 120px;
    background-repeat: no-repeat;
    vertical-align: middle;
  background-position: center; 
  
  
	
	}
</style>
</head>
<body>

<a href='display21.php'><button class='button2 back'>Back</button></a>
</body>
</html>

<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();
//echo "hello";

if(isset($_POST['profile']))
{
	$username =$_SESSION['username'];
	$username1=$_POST['uname1'];
	//echo $username1;
	$sql5="SELECT * FROM login";
$res=mysqli_query($conn,$sql5);

while($row=mysqli_fetch_array($res))
{
	if($row['username']==$username){
		$gender=$row['gender'];	
			
	}
}

if($gender=='male')
	$sql1="SELECT * FROM female where username='".$username1."'";
else
	$sql1="SELECT * FROM male where username='".$username1."'";
$res=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res))
{

echo'
<html>
<head>
	<style>
.text
	{font-size:50px;
		font-family: CustomCraft;
	}

	</style>
	<title>View Profile</title>
</head>
</style>
<body bgcolor="#820303">
	<center><div class="text"><font color="#D4AF37">
	 Profile
	<br>
	</div>
	<table cellspacing="20"><tr><td>
	<center><img src="'.$row['picture'].'" alt="HTML5 Icon" style="width:300px;height:350px"><br><br></td><td>';
	echo'
<table cellspacing="10" style="color:#D4AF37;font-style:italic;">
<tr>
<td>

Name</td>
<td>';
   
echo $row['name'];
echo'</td>
</tr>
<td>

</tr>
<tr>
<td>
Email(Username):
</td>
<td>';
echo $username1;
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
'.$row['phone'].'
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
		'.$row['city'].
	 '</td>
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
 '.$row['hobbies'].'
</td>
</tr>


<tr>
<td>
About Me:
</td>
<td>
'.$row['about'].'
</td>

</tr>
<tr>
<td>
Describe your desired partner:
<td>
'.$row['expect'].'
</td>
</tr>';

echo"<tr><td >
<form method='POST' action='favourites.php'>
<input type='submit' class='buttonf' value='' name='fav'>
<input type='text' style='display:none' value=".$username1." name='uname'>

</form>
</td></tr>";
}

echo '</table></td></tr></table>


</center>

</body>
</html>';
}


?>