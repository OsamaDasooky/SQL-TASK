<?php
// include database connection file
require_once 'dbconfig.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$CarName=$_POST['CarName'];
$Model=$_POST['Model'];
$Image=$_POST['Image'];
$Price=$_POST['Price'];
$color=$_POST['color'];

// Query for Query for Updation
$sql="update tblusers set CarName=:fn,Model=:ln,Image=:eml,Price=:cno,color=:adrss where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$CarName,PDO::PARAM_STR);
$query->bindParam(':ln',$Model,PDO::PARAM_STR);
$query->bindParam(':eml',$Image,PDO::PARAM_STR);
$query->bindParam(':cno',$Price,PDO::PARAM_STR);
$query->bindParam(':adrss',$color,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
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
<h3>Update Record | PHP CRUD Operations using PDO Extension</h3>
<hr />
</div>
</div>

<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT CarName,Model,Image,Price,color,PostingDate,id from tblusers where id=:uid";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{               
?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Car Name</b>
<input type="text" name="CarName" value="<?php echo htmlentities($result->CarName);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Model</b>
<input type="text" name="Model" value="<?php echo htmlentities($result->Model);?>" class="form-control" required>
</div>
</div>

<div class="row">
<div class="col-md-4"><b>Image</b>
<input type="url" name="Image" value="<?php echo htmlentities($result->Image);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Price</b>
<input type="text" name="Price" value="<?php echo htmlentities($result->Price);?>" class="form-control" maxlength="10" required>
</div>
</div>  



<div class="row">
<div class="col-md-4"><b>color</b>
    <input type="text" name="color" class="form-control" maxlength="10" value="<?php echo htmlentities($result->color);?>" required>
</div>
</div>  
<?php }} ?>

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div> 
     </form>
            
      
	</div>
</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- textaddneww -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-8906663933481361"
     data-ad-slot="3318815534"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</htm