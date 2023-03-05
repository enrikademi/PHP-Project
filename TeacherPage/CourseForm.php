


<?php  

include "includes/teacherMenu.php";
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}

?>


<html>

<head>

<title>Add Course</title>

    <style type="text/css">
        .style1
        {
            height: 38px;
        }
        .style2
        {
            height: 33px;
        }
        .style3
        {
            height: 34px;
        }
        .style4
        {
            height: 83px;
        }
    </style>
</head>
<style type="text/css">
	
	 .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }
</style>

<div class="container">
<body>
  <br/><br/>

  <form action="addCourse.php" method="post" name="form1">
    <table width="50%" border="0">
    <tr> 
        <td class="style1">Kodi i kursit:</td>
        <td class="style1"><input type="text" name="code"></td>
      </tr>
      <tr> 
        <td class="style1">Titulli i kursit:</td>
        <td class="style1"><input type="text" name="title"></td>
      </tr>
      <tr> 
        <td class="style2">Libri i kursit:</td>
        <td class="style2"><input type="text" name="Book"></td>
      </tr>
      <tr> 
        <td class="style3">Semestri :</td>
        <td class="style3"><input type="text" name="Semester"></td>
      </tr>
      <tr> 
        <td class="style4">Pershkrimi i kursit:</td>
        <td class="style4"><textarea name="description" cols="27" rows="4"></textarea></td>
      </tr>
      <tr> 
        <td></td>
        <td><input type="submit" name="Submit" value="Shto">
        <a href="CourseInfo.php" class="btn btn-default" 
                        style="height: 30px; color: black; background-color: #E6E6E6;">Ndalo</a>
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
