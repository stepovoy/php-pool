<?php
	require_once('../connect.php');
    require_once('isadmin.php');
	if (isadmin($_POST['name'])) {
		if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['name']) {
			$match = 0;
			$sql = "SELECT * FROM items";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
			        if ($row['name'] == $_POST['name']) {
						echo "Item exists already<br/>";
			        	$match = 1;
			        	break;
			        }
			    }
			}
			if (!$match) {
				if ($_POST['price'] && $_POST['price'] != "") {
					$sql = "INSERT INTO items (name, price)
					VALUES ('" . $_POST['name'] . "', '" . $_POST['price'] . "')";
				}
				else {
					$sql = "INSERT INTO items (name)
					VALUES ('" . $_POST['name'] . "')";
				}
				mysqli_query($conn, $sql);
				$sql = "INSERT INTO list (item_id, cat_id)
					VALUES ('" . $_POST['name'] . "', '" . $_POST['cat'] . "')";
				mysqli_query($conn, $sql);
				echo "SUCCESS<br/>";
	        	header('Location: index.php');
	        	mysqli_close($conn);
			}
		}
	?>
	<html><body>
	    <form action="add-item.php" method="POST">
	        Item name: <input type="text" name="name" value="" />
	        <br />
	        Item price: <input type="text" name="price" value="" />
	        <br />
	        Category ID: <input type="text" name="cat" value="" />
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