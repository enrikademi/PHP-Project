
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css">

<?Php
 include 'includes/user_check.php';
?>

<script type="text/javascript">
//AJAX #ID
$(document).ready(function(){
$("#ID").blur(function() {
var name = $('#ID').val();
if(name=="")
{
$("#disp").html("<span style='color:red;'>Enter ID</span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/user_check.php",
data: "ID="+ name ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});

//AJAX #Email
$(document).ready(function(){
$("#Email").blur(function() {
var name = $('#Email').val();
if(name=="")
{
$("#disp1").html("<span style='color:red;'>Sheno Email-en : </span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/user_check.php",
data: "Email="+ name ,
success: function(html){
$("#disp1").html(html);
}
});
return false;
}
});
});


//AJAX #Password
$(document).ready(function(){
$("#Password").blur(function() {
var name = $('#Password').val();
if(name=="")
{
$("#disp2").html("<span style='color:red;'>Sheno fjalekalimin: </span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/user_check.php",
data: "Password="+ name ,
success: function(html){
$("#disp2").html(html);
}
});
return false;
}
});
});

//AJAX #firstname
$(document).ready(function(){
$("#firstname").blur(function() {
var name = $('#firstname').val();
if(name=="")
{
$("#disp3").html("<span style='color:red;'>Sheno emrin: </span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/user_check.php",
data: "first_name="+ name ,
success: function(html){
$("#disp3").html(html);
}
});
return false;
}
});
});

//AJAX #lastname
$(document).ready(function(){
$("#lastname").blur(function() {
var name = $('#lastname').val();
if(name=="")
{
$("#disp4").html("<span style='color:red;'>Sheno mbiemrin: </span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/user_check.php",
data: "last_name="+ name ,
success: function(html){
$("#disp4").html(html);
}
});
return false;
}
});
});

//AJAX #phoneNo
$(document).ready(function(){
$("#Phone_Number").blur(function() {
var name = $('#Phone_Number').val();
if(name=="")
{
$("#disp6").html("<span style='color:red;'>Sheno numrin e telefonit: </span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/user_check.php",
data: "Phone_Number="+ name ,
success: function(html){
$("#disp6").html(html);
}
});
return false;
}
});
});

//AJAX submit
$(document).ready(function(){
$("#submit").click(function(){
var firstname = $("#firstname").val();
var lastname = $("#lastname").val();
var email = $("#Email").val();
var ID = $("#ID").val();
var password = $("#Password").val();
var type= $('input[name=type]:checked', '#myForm').val();
var Phone_Number = $("#Phone_Number").val();

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'first_name='+ firstname + '&last_name='+ lastname + '&Email='+ email + '&ID='+ ID+ '&Password='+ password + '&type='+ type + '&Phone_Number='+ Phone_Number;
$("#disp2").html(type);
if(firstname==''||lastname==''||email==''||ID==''||password==''||Phone_Number=='')
{
alert("Mbusheni te gjitha fushat !");
if(firstname=='')
$("#disp3").html("<span style='color:red;'>Sheno emrin: </span>");
if (lastname=='')
$("#disp4").html("<span style='color:red;'>Sheno mbiemrin: </span>");
if (email=='') 
$("#disp1").html("<span style='color:red;'>Sheno email-en: </span>");
if(ID=='')
$("#disp").html("<span style='color:red;'>Sheno ID: </span>");
if(password=='')
$("#disp2").html("<span style='color:red;'>Sheno fjalekalimin: </span>");
if(Phone_Number=='')
$("#disp6").html("<span style='color:red;'>Sheno numrin: </span>");
}
else
{
$("#disp2").html(type);
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "includes/insert.php",
data: dataString,
success: function(result){
alert(result);
window.location.href = "index.php";
}

});
}
return false;
});
});

</script>

</head>

<body>

  <div class="logo"></div>
  <div class="mid">
  <form id="myForm" action="" method="post">
<fieldset >
<legend>Register</legend>

    <center>

  first Name:
  <br><input type="text" id="firstname" name="firstname" placeholder="Sheno emrin: " size="25">
  <div id="disp3"></div><br>

  last Name:
  <br><input type="text" id="lastname" name="lastname" placeholder="Sheno mbiemrin: " size="25";>
  <div id="disp4"></div><br>
  Email Address:
  <br><input type="text" id="Email" name="email" maxlength="50" placeholder="Sheno email adresen: " size="25">
  <div id="disp1"></div><br>

   PhoneNo:
  <br><input type="text" id="Phone_Number" name="Phone_Number" placeholder="Sheno numrin: " size="25">
   <div id="disp6"></div><br>

  ID:
  <br><input type="text" id="ID" name="ID" placeholder="Sheno ID:" size="25">
   <div id="disp"></div><br>

  Password:
  <br><input type="password" id="Password" name="password" placeholder="Sheno fjalekalimin: " size="25">
  <div id="disp2"></div><br>

  <input type="radio" class="radioButton" name="type" value="Teacher"> Profesori
  <input type="radio" class="radioButton" name="type" value="Student" checked> Studenti
  <div id="disp5"></div><br>
  <button class="button" id="submit" type="submit" name="submit" ">Regjistrohu</button><br>
  <div id="dis"></div><br>
  <div>Je i regjistruar? <a href="index.php">Kycu ketu</a></div>
  </center>
</fieldset >
</form>
</div>



  </div>

  <footer>
    Powered by the best FIEK students.
  </footer>



</body>

</html>


