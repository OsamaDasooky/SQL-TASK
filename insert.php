<?php
// include database connection file
require_once 'dbconfig.php';
if(isset($_POST['insert']))
{

// Posted Values  
$CarName=$_POST['CarName'];
$Model=$_POST['Model'];
$Image=$_POST['Image'];
$Price=$_POST['Price'];
$color=$_POST['color'];

// Query for Insertion
$sql="INSERT INTO tblusers(CarName,Model,Image,Price,color) VALUES(:fn,:ln,:eml,:cno,:adrss)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$CarName,PDO::PARAM_STR);
$query->bindParam(':ln',$Model,PDO::PARAM_STR);
$query->bindParam(':eml',$Image,PDO::PARAM_STR);
$query->bindParam(':cno',$Price,PDO::PARAM_STR);
$query->bindParam(':adrss',$color,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using PDO Extension  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
  <div class="col-md-12">
    <h3>Insert Record | PHP CRUD Operations using PDO Extension</h3>
    <hr />
  </div>
</div>


<form name="insertrecord" method="post">
  <div class="row">
    <div class="col-md-4"><b>Car Name</b>
      <input type="text" name="CarName" class="form-control" required>
    </div>
    <div class="col-md-4"><b>Model</b>
      <input type="text" name="Model" class="form-control" required>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4"><b>Image</b>
      <input type="url" name="Image" class="form-control" required>
    </div>
    <div class="col-md-4"><b>Price</b>
      <input type="text" name="Price" class="form-control" maxlength="10" required>
    </div>
  </div>  

  <div class="row">
    <div class="col-md-4"><b>color</b>
      <input type="text" name="color" class="form-control" maxlength="10" required>
    </div>
  </div>  

  <div class="row" style="margin-top:1%">
  <div class="col-md-8">
  <input type="submit" name="insert" value="Submit">
  </div>
  </div> 
  
</form>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="3318815534"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>            
</div>
</div>
</body>
</html>