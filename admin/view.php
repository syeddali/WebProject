<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM `crud_with_login`.`products` WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
    <style>
    	.pimg img{
	    width: 70px;
	    height: 70px;
	}

    </style>
</head>
<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
	<br><br>
	<table style="text-align: center; width:80%;  " class="tb">
		<tr bgcolor='#CCCCCC'>
			<td>Price</td>
			<td>Name</td>
			<td>Quantity</td>
			<td>Images (euro)</td>
			<td>Action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {	

			?>
			<tr>
			<td> <?php echo $res["price"]?></td>
			<td> <?php echo $res["name"]?></td>
			<td> <?php echo $res["qty"]?></td>
			<td class="pimg"><img src="../img/uploads/<?=$res['image']?>"></td>
			<td><a href="edit.php?id=<?=$res['id']?>">Edit</a> | 
				<a href="delete.php?id=<?=$res['id']?>" onClick="return confirm('Are you sure you want to delete?')" >Delete</a></td>
			</tr>	

		<?php
		}
		?>
		
	</table>
		
</body>
</html>
