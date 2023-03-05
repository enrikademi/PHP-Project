<?php
include('databaseConnection.php');
$IDError=$PasswordError=true;
$type='';
$IDM='';


if(isset($_POST['ID']))
{
$ID=mysqli_real_escape_string($conn, $_POST['ID']);
$ID = test_input($ID);
$query=mysqli_query($conn, "SELECT * FROM Teacher WHERE ID='$ID'");
$row=mysqli_num_rows($query);
$query2=mysqli_query($conn, "SELECT * FROM Student WHERE ID='$ID'");
$row2=mysqli_num_rows($query2);
if($row==0&&$row2==0&&strlen($ID) >= 6&&preg_match("/^[1-9][0-9]*$/",$ID))
{
$IDM = 'Available';
$IDError=true;
}
else if(empty($ID)) {
echo "<span style='color:red;'>Shtyp ID</span>";	
}
else if (!preg_match("/^[1-9][0-9]*$/",$ID)) {
echo "<span style='color:red;'>Ju lutem shtypni vetem numra !</span>";
}
else if(strlen($ID)<6)
{
echo "<span style='color:red;'>Me pak se 6 karaktere.</span>";
}
else
{
echo "<span style='color:red;'>Ekziston !</span>";
}

}

if(isset($_POST['Email']))
{
$Email=mysqli_real_escape_string($conn,$_POST['Email']);
$Email = test_input($Email);
$query=mysqli_query($conn,"SELECT * FROM Teacher WHERE Email='$Email'");
$row=mysqli_num_rows($query);
$query2=mysqli_query($conn,"SELECT * FROM Student WHERE Email='$Email'");
$row2=mysqli_num_rows($query2);
if($row==0&&$row2==0&&filter_var($Email,FILTER_VALIDATE_EMAIL))
{
echo "<span style='color:green;'>E vlefshme</span>";
$EmailError=true;
}
else if ( !filter_var($Email,FILTER_VALIDATE_EMAIL) ) {
	echo "<span style='color:red;'>Shtyp nje email valide!</span>";
	}
else
{
echo "<span style='color:red;'>Ekziston !</span>";
}
}

if(isset($_POST['Password']))
{
$Password=mysql_real_escape_string($_POST['Password']);
$Password = test_input($Password);
if(strlen($Password) >= 8)
{
echo "<span style='color:green;'>Shkelqyeshem</span>";
$pass= hash('ripemd160', $Password);
$PasswordError=true;
}
else{
echo "<span style='color:red;'>Me pas se 8 karaktere</span>";
}
}

if(isset($_POST['first_name']))
{
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$first_name=test_input($first_name);
if (preg_match("/^[a-zA-Z ]+$/",$first_name)){
$first_nameError=true;
}
else{
	echo "<span style='color:red;'>Emri duhet te permbaje shkronja dhe hapesire !</span>";
}
}

if(isset($_POST['last_name']))
{
$last_name=mysqli_real_escape_string($conn,$_POST['last_name']);
$last_name=test_input($last_name);
if (preg_match("/^[a-zA-Z ]+$/",$last_name)){
$last_nameError=true;
}
else{
	echo "<span style='color:red;'>Mbiemri duhet te permbaje shkronja dhe hapesire !</span>";
}
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
 
  return $data;
}

///


?>