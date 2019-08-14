<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	

	<title>Search</title>
<style type="text/css">
	
	.logout
	{ position: absolute; visibility: visible; right: 60px; top: 10px; z-index: 200; } 
	
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
	.searchm1
	{ position: absolute; visibility: visible; left: 160px; top: 112px; z-index: 200;padding:4px; } 
	.searchm2
	{ position: absolute; visibility: visible; left: 309px; top: 113px; z-index: 200;
		background: url('search.png')no-repeat;
		background-size: 25px 25px;
		box-shadow: -1px 1px 1px #808080;
	    padding: 12px;	    
	    border: none;
	    height: 25px;
	 } 
	 .searchf1
	{ position: absolute; visibility: visible; right: 160px; top: 112px; z-index: 200;padding:4px; } 
	.searchf2
	{ position: absolute; visibility: visible; right: 161px; top: 113px; z-index: 200;
		background: url('search.png')no-repeat;
		background-size: 25px 25px;
		box-shadow: -1px 1px 1px #808080;
	    padding: 12px;	    
	    border: none;
	    height: 25px;
	 } 
	 .insert
	{position: absolute; visibility: visible; left: 100px; top: 10px; z-index: 200; } 
</style>
</head>
<body>
<a href="form.php"><button class="button2 insert" type="button">Insert</button></a>
<a href="main.php"><button class="button2 logout" type="button">Log Out</button></a>
<center>
	<font face="CustomCraft" color="#820303" style="font-size:60px;"><b>Administrator</b></font>
<form method="post" action="<?php echo(htmlspecialchars($_SERVER ["PHP_SELF"]));?>" name="search_male">
	 <input type="text" name="searchm" class="searchm1" placeholder="Search Groom...">
	 <input type="submit" name="submit_male" class="searchm2" value="">
</form>

<form method="post" action="<?php echo(htmlspecialchars($_SERVER ["PHP_SELF"]));?>" name="search_female">
	 <input type="text" name="searchf" class="searchf1" placeholder="Search Bride...">
	 <input type="submit" name="submit_female" class="searchf2" value="">
</form>


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

<?php
// echo "<style>
// 	table, th, td {
//     border: 1px solid black;
//     border-collapse: collapse;
// }</style>";
echo "<center><table cellspacing='30'><tr>";

echo'<center><th><font face="CustomCraft" color="#820303" style="font-size:60px;">male</font></th></center>';
echo'<center><th><font face="CustomCraft" color="#820303" style="font-size:60px;">female</font></th></center></tr><tr><td>';
	if(isset($_POST['submit_male']))
	{	
		$search=$_POST['searchm'];
		$gender_display='male';
		
		$query="select * from ".$gender_display." where name='".$search."'";
		display($conn,$query);
	}
	else
	{
	
	$sql4 = "SELECT * FROM male order by name";
	display($conn,$sql4);
	}

echo "</td><td>";
	if(isset($_POST['submit_female']))
	{	
		$search=$_POST['searchf'];
		$gender_display='female';
		
		$query="select * from ".$gender_display." where name='".$search."'";
		display($conn,$query);
	}
	else
	{
	$sql5 = "SELECT * FROM female order by name";
	display($conn,$sql5);
	}
echo "</td></table></center>";



function display($conn,$sql){
	$shm=mysqli_query($conn,$sql);
	$count=0;

	echo'<table>
	<tr><th>Name</th>
	<th>Username</th>
	<th>City</th>';

	if(mysqli_num_rows($shm)==0)
		echo "<center><h3>Sorry the record does not exists</h2></center>";

	while ($row=mysqli_fetch_array($shm))
	{
		echo '<tr><td>' .$row['name'].'</td>';
		echo '<td>' .$row['username'].'</td>';
	  	echo '<td>' .$row['city'].'</td>';
	  	echo '<td><form method="POST" action="delete_from_admin.php">
							<input type="submit" value="Delete" name="del">
							<input type="text" style="display:none" value='.$row["username"].' name="uname">
							</form></td>'; 
	  	echo '<td><form method="POST" action="admin_update.php">
							<input type="submit" value="Update" name="update">
							<input type="text" style="display:none" value='.$row["username"].' name="uname">
							</form></td>';	  	
	}
	echo "</table>";

}
?>	