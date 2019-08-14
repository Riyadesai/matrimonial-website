<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();
//echo "hello";

if(isset($_POST['profile']))
{echo "hello";
	$username =$_SESSION['username'];
	$username1=$_POST['uname1'];
	//echo $username1;
	$sql5="SELECT * FROM login";
$res=mysqli_query($conn,$sql5);

while($row=mysqli_fetch_array($res))
{
	if($row['username']==$username){
		$gender=$row['gender'];	
		echo $gender;	
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
	<center><img src="'.$row['picture'].'" alt="HTML5 Icon" style="width:100px;height:100px"><br><br>';
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



echo"<tr><td>
<form method='POST' action='favourites.php'>
<input type='submit' value='Favourite' name='fav'>
<input type='text' style='display:none' value=".$username1." name='uname'>

</form>
</td></tr>";
}

'</table>


</center>

</body>
</html>';
}


?>