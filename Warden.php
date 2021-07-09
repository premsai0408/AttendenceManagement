<?php
require( "connet.php");
session_start();
$Wid=$_SESSION["use"];
$result = mysqli_query($con,"select * from warden where Wid=$Wid");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$year=$row['year'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>attendance updation</title>
  </head>
  <body>
    <h1> <?php echo $year; ?> year </h1>
	<form method ="post">
    <p>date:</p>
	<input name= "date" type="date" class="inputvalues" placeholder ="Type date" required/><br>
     <ul class="list-group list-group-horizontal">
  <li class="list-group-item">name</li>
  <li class="list-group-item">Rollnumber</li>
  <li class="list-group-item">Regno</li>

</ul>
<?php
$result = mysqli_query($con,"select * from student where  year=$year");
$radio=0;
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$radio++;
?>
<ul class="list-group list-group-horizontal">
  <li class="list-group-item"><?php echo $row['name'];?></li>
  <li class="list-group-item"><?php echo $row['Rollno'];?></li><input type="hidden" name="stat_id[]" value="<?php echo $row['Rollno']; ?>">
  <li class="list-group-item"><?php echo $row['Regno'];?></li>
<div class="input-group mb-3">
  <label>Present</label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="1" >
         <label>Absent </label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="0" checked>
       </td>
  </div>
</ul>
<?php } ?>
<input name="submit" type="submit" id="submit" value ="Submit"/>
</form>

<?php 
try{
      
    if(isset($_POST['submit'])){
 $date=  $_POST['date'];
      foreach (array_combine($_POST['st_status'] ,$_POST["stat_id"]) as $st_status=>$i ) {
        
        $stat = mysqli_query($con,"insert into hostel values('$date','$i','$year','$st_status')");
		

      }

    }
  }
  catch(Execption $e){
  echo $e;
  }


?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>