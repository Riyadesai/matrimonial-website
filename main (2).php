<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error())
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>



.parallax {
    /* The image used */
    background-image: url("1.png");

    /* Set a specific height */
    min-height: 700px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.hovereffect {
width:350px;
height:500px;
float:left;
overflow:hidden;
position:relative;
text-align:center;
cursor:default;

}

.hovereffect .overlay {
width:350px;
height:500px;
position:absolute;
overflow:hidden;
top:0;
left:0;
opacity:0;
background-color:rgba(0,0,0,0.5);
-webkit-transition:all .4s ease-in-out;
transition:all .4s ease-in-out
}

.hovereffect img {
display:block;
position:relative;
-webkit-transition:all .4s linear;
transition:all .4s linear;

}

.hovereffect h2 {
color:#D4AF37;
text-align:center;
position:relative;
font-size:17px;
background:rgba(0,0,0,0.6);
-webkit-transform:translatey(-100px);
-ms-transform:translatey(-100px);
transform:translatey(-100px);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
padding:10px;
}

.hovereffect p.info {
text-decoration:none;
display:inline-block;
font-size: 17px;
color:#D4AF37;

background-color:transparent;
opacity:0;
filter:alpha(opacity=0);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
margin:50px 0 0;
padding:7px 14px;
}

.hovereffect p.info:hover {
box-shadow:0 0 5px #fff;
}

.hovereffect:hover img {
-ms-transform:scale(1.2);
-webkit-transform:scale(1.2);
transform:scale(1.2);
}

.hovereffect:hover .overlay {
opacity:1;
filter:alpha(opacity=100);
}

.hovereffect:hover h2,.hovereffect:hover p.info {
opacity:1;
filter:alpha(opacity=100);
-ms-transform:translatey(0);
-webkit-transform:translatey(0);
transform:translatey(0);
}

.hovereffect:hover p.info {
-webkit-transition-delay:.2s;
transition-delay:.2s;
}
.button {
    background-color: #820303; 
    border: none;
    color: #D4AF37;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 5px 10px;
    border-radius: 17px
}
.position
{ position: absolute; visibility: visible; right: 460px; top: 10px; z-index: 200; } 
.position1
{ position: absolute; visibility: visible; right: 20px; top: 10px; z-index: 200; } 
.position2
{ position: absolute; visibility: visible; right: 280px; top: 13px; z-index: 200; }
.position3
{ position: absolute; visibility: visible; right: 100px; top: 13px; z-index: 200; }  
.position4
{ position: absolute; visibility: visible; right: 500; top: 60px; z-index: 200; font-size: 100px;text-shadow:2px 2px 5px #7c0303; }  
.position5
{ position: absolute; visibility: visible; right: 450; top: 180px; z-index: 200; font-size: 35px;text-shadow:1px 1px 1px #000000;}  
.position6
{ position: absolute; visibility: visible; left: 20px; top: 10px; z-index: 200;font-size: 25px; } 
.text
{font-size:40px;}

body, html {
    height: 100%;
    margin: 0;
}
.bg {
    /* The image used */
   

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
	<title >PerfectRishta</title>


</head>
<body bgcolor="#820303"> 

<div style="background-color: #ffff4d">

</div>
<div class="bg parallax">
	<div>

		<font face="Geometria" color="#820303" class="position6" >PerfectRishta</font>
		<a href="form.php"><button class="button position" type="button">Sign Up</button></a>
		<form method="post" action="<?php echo(htmlspecialchars($_SERVER ["PHP_SELF"]));?>">
			<input type="submit" name="login" class="button position1" value="Login">
			<input type="text" name="username" class="position2" placeholder="Username">
			<input type="password" name="password" class="position3" placeholder="Password">
		</form>
	</div>

<br>

<div class="position4">	
	<font face="CustomCraft" color="#820303">PerfectRishta</font>
</div>

<br>
<br>
<div class="position5">
	<font face="Pristina" color="#D4AF37">Your soulmate is just a click away...</font>
</div>
</div>
<div class="text"><center>
	<font face="CustomCraft" color="#D4AF37">ABOUT US</font>
</div></center>

<div style="margin-right: 60px; margin-left: 60px;">
	<br><font color="#D4AF37"><center>
	PerfectRishta is one of India’s leading matrimonial websites that has helped lakhs of members find their perfect life partner.
We believe choosing a life partner is a big and important decision, and hence work towards giving a simple and secure matchmaking experience for you and your family.You can register for FREE and search according to your specific criteria on age,language, profession,location and much more which will help you find your soulmate!So what are you waiting for?Register today!
	</font></center>
</div>

<br>
<br>
<div class="text">
	<font face="CustomCraft" color="#D4AF37"><center>OUR SUCCESS STORIES</center></font>
	<center>
	<table>
		<tr>
			<td style="padding: 20px;">
				<center>
				<div>
		    <div class="hovereffect">
		        <img class="img-responsive" src="couple1.jpg" style="width: 350px;height: 500px;">
		        <div class="overlay">
		           <h2>RAHUL AND ANJALI</h2>
		           <br><br>
		           <p class="info">We found each other through PerfectRishta and haven't looked back since.This year we celebrate our 3rd year anniversary and things coudnt be better!</p>
		        </div>
		    </div>
				</div>
				</center>
			</td>
			<td style="padding: 20px;">
		<center>
				<div >
		    <div class="hovereffect">
		        <img class="img-responsive" src="couple2.jpg" style="width: 350px;height: 500px;">
		        <div class="overlay">
		           <h2>AAKANKSHA AND ADESH</h2>
		           <br><br>
		           <p class="info">People often talk about matches made in heaven and we always tell them ours was made at PerfectRishta.We're so grateful to this website for helping.</p>
		        </div>
		    </div>
				</div>
				</center>
			</td>
			<td style="padding: 20px;">
		<center>
				<div>
		    <div class="hovereffect">
		        <img class="img-responsive" src="couple3.jpg" style="width: 350px;height: 500px;">
		        <div class="overlay">
		           <h2>ROHAN AND VINITA</h2>
		           <br><br>
		           <p class="info">Signing up for PerfectRishta was the best decision we ever made.Forever thankful to this site for helping us find each other!</p>
		        </div>
		    </div>
				</div>
				</center>
			</td>
		</tr>
		
	</table>
</center>
<?php
if(isset($_POST['login']))
{	
	$username=$_POST['username'];
	$password=$_POST['password'];

	if($username=='admin' && $password=='admin')
		echo "<script>				
				window.location.href='admin.php';
				</script>";
	$sql="SELECT * FROM login";
	$result=mysqli_query($conn,$sql);

	while ($row=mysqli_fetch_array($result)) {
		if($row["username"]==$username){
			if($row["password"]==$password){
				$gender=$row["gender"];
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['gender']=$gender;
				echo "<script>				
				window.location.href='display21.php';
				</script>";
	
			}
		}
	}
}
?>