<?php  
include 'includes/studentMenu.php'; 
include 'includes/databaseConnection.php';

//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}

?>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <style type="text/css">
	#wrapper {
	margin: 0 auto;
	float: none;
	width:70%;
}

.before { background-color: #FF9999; } 
.current { background-color: #FF0000; } 
.after { background-color: #FFFFFF; }

.header {
	padding:10px 0;
	border-bottom:1px solid #CCC;
}
.title {
	padding: 0 5px 0 0;
	float:left;
	margin:0;
}
.container form input {
	height: 30px;
}
body
{
    
    font-size:12;
    font-weight:bold;
}


		</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload File</title>
    
        <?php
		
			if(!empty($_POST))
			{
				$studentID = $_SESSION['user'];
				
				
					
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"Homework/" . $_FILES["file"]["name"]) ;


						

							
							
						
							$sql = "INSERT INTO submissions(homeworkTitle,teacherID,course,studentID,submissionURL) VALUES ('" . $_POST["title"] ."','" . $_POST["teacherID"] ."','" . $_POST["course_code"] . "','" . $_POST["user"] ."','" . 
							  $_FILES["file"]["name"] ."');";
						
							

						if (!mysqli_query($conn,$sql))
							echo('Error : ' . mysqli_error($conn));
						else
							  header ("Location:View-Homework.php");
							echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';






						
						//}
				
				
			}
        ?>
		
		
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
	   <div class="container home">
      <br>
		<h3><center> Dorëzo Detyrat </center> </h3> </font>

        <form id="form3" enctype="multipart/form-data" method="post" action="Assignment.php">
             <table class="table table-bordered" style="width: 50%;">         	
                <tr>
                    <td>	<label for="teach">teacher: </label>	</td>
                    <td>	
				 <?php  
				  $query = "SELECT 	teacherID FROM course";
					$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
					
					echo "<select name='teacherID'>";
					echo "<option value =''>Prof ID</option>";
					while ($row = mysqli_fetch_array($result)){
					  echo "<option value='" . $row['teacherID'] ."'>" . $row['teacherID'] ."</option>";
					}

					echo "</select>";
					?>

					</td>
                </tr>
				<tr>
                    <td>	<label for="Course1">Course: </label>	</td>
                    <td>
						   <?php  
					  $query = "SELECT 	course_code FROM course";
						$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
						
						echo "<select name='course_code'>";
						echo "<option value =''>kodi i kursit</option>";
						while ($row = mysqli_fetch_array($result)){
						  echo "<option value='" . $row['course_code'] ."'>" . $row['course_code'] ."</option>";
						}

						echo "</select>";
						?>
					</td>
                </tr>
                <tr>
                    <td valign="top" align="left">Title:</td>
                    <td valign="top" align="left">
				<?php  
				  $query = "SELECT title FROM homework";
					$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
					
					echo "<select name='title'>";
					echo "<option value =''>Titulli</option>";
					while ($row = mysqli_fetch_array($result)){
					  echo "<option value='" . $row['title'] ."'>" . $row['title'] ."</option>";
					}

					echo "</select>";
					?>
					</td>
                </tr>
                <tr>
                    <td><label for="file">File:</label></td>
                    <td><input type="file" name="file" id="file" 
                        title="Click here to select file to upload." required /></td>
                </tr>
                <tr>
                  
				   <td colspan="2" align="center">		    
				   <input type="submit" class="btn btn-primary" name="upload" id="upload" 
				   title="Click here to upload the file." value="Upload File" />
				   </td>
                </tr>
				        <tr>
                  
                       <input type="hidden" name="user" value=<?php echo $_SESSION['user'];?>>
                </tr>

            </table>
	
			
                     
			
</label>		
        </form>
		</div>



 <?php
 


?>



    </body>
</html>
