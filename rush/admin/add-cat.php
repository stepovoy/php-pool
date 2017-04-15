<?php
	require_once('../connect.php');
    require_once('isadmin.php');
	if (isadmin($_POST['name'])) {
		if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['name']) {
			$match = 0;
			$sql = "SELECT * FROM categories";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
			        if ($row['name'] == $_POST['name']) {
						echo "Category exists already<br/>";
			        	$match = 1;
			        	break;
			        }
			    }
			}
			if (!$match) {
				$sql = "INSERT INTO categories (name)
				VALUES ('" . $_POST['name'] . "')";
				mysqli_query($conn, $sql);
				echo "SUCCESS<br/>";
	        	header('Location: index.php');
	        	mysqli_close($conn);
			}
		}

	?>
	<html><body>
	    <form action="add-cat.php" method="POST">
	        Category name: <input type="text" name="name" value="" />
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