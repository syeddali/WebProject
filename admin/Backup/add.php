<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$image= $_FILES['image']["name"]; 
	if($image!="")
	{
	move_uploaded_file($_FILES['image']['tmp_name'], '../img/uploads/'.$image); 
	}
	$loginId = $_SESSION['id'];
		
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, price, image, login_id) VALUES('$name','$qty','$price','$image', '$loginId')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>
