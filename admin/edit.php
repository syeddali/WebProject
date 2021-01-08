<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$oldimg = $_POST['image'];
	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];	
	$image= $_FILES['image']["name"]; 
	if($image!="")
	{
	move_uploaded_file($_FILES['image']['tmp_name'], '../img/uploads/'.$image); 
	}else{
		$image=$oldimg;
	}
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)|| empty($image)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}	
		if(empty($image)) {
			echo "<font color='red'>Image field is empty.</font><br/>";
		}	
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE `crud_with_login`.`products` SET name='$name', qty='$qty', price='$price' , image='$image' WHERE id='$id' ");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST"){
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM `crud_with_login`.`products` WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$qty = $res['qty'];
	$price = $res['price'];
	$image = $res['image'];

}
// }
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	
	<form name="form1" method="POST" action="edit.php" enctype="multipart/form-data">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Image</td>
				<td><input type="file" name="image" value="<?php echo $image;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id']?>"></td>
				<td><input type="hidden" name="image" value="<?php echo $image;?>"></td>
				
			</tr>
			<tr >
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
