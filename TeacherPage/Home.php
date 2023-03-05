<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<img src="images\fiek.png" alt="UEL" name="UEL" style="width: 200px; height: 75px; margin-top: -10px; float: left; margin-left: -10px;">
	
</body>
</html>



<?php  
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<p>Universiteti i Prishtines</p>
</head>
<body>

	<div>
		<img src = "Homework-Submission-System-main\images\fiek.png"  alt="fiek" style="width:200px;height:200px;">

	</div>
	

</body>
</html>


<div class="container">

<style type="text/css">
	h3
	{

		font-family: "Comic Sans MS", cursive, sans-serif;
		padding: 25px;
	}

</style>

<?php

$id= $_SESSION["user"];
$sql="SELECT * FROM `teacher` WHERE `ID`='$id' ";
$result =mysqli_query($conn,$sql);


$row = mysqli_fetch_row($result);

echo mysqli_error($conn);
echo "<h3> Mire se Vini Prof. ".$row[0]." ".$row[1]."</h3> ";

?>

  
</div>


</div>
</body>
</html>

