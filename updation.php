<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();

//$username =$_SESSION['username'];
//$gender=$_SESSION['gender'];
?>
<!DOCTYPE html>
<html>

<head>
	

	<title>Search</title>
<style type="text/css">
	
	.logout
	{ position: absolute; visibility: visible; right: 60px; top: 10px; z-index: 200; } 
	.insert
	{position: absolute; visibility: visible; right: 200px; top: 10px; z-index: 200; } 
	.update
	{position: absolute; visibility: visible; right: 500px; top: 10px; z-index: 200; } 
	
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
	}

</style>
</head>
<body>

<a href="main.php"><button class="button2 logout" type="button">Log Out</button></a>
<a href="signup_form.php"><button class="button2 insert" type="button">Insert</button></a>

<button  class="button2 update" type="button" id="button">Update</button>
<a href="deleteadmin.php"><button class="button2 delete" type="button" id="button2">Delete</button></a>	<center>
	<font face="CustomCraft" color="#820303" style="font-size:60px;">Users</font>
	<br><br><br>
	</center>
	<script>

var g=document.getElementById("button");
g.onclick=function up(){	
	var userna;
	userna=prompt("ENTER USERNAME WHICH HAS TO BE ALTERED"," ");
if(userna!=null)
{
	
window.location.href="modi.php?name=" + userna;
}

}

	</script>
</body>
</html>
<form method="post" action="<?php echo(htmlspecialchars($_SERVER ["PHP_SELF"]));?>">
<?php

echo'<center><font face="CustomCraft" color="#820303" style="font-size:60px;">male</font>';
$sql4 = "SELECT * FROM male";
$smh = $conn->query($sql4);
//$sth=mysqli_query($conn,$sql);
$count=0;

echo'<center><table>
<tr><td>Name</td>
<td>Username</td>
<td>Date of birth</td>
<td>City</td>
<td>Language</td>
<td>Profession</td></tr>';

while ($row=mysqli_fetch_array($smh))
{
	echo '<tr><td>' .$row['name'].'</td>';
	echo '<td>' .$row['username'].'</td>';
	echo '<td>' .$row['dob'].'</td>';
  	echo '<td>' .$row['city'].'</td>';
  	echo '<td>' .$row['language'].'</td>';
  	echo '<td>' .$row['profession'].'</td>';
  	echo'<td><input name="checkbox[]" type="checkbox" value="'.$row['regno'].'""></td></tr>';
}
echo "</center></table>";	
echo'<input type="submit" name="hello" value="delete">';

 echo'</form>';

if(isset($_POST['hello']))
{//echo 'delete';
	$cnt=array();
 $cnt=count($_POST['checkbox']);
 for($i=0;$i<$cnt;$i++)
  {
     $del_id=$_POST['checkbox'][$i];
     $query1="DELETE from male where regno=$del_id";
     $username1="SELECT username from male where regno=$del_id";
     $query2="DELETE from login where username=$username1";
     	if(mysqli_query($conn,$query1) && mysqli_query($conn,$query2))
     	{echo "<script>
	alert('the profiles have been deleted!');
	window.location.href='admin1.php';
	</script>";
		}
 			
	
}
	}
	echo'<center><font face="CustomCraft" color="#820303" style="font-size:60px;">female</font>';
$sql5 = "SELECT * FROM female";
$smh = $conn->query($sql5);
//$sth=mysqli_query($conn,$sql);
$count=0;

echo'<center><table>
<tr><td>Name</td>
<td>Username</td>
<td>Date of birth</td>
<td>City</td>
<td>Language</td>
<td>Profession</td></tr>';

while ($row=mysqli_fetch_array($smh))
{
	echo '<tr><td>' .$row['name'].'</td>';
	echo '<td>' .$row['username'].'</td>';
	echo '<td>' .$row['dob'].'</td>';
  	echo '<td>' .$row['city'].'</td>';
  	echo '<td>' .$row['language'].'</td>';
  	echo '<td>' .$row['profession'].'</td>';
  	echo'<td><input name="checkbox[]" type="checkbox" value="'.$row['regno'].'""></td></tr>';
}
echo "</center></table>";	
echo'<input type="submit" name="delete" value="delete">';

 echo'</form>';

if(isset($_POST['delete']))
{//echo 'delete';
	$cnt=array();
 $cnt=count($_POST['checkbox']);
 for($i=0;$i<$cnt;$i++)
  {
     $del_id=$_POST['checkbox'][$i];
     $query1="DELETE from female where regno=$del_id";
     $username1="SELECT username from female where regno=$del_id";
     $query2="DELETE from login where username=$username1";
     	if(mysqli_query($conn,$query1) && mysqli_query($conn,$query2))
     	{echo "<script>
	alert('the profiles have been deleted!');
	window.location.href='admin1.php';
	</script>";
		}
 			
	
}
	}
?>	