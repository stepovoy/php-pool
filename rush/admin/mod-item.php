<?php
	require_once('../connect.php');
    require_once('isadmin.php');
	if (isadmin($_POST['name'])) {
		if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['name']) {
			$sql = "SELECT * FROM items WHERE name='" . $_POST['name'] . "'";
			$result = mysqli_query($conn, $sql);
			echo "Error deleting record: " . mysqli_error($conn);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				if ($_POST['newname']) {
					$sql = "UPDATE items SET name='" . $_POST['newname'] . "' WHERE cid=" . $row['cid'];
	            	mysqli_query($conn, $sql);
				}
				if ($_POST['price']) {
					$sql = "UPDATE items SET price='" . $_POST['price'] . "' WHERE cid=" . $row['cid'];
	            	mysqli_query($conn, $sql);
	            }
				echo "SUCCESS\n";
	   			header('Location: index.php');
	        	mysqli_close($conn);
			}
			else
				echo "ERROR\n";
		}
	?>
	<html><body>
	    <form action="mod-item.php" method="POST">
	        Item name: <input type="text" name="name" value="" />
	        <br />
	        New name: <input type="text" name="newname" value="" />
	        <br />
	        New price: <input type="text" name="price" value="" />
	        <br />
	        <input type="submit" name="submit" value="OK" />
	        <br />
	    	<a href="index.php">Back to admin</a>
	    </form>
	</body></html>
	<?php
	}
    else
        echo 'You are not admin. <a href="../index.php">Click here</a> to go to the shop';
?>