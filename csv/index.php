<?php


$connect = mysqli_connect("localhost", "root", "root", "csv");
$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $description = mysqli_real_escape_string($connect, $data[0]);
    $firstName = mysqli_real_escape_string($connect, $data[1]);  
                $lastName = mysqli_real_escape_string($connect, $data[2]);
    $birthDay = mysqli_real_escape_string($connect, $data[3]);
    $query = "
     UPDATE list 
     SET firstName = '$firstName', 
     lastName = '$lastName', 
     birthDay = '$birthDay' 
     WHERE description = '$description'
    ";
    mysqli_query($connect, $query);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Updation Done</label>';
}

$query = "SELECT * FROM list";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Update Mysql Database </title>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Table</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(CSV)</label>
    <input type="file" name="file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">Table</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>firsrName</th>
      <th>lastName</th>
      <th>birthDay</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["firstName"].'</td>
       <td>'.$row["lastName"].'</td>
       <td>'.$row["birthDay"].'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
  </div>
 </body>
</html>

