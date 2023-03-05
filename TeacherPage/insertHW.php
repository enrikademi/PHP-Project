<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>


<?php
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php


 	
	$title = $_POST['title'];
	$course = $_POST['course'];
	$description = $_POST['description'];
	

	$insertdate = date('Y-m-d', strtotime($_POST['date']));
$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);






					if (file_exists("TeacherHomeworks/" . $_FILES["file"]["name"]))
					{
						
						echo '<script language="javascript">alert(" Na falni!! Filename ekziston...")</script>';
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"TeacherHomeworks/" . $_FILES["file"]["name"]) ;

						
						
						$sql = "INSERT INTO homework(title, description, deadline, course) VALUES ('" . $_POST["title"] ."','" . $_POST["description"] ."','$insertdate','".$_POST['course'] ."');";
						//$rows = "SELECT * FROM users WHERE id='$id' AND name='$emri' AND surname ='$mbiemri' AND email='$email' AND username='$username' AND password= '$password' AND rank='$rank'AND level='$level' ";
						if (!mysqli_query($conn,$sql))
						{
							echo('Error : ' . mysqli_error($conn));
						
						}
						else 
						{
						
							header ("Location:home.php");
							echo '<script language="javascript">alert("Faleminderit!! File u uplodua")</script>';
                            
						}
					
						
					}




?>
</body>
</html>
