<?php
include "includes/databaseConnection.php";
include "includes/teacherMenu.php";
?>

<div class="container">


<?php
if(!isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>

<?php


if(isset($_POST['update']))
{	
	$id = $_SESSION['user'];
	
    $first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$Email = $_POST['Email'];
	$password = $_POST['password'];
	$Phone_Number = $_POST['Phone_Number'];	
	
	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($Email) || empty($password) || empty($Phone_Number)) {
				
		if(empty($first_name)) {
			echo "<font color='red'>first_name fusha eshte e zbrast.</font><br/>";
		}
		
		if(empty($last_name)) {
			echo "<font color='red'>last_name fusha eshte e zbrast.</font><br/>";
		}
		
		if(empty($Email)) {
			echo "<font color='red'>Email fusha eshte e zbrast.</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>Password fusha eshte e zbrast.</font><br/>";
		}
		if(empty($Phone_Number)) {
			echo "<font color='red'>Phone_Number fusha eshte e zbrast.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($conn,"UPDATE teacher SET first_name='$first_name', last_name='$last_name', Email='$Email' , password=md5('$password') , Phone_Number='$Phone_Number' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php                                                      
		header("Location: home.php");
	}
}


//getting id from url
$id = $_SESSION['user'];

//selecting data associated with this particular id
$result = mysqli_query($conn,"SELECT * FROM teacher WHERE id=$id");

while($res = mysqli_fetch_array($result))
{

	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$Email = $res['Email'];
	$password = $res['Password'];
	$Phone_Number = $res['Phone_Number'];
}

?>
<html>

<head>	
	<title>Ndrysho te Dhenat</title>
</head>

<body>

	<br/><br/>
		<p><font size="+2">Ndrysho Profilin</font></p>
	<form name="form1" method="post" action="EditProfile.php">
		<table width='50%' border="0">
			<tr> 
				<td><input type="hidden" name="first_name"  value="<?php echo $first_name;?>"></td>
			</tr>
			<tr> 
				<td><input type="hidden" name="last_name"  value="<?php echo $last_name;?>"></td>
			</tr>
			<tr> 
				<td>Ndrysho Email :</td>
				<td><input type="text" name="Email"  placeholder="enter Email" value="<?php echo $Email;?>"></td>
			</tr>
			<tr> 
				<td> Ndrysho fjalekalimin :</td>
				<td><input type="password" name="password"  placeholder="enter password" value="<?php echo $password;?>"></td>
		
			</tr>
			<tr> 
				<td> Ndrysho numrin :</td>
				<td><input type="text" name="Phone_Number"  placeholder="enter Phone Number"value="<?php echo $Phone_Number;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_SESSION['user'];?>></td>
				<td><input type="submit" name="update" value="Konfirmo">
				<a href="home.php" class="btn btn-default" style="height: 30px;color: black; background-color: #E6E6E6;">Ndalo</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>


</div>


</div>
</body>
</html>
