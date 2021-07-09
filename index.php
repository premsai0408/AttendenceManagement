<?php
require 'connet.php';


?>

<!DOCTYPE html>
<html>
<head>
<title>
Login page</title>
 </head>
 <link rel="stylesheet" href="css/style.css">
 <body style= "background-color: #D0D3D4">
	<div id="main" >

		<center>
			<h2>NIT Andhra Pradesh</h2>
			<h3>Login</h3>
			<img src ="images/NIT_Andhra_Pradesh.png" class="img"/>
			
		</center>
	<form action="index.php" method="post"class="form">
	<label name="user" for="user">Choose a User:</label>

<select id="user">
  <option value="NULL">--select--</option>
  <option value="Admin">Admin</option>
  <option value="Student">Student</option>
  <option value="Lecture">Lecture</option>
  <option value="Warden">Warden</option>
</select><br>
	<label>Username:</label><br>
	<input name= "username"type="text" class="inputvalues" placeholder ="Type your Username" required/><br>
	<label>Password:</label><br>
	<input name= "password" type="password" class="inputvalues" placeholder ="Type your password"required/><br>
	<input name="submit" type="submit" id="submit" value ="Login"/>
	</form>
	<?php
	$username=$_POST["username"];
	$password=$_POST["password"];
	if(isset($_POST['Submit'])) 
	{
  $var = $_POST['user'];
  $errorMessage = "";
  
  if(empty($var)) 
  {
    $errorMessage = "<li>You forgot to select a country!</li>";
  }
  
  if($errorMessage != "") 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 
  else 
  {  $redir=" ";
$query=" ";
    switch($var)
    {
      case "Admin": $redir = "Admin.php";
		$query="select * from Admin where Aid='$username' and password ='$password';" 
	  break;
      case "Student": $redir = "Student.php";
	$query="select * from Student where Rollno='$username' and password ='$password';"	  break;
      case "Lecture": $redir = "Teacher.php";
	$query="select * from teacher where Tid='$username' and password ='$password';"	  break;
      case "Warden": $redir = "Warden.php";
	$query="select * from Warden where Wid='$username' and password ='$password';"	  break;
      default: echo("Error!"); exit(); break;
	}
	header("Location: $redir");
	}}
	?>
	</div>

 </body>
 </html>