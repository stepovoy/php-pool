<?php
	require_once('../connect.php');
    require_once('isadmin.php');
	if (isadmin($_POST['name'])) {
		if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['name']) {
			$match = 0;
			$sql = "SELECT * FROM categories WHERE name='".$_POST['name']."'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
			        if ($row['name'] == $_POST['name']) {
						$sql = "DELETE FROM categories WHERE cid=".$row['cid'];
						if (mysqli_query($conn, $sql))
						{
							echo "category deleted!";
						}
						else
						{
							echo "Error deleting record: " . mysqli_error($conn);
							echo "something go wrong, look in your shitcode or in phpmyadmin :)";
						}
			        	$match = 1;
			        	break;
			        }
			    }
			}
			else
				echo "no such category";
		}

	?>
	<html><body>
	    <form action="del-cat.php" method="POST">
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