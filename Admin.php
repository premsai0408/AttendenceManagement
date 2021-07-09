<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>ADMIN LOGIN</title>
  </head>
  <body>
    <h1 align=center>NIT ANDHRAPRADESH</h1>
    <h2 align=center>ADMIN</h2>
     <div class="btn-group" role="group" aria-label="Basic example">
  <button  name= "home" type="button" class="btn btn-primary">HOME</button>
  <button name= "logout" type="button" class="btn btn-secondary">LOGOUT</button>
  <button name= "edit"  type="button" class="btn btn-success">EDIT MY INFO</button>
  <?php  
	if(isset($_POST['logout'])){
	  header("Location: index.php");
	  }
	  if(isset($_POST['home']))
		header("Location: Admin.php");
	if(isset($_POST['edit'])){
		header("Location: Aedit.php");
	}
  
  ?>
</div>
<br>
<br>
<div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    REGISTER
  </button>
  <div class="dropdown-menu" aria-labelledby="REGISTER">
    <a class="dropdown-item" href="#">NEW STUDENT</a>
    <a class="dropdown-item" href="#">NEW FACULTY</a>
    
  </div>
</div>
<form>
  <div class="form-group">
  <label name="Sb" for="sb">Search by:</label>

<select id="sb">
  <option value="NULL">--select--</option>
  <option value="Name">Name</option>
  <option value="Rollno">Rollno</option>
  <option value="Branch">Branch</option>
  <option value="percentagea">percentage above</option>
  <option value="percentageb">percentage below</option>
</select><br>
    <input type="text" class="form-control" id="examplerollno" aria-describedby="rollnoHelp" >
   
  </div>
 <button type="submit" class="btn btn-secondary">Search</button>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

