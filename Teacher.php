<?php
require( "connet.php");
session_start();
$Tid=$_SESSION["use"];
$result = mysqli_query($con,"select Cid from class where Tid='$Tid'");  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>FACULTY HOME PAGE</title>
  </head>
  <body>
<h1 align=center> NIT ANDHRAPRADESH</h1>
<form method="post">
<div class="dropdown">
<label  for="user">Choose a Course:</label>
  <select name="user" >
  <option value="">--Select--</option>
  <?php 
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
echo '
<option value="'.$row['Cid'].'">'.$row['Cid'].'</option>';
} ?>
</select>
<input name="submit" type="submit" id="submit" value ="OK"/>
  <button name="log" align="center" type="submit" class="btn btn-dark">Logout</button>

</div>
</form>
<?php
if(isset($_POST['log']))
		header("Location: index.php");
if(isset($_POST['submit'])) 
	{
  $var = $_POST["user"];
  $errorMessage = "";
   echo $var;
  if(empty($var)) 
  {
    $errorMessage = "<li>You forgot to select a course!</li>";
  }
  
  if($errorMessage != "") 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 
  else 
  {  $result = mysqli_query($con,"select Cid from class where Tid='$Tid'"); 
	while($ro = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    if($var==$ro['Cid']){
		$_SESSION["Cid"]=$ro['Cid'];
	header("Location:attend.php");}}}}

?>


<br>
<br>
<br>
<br>
<br>
<br>
<form method="post">
<button name="above"type="submit" class="btn btn-success btn-lg"> >80 PERCENT</button>
<button name="below" type="submit" class="btn btn-danger btn-lg"> <80 PERCENT</button>

  <div class="form-group">
    <label for="exampleInputEmail1">ROLL NO</label>
    <input name="no" type="ROLLNO" class="form-control" id="examplerollno" aria-describedby="rollnohelp">
    
  </div>
  
  <div class="form-group form-check">
    <input  type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button name="search"  type="submit" class="btn btn-primary">Search</button>
</form>

<?php
$result=" ";
if(isset($_POST['search'])) {
	$no=$_POST['no'];
	$result = mysqli_query($con,"select * from per where rollno='$no'group by rollno");
}
if(isset($_POST['above']))
$result=mysqli_query($con,"select * from per where percentage >=80 group by rollno");
if(isset($_POST['below']))
$result=mysqli_query($con,"select * from per where percentage < 80 group by rollno");
if($result!=" "){
	?>
	<br>
<br>
<div>
<table style="width:100%">
  <tr>
    <th>ROLLNO</th>
	<th> NAME</th>
    <th>COURSE </th>
    <th>Attended classes</th>
    <th>Attendencepercent</th>
  </tr><?php
	while($cdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>

  <tr>
       <td><?php echo $cdata['rollno']; ?></td>
       <td><?php  $r=mysqli_query($con,"select name from student where Rollno= {$cdata['rollno']}");if( $d = mysqli_fetch_array($r,MYSQLI_ASSOC))  echo $d['name']; ?></td>
       <td><?php echo $cdata['Cid']; ?></td>
       <td><?php echo $cdata['total']; ?></td>
       <td><?php echo $cdata['percentage']; ?></td>
     </tr>
	 </table>
</div>
<?php  } }?>


 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    


    
  </body>

</html>