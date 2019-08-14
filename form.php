<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error())
?>
<?php
$ipass="The password should not contain Capital letters and spaces";
$ipassr="Enter the same password as above";
$nameError = $emailError = $passError=$genderError="";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameError = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
   if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameError = "Only letters and white space allowed"; 
	  }
  }

  if (empty($_POST["email"])) {
    $emailError = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format"; 
    }
  }
if (empty($_POST["gender"])) {
    $genderError = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>
<html>
<head>
	<style>
.button2 {
	background: #ae0404;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 10px;
    border-radius: 17px;
    min-width: 70px;
	
	}
.back
	{ position: absolute; visibility: visible; left: 60px; top: 10px; z-index: 200; }
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
<script>
function validation()
{
var result=true;
var i=document.getElementById("passw").value;
var j=document.getElementById("passr").value;
var k=0;

for(k=0;k<passw.length;k++)
{
	ch=i.charAt(k);
	
if((ch>='A' && ch<="Z") || ch==" ")
{
	result=false;
}


}
if(i!=j)
{
	alert("The passwords are not matching");
	result=false;
}
return result;
}

</script>

<style type="text/css">
	.button {
    background-color: #D4AF37; 
    border: none;
    color: #820303;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
}
	body{
		background: url(fbg.png);
    background-repeat: no-repeat;
    background-size: 1300px 900px;
	}
#output_image
{
 max-width:200px;
 max-height:100px;
}
</style>
<title>Registration Form</title>
</head>

<body >
	<br>
	
	<font face="CustomCraft" color="#D4AF37" size="20px"><center>Signup Form</center></font><br>
	<a href='main.php'><button class='button2 back'>Back</button></a>
<center>
<form method="post" action="<?php echo(htmlspecialchars($_SERVER ["PHP_SELF"]));?>" onsubmit="return validation()">

<table cellspacing="10" style="color:#D4AF37;font-style:italic; ">
<tr>
<td>

Name</td>
<td>
<input type="text"  name="name">
<span class="error">* <?php echo $nameError?></span>
</td>
</tr>
<td>
Photo:
</td>
<td>
	<input type="file" name="filename" accept="image/gif, image/jpeg, image/png" onchange="preview_image(event)">
<img id="output_image"/>
</td>
</tr>
<tr>
<td>
Email(Username):
</td>
<td>
<input type="mail"  name="email" required>
<span class="error">* <?php echo $emailError?></span>
</td>
</tr>

<tr>
<td>
Gender:
</td>
<td>
<input type="radio" name="gender" value="male" checked="checked" >Male
<input type="radio" name="gender" value="female">Female
<span class="error">*<?php echo $genderError?> </span>
</td>
</tr>

<tr>
<td>
Phone number:
</td>
<td>
<input type="number"  name="phone" cols="10" required>
</td>
</tr>
<tr>
<td>
Date of Birth:
</td>
<td>
<input type="Date" name="dob">
</td>
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
	<td>
		<select name="language">
			<option>Marathi</option>
			<option>Hindi</option>
			<option>Kannad</option>
			<option>Tamil</option>
		</select>
	</td>
</tr>
<tr>
	<td>
		Profession:
	</td>
	<td>
		<select name="profession">
			<option>Engineer</option>
			<option>Doctor</option>
			<option>Lawyer</option>
			<option>Business</option>
		</select>
	</td>
</tr>


<tr>
<td>
Hobbies:
</td>
<td>
<textarea rows="2" cols="25" name="hobbies"></textarea>
</td>
</tr>


<tr>
<td>
About Me:
</td>
<td>
<textarea name="about" rows="4" cols="25"></textarea>
</td>

</tr>
<tr>
<td>
Describe your desired partner:
<td>
<textarea name="expect" rows="4" cols="25"></textarea>
</td>


</tr>
<tr>
<td>
Set Passsword:
</td>

<td>

<input type="password"  name="password" id="passw" >
<span class="error"  >* <?php echo $passError ?></span>
</td
</tr>
<tr>
<td>
Confirm Password:
</td>
<td>
<input type="password"  name="passwordr" id="passr" >
*</td>

</tr>

<tr>
<td>
<input type="Submit" name="Submit" value="Submit">

</td>
<td>

<button class="button" type="button" name="Reset">Reset</button>

</td>
</tr>
</table>

</form>
</center>
</body>
</html>

<?php

if(isset($_POST['Submit']))
{	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$dob=$_POST['dob'];
	$city=$_POST['city'];
	$language=$_POST['language'];
	$profession=$_POST['profession'];
	$hobbies=$_POST['hobbies'];
	$about=$_POST['about'];
	$expect=$_POST['expect'];
	$password=$_POST['password'];
	$filename=$_POST['filename'];

if($gender=='male')	
{
	$sql1="INSERT INTO male (name,username,phone,dob,city,language,profession,hobbies,about,expect,password,picture) values('$name','$email','$phone','$dob','$city','$language','$profession','$hobbies','$about','$expect','$password','$filename')";	
	$gender="male";
}
else 	
{
	$sql1="INSERT INTO female (name,username,phone,dob,city,language,profession,hobbies,about,expect,password,picture) values('$name','$email','$phone','$dob','$city','$language','$profession','$hobbies','$about','$expect','$password','$filename')";
	$gender="female";

}
	if(mysqli_query($conn,$sql1))
    {
    
	mysqli_query($conn,$sql2);
	}
	else
		echo "Error: "  . $conn->error;

$sql2="INSERT INTO login values('$email','$password','$gender')";	

	mysqli_query($conn,$sql2);
    
	echo "alert('Thank You!');
	window.location.href='main.php';
	</script>";

$conn->close();
}
?>