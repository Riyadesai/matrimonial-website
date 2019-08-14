<!DOCTYPE html>
<html>
<head>
	<title>Your Favourites</title>
</head>
<body>
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
</body>
</html>

<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();
$username =$_SESSION['username'];
$gender=$_SESSION['gender'];

echo "<a href='display21.php'><button class='button2 back'>Back</button></a>";
echo "<center><h1 style='color:#820303'>Your Favourites</h1></center>"; 

if($gender=='male')
	$gender_display='female';
else
	$gender_display='male';

$sql = 'SELECT * FROM '.$gender_display.' WHERE username in (SELECT favourite from favourites where username="'.$username.'")';


$result=mysqli_query($conn,$sql);



if($result=mysqli_query($conn,$sql))
{
	if(mysqli_num_rows($result)>0)
		display($result,0,0,0);
	else 
		echo"<center>Sorry no records to display</center>";
}
function display($result,$flag,$from,$to)
{
$username =$_SESSION['username'];

	$count=0;
	echo "<center><table style='border: 5px white;'>";
	while ($row=mysqli_fetch_array($result)){
	
			if ($count%3==0)
			{
				echo "<tr>";
			}
			if ($count%2==1)
				echo "<td style='padding:40px;background-color:#fee7e7'>";
			else
				echo "<td style='padding:20px;background-color:#fee7e7'>";
				$img=$row['picture'];
				echo '<center><img src="'.$img.'" alt="HTML5 Icon" style="width:280px;height:310px"></center>';
				echo "<br><center>";
				echo "<b style='color:#820303'>".$row['name']."</b><br>";
				echo "<br>";
				//echo '
					
					
					echo'<form method="post">';

					echo'<table >';

					echo 
						  	'<table >'.
							    '<tr><td>Date of Birth:</td><td>'.$row["dob"].'</td></tr>'.
							    '<tr><td>City:</td><td>'.$row["city"].'</td></tr>'.
							    '<tr><td>Language:</td><td>'.$row["language"].'</td></tr>'.
							    '<tr><td>Profession:</td><td>'.$row["profession"].'</td></tr>'.
							    '<tr><td>Hobbies:</td><td>'.$row["hobbies"].'</td></tr>'.
							    '<tr><td>About Me:</td><td>'.$row["about"].'</td></tr>'.
							    '<tr><td>Expectations:</td><td>'.$row["expect"].'</td></tr>'.
							  	'<tr><td>Contact Details:</td><td>'.$row["username"].'</td></tr>';						
					echo'</table>';			
					
				echo "</center></td>";
				
				
				$count++;
				if ($count%3==0)
				{
					echo "</tr>";
				}
	}
	
echo "</table></center></form>";
}




?>