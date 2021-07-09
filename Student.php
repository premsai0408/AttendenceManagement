<!DOCTYPE html>
<html>
<body>
<h1 style="color:green;">welcome to NIT ANDHRAPRADESH</h1>
<button type="button">LOGOUT</button>
<div style="background-color:black
;color:white;padding:20px;">
  
  <p>NAME:</p>
  <p>REG.NO:</p>
  <P>year:</p>
  <p>semester:</p>
  
</div> 
<div>
<table style="width:100%">
  <tr>
    <th>Roll.no</th>
    <th>subjectname</th>
    <th>Facultyname</th>
    <th>Subject</th>
    <th>Attendencepercent</th>
  </tr>

</table>
</div>

</body>
</html><!DOCTYPE html>
<html>
<body>
<h1 style="color:green;">welcome to NIT ANDHRAPRADESH</h1>
<button type="button">LOGOUT</button>
<?php  
	if(isset($_POST['logout'])){
	  header("Location: index.php");
	  }?>
<div style="background-color:black
;color:white;padding:20px;">
  
  <p>NAME:</p>
  <p>REG.NO:</p>
  <P>year:</p>
  <p>semester:</p>
  
</div> 
<div>
<table style="width:100%">
  <tr>
    <th>Course</th>
	<th>Course Name</th>
    <th>Total classes</th>
    <th>Attended classes</th>
    <th>Attendencepercent</th>
  </tr>
   <?php

     $i=0;
	$per=0;
     $all_query = mysql_query("select Cid,name from Course where year = '$year' and sem='$sem' order by Cid asc");
	 $query =  mysql_query("select Cid,noofclass,tclass from noofclass where rollno = '$Rollno'  order by Cid asc");
     while ($data = mysql_fetch_array($all_query)&&$cdata=mysql_fetch_array($query) {
       $i++;
	   $per=$cdata['noofclass']/ $data['tclass'];
	   $per=$per*100

     ?>
	   <tr>
       <td><?php echo $data['Cid']; ?></td>
       <td><?php echo $data['name']; ?></td>
       <td><?php echo $cdata['noofclass']; ?></td>
       <td><?php echo $data['tclass']; ?></td>
       <td><?php echo $per; ?></td>
     </tr>

     <?php 
          } 
             
      ?>


</table>
</div>

</body>
</html>