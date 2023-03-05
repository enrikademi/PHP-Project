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
	<title>Shto te dhena: </title>
</head>

<style type="text/css">
	
	 .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }
</style>

<body>
<?php

if(isset($_POST['Submit'])) {	
	$code  = $_POST['code'];
	$title = $_POST['title'];
	$Book = $_POST['Book'];
	$Semester = $_POST['Semester'];
	$description = $_POST['description'];
	$TeacherID = $_SESSION['user'];
		
	// checking empty fields
	if(empty($title) || empty($Book) || empty($Semester) || empty($code) || empty($description)) {
				
		if(empty($title)) {
			echo "<font color='red'>Title fusha eshte e zbraste.</font><br/>";
		}
		
		if(empty($Semester)) {
			echo "<font color='red'>Sasi fusha eshte e zbraste..</font><br/>";
		}
		
		if(empty($Book)) {
			echo "<font color='red'>Libri fusha eshte e zbraste..</font><br/>";
		}
		if(empty($description)) {
			echo "<font color='red'>Pershkrimi fusha eshte e zbraste..</font><br/>";
		}
		
		//linku per faqen paraprak
		echo "<br/><a href='javascript:self.history.back();'> Shko pas </a>";
	} else { 
		// kontrollon nese te gjitha fushat jane te plotsuara 
			
		//insert data to database	
		$result = mysqli_query($conn,"INSERT INTO course(course_code, title, Book, Semester, description, teacherID) VALUES('$code', '$title','$Book','$Semester','$description', '$TeacherID')");


		if($result)
		{
				
		echo "<font color='green'>Te dhenat u shtuan me sukses.";
		echo "<br/>";
		echo "<a href='CourseInfo.php'></a>";
		}
		else
			 echo ("Nuk u shtuan te dhenat : " . mysqli_error($conn) );

	}
}
?>
</body>
</html>
