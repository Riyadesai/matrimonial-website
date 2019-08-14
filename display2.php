<?php
$conn=mysqli_connect("localhost","root","")or die(mysql_error());
mysqli_select_db($conn,"matrimonial")or die(mysql_error());
session_start();

$username =$_SESSION['username'];
$gender=$_SESSION['gender'];

$sql = "SELECT * FROM ".$gender;
$sth = $conn->query($sql);

while($row=mysqli_fetch_array($sth))
	if($row['username']==$username)
	$img=$row['picture'];

?>
<!DOCTYPE html>
<html>

<head>
	<title>Search</title>
<style type="text/css">
	.profile
	{ position: absolute; visibility: visible; left: 60px; top: 10px; z-index: 200; } 
	.logout
	{ position: absolute; visibility: visible; right: 60px; top: 10px; z-index: 200; }
	.search1
	{ position: absolute; visibility: visible; right: 160px; top: 12px; z-index: 200;padding:4px; } 
	.search2
	{ position: absolute; visibility: visible; right: 161px; top: 13px; z-index: 200;
		background: url('search.png')no-repeat;
		background-size: 25px 25px;
		box-shadow: -1px 1px 1px #808080;
	    padding: 12px;	    
	    border: none;
	    height: 25px;
	 } 
	.button1 {
    background: url(<?php echo $img ?>)no-repeat;
    background-size: 100px 100px;
    cursor:pointer;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    box-shadow: 3px 3px 5px #000000;
    padding: 50px;
    border-radius: 70px
	}
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
	body{
		color: "#820303";
	}
</style>

<script type="text/javascript">
function validate()
{
	var r1=valthisform('city[]');
	var r2=valthisform('profession[]');
	var r3=valthisform('language[]');
	return (r1 && r2 && r3);
}
function valthisform()
{
    var checkboxs=document.getElementsByName(arguments[0]);
    var okay=false;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=true;
            break;
        }
    }
    if(okay)return true;
    else {
    	alert("Please check atleast one checkbox of "+arguments[0].slice(0,-2));
    	return false;
    }
}
function sort() {
	
	 document.getElementById('form').style.display='block';
}
</script>

</head>
<body bgcolor="">
<a href="profile.php"><button class="button1 profile" type="button"></button></a>
<a href="main.php"><button class="button2 logout" type="button">Log Out</button></a>



	<center>
	<font face="CustomCraft" color="#820303" style="font-size:60px;">Prospective Partners</font>
	<br><br><br>


	<button name="sort" class="button2" onclick="sort()">sort</button>

<form method="post" action="<?php echo(htmlspecialchars($_SERVER ["PHP_SELF"]));?>">
	 <input type="text" name="search" class="search1" placeholder="Search...">
	 <input type="submit" name="submit2" class="search2" value="">
	<div id="form" style="display:none;">	
		<table>			
				<tr>
					<td style="padding: 15px;"><font color="#820303">Language</td></font>
					<td style="padding: 15px;"><font color="#820303">City</td></font>
					<td style="padding: 15px;"><font color="#820303">Age</td></font>
					<td style="padding: 15px;"><font color="#820303">Profession</td></font>
				</tr>
				<tr>
					<td><font color="#820303">
						<input type="checkbox" name='language[]' value="Marathi">Marathi<br>
						<input type="checkbox" name='language[]' value="Hindi" >Hindi<br>
						<input type="checkbox" name='language[]' value="Tamil" >Tamil<br>
						<input type="checkbox" name='language[]' value="Kannad" >Kannad<br>
					</td></font>
					<td><font color="#820303">
						<input type="checkbox" name='city[]' value="Pune" >Pune<br>
						<input type="checkbox" name='city[]' value="Mumbai" >Mumbai<br>
						<input type="checkbox" name='city[]' value="Chennai" >Chennai<br>
						<input type="checkbox" name='city[]' value="Hyderabad" >Hyderabad<br>
					</td></font>
					<td><font color="#820303">
						<input type="checkbox" name='age[]' value="21-24">21-24<br>
						<input type="checkbox" name='age[]' value="25-28">25-28<br>
						<input type="checkbox" name='age[]' value="29-32">29-32<br>
						<input type="checkbox" name='age[]' value="33-36">33-36<br>
					</td></font>
					<td><font color="#820303">
						<input type="checkbox" name='profession[]' value="Engineer" >Engineer<br>
						<input type="checkbox" name='profession[]' value="Business" >Business<br>
						<input type="checkbox" name='profession[]' value="Doctor" >Doctor<br>
						<input type="checkbox" name='profession[]' value="Lawyer" >Lawyer<br>
					</td></font>
				</tr>
			</font>
		</table>
	<input type="Submit" name="Submit" value="Apply" class="button2" onclick="return validate()">
	</div>
	</form>
	
	</center>
</body>
</html>

<?php


if($gender=='male')
	$gender_display='female';
else
	$gender_display='male';

if(isset($_POST['submit2']))
{	
	
	$search=$_POST['search'];
	$query="select * from ".$gender_display." where name='".$search."'";
	if($result=mysqli_query($conn,$query)){
		if(mysqli_num_rows($result)>0)
			display($result);
		else
			echo "<center>Sorry no records to display</center>";
	}
}

else if(isset($_POST['Submit']))	
{

	$city=$_POST['city'];
	$language=$_POST['language'];
	$profession=$_POST['profession'];
	//$age=$_POST['age'];

	//$year=date("Y");
	

	$result=array_merge($city,$language,$profession);
	$result=implode(", ",$result);

	echo "<br><center><font color='#820303'>Showing result for ".$result."</center><br>";

	$city=toquery($city,'city');
	$profession=toquery($profession,'profession');
	$language=toquery($language,'language');
	

	$combine=array($city,$language,$profession);
	$where=implode(" and ", $combine);
	$sql1="select * from ".$gender_display." where (".$where.")";
	
	if($result=mysqli_query($conn,$sql1)){
		if(mysqli_num_rows($result)>0)
			display($result);
		else
			echo "<center>Sorry no records to display</center>";
	}

}
else {

	$sql = "SELECT * FROM ".$gender_display;
	$sth = $conn->query($sql);
	$count=0;
	display($sth);
}

function toquery($array,$column)
{
	$n=count($column);
	
	for($i=0;$i<$n;$i++)
		$array[$i]=$column."='".$array[$i]."'";
	$array=implode(" or ", $array);
	$array="(".$array.")";
	
	return $array;
}

function display($result)
{	$username =$_SESSION['username'];
	
	$count=0;
	echo "<center><table>";
	while ($row=mysqli_fetch_array($result)){
	
			if ($count%3==0)
			{
				echo "<tr>";
			}
			if ($count%2==1)
				echo "<td style='padding:40px;'>";
			else
				echo "<td style='padding:40px;background-color:#fee7e7''>";
				$img=$row['picture'];
				echo '<img src="'.$img.'" alt="HTML5 Icon" style="width:230px;height:270px">';
				echo "<br><center>";
				echo "<b style='color:#820303'>".$row['name']."</b><br>";
				echo "<br>";
				echo '
					<script type="text/javascript">
						function like(var fav){
							alert("i am "+fav);							
						}
					</script>

					<style>
					.dropbtn {
				    background-color: #fb8383;
				    color: #820303;
				    padding: 8px;
				    font-size: 16px;
				    border: none;
							}

					.dropdown {
					    position: relative;
					    display: inline-block;
					}

					.dropdown-content {
					    display: none;
					    position: absolute;
					    background-color: #fdcece;
					    color:#820303;
					    min-width: 250px;
					    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
					    z-index: 1;
					}

					.dropdown-content a {
					    color: white;
					    padding: 12px 10px;
					    text-decoration: none;
					    display: block;
					}

					.dropdown-content a:hover {background-color: #fdcece;}

					.dropdown:hover .dropdown-content {display: block;}

					.dropdown:hover .dropbtn {background-color: #fdcece;}
					</style>';

					echo '<div class="dropdown">
						  <button class="dropbtn">Details</button>
						  <div class="dropdown-content">'.
						  	'<table>'.
							    '<tr><td>Date of Birth:</td><td>'.$row[4].'</td></tr>'.
							    '<tr><td>City:</td><td>'.$row[5].'</td></tr>'.
							    '<tr><td>Language:</td><td>'.$row[6].'</td></tr>'.
							    '<tr><td>Profession:</td><td>'.$row[7].'</td></tr>'.
							    '<tr><td>Hobbies:</td><td>'.$row[8].'</td></tr>'.
							    '<tr><td>About:</td><td>'.$row[9].'</td></tr>'.
							    '<tr><td>Expectations:</td><td>'.$row[10].'</td></tr>'.
							'</table>'.
						  '</div>
						</div>';
					
					echo "<form method='POST' action='favourites.php'>
							<input type='submit' value='Favourite' name='fav'>
							<input type='text' style='display:none' value=".$row[2]." name='uname'>
							</form>";

					
				echo "</center></td>";
				
				
				$count++;
				if ($count%3==0)
				{
					echo "</tr>";
				}
	
	}
echo "</table></center>";
}

function favourite($id){
	echo $id;
	echo $username;
}
?>	