<?php
require( "connet.php");
session_start();
$Aid=$_SESSION["use"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>EDIT ADMIN INFO</title>
  </head>
  <body>
 <div class="row justify-content-center">
    <div class="col-4">
    <h1>PLEASE SAVE AFTER EDITING YOUR INFO</h1>
    <form  method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1">retype new password</label>
    <input name="epassword" type="password" class="form-control" id="exampleInputPassword1">
  </div>
<div class="form-group">
    <label for="examplephoennumber">phone number</label>
    <input  name="phone" type="phoennumber" class="form-control" id="examplephonennumber" aria-describedby="phonenumberHelp">
</div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button  name="submit" type="submit" class="btn btn-primary">Save</button>
</form>
<?php
if(isset($_POST['submit'])) {
$email=$_POST["email"];
$password=$_POST["password"];
$epassword=$_POST["epassword"];
$phone=$_POST["phone"];
$query=" ";
if($email!=NULL){
$query="update admin set email='$email' where Aid='$Aid'";
$result = mysqli_query($con,$query);
}
if($password==$epassword){
$query="update admin set password='$password' where Aid='$Aid'";
$result = mysqli_query($con,$query);
}
if($phone!=NULL){
$query="update admin set ephone='$phone' where Aid='$Aid'";
$result = mysqli_query($con,$query);
}}

?>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>