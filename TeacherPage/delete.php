<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>



<?php
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
?>

<div class="container">

<?php
//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($conn,"DELETE FROM course WHERE course_code='$id'");
echo "<font color='green'>Kursi u fshie me sukses.";
	echo "<br/>";
		echo "<a href='CourseInfo.php'>Shko pas dhe shfaq te dhenat e kursit.</a>";
//redirecting to the display page (view.php in our case)

?>
</div>


</div>
</body>
</html>



