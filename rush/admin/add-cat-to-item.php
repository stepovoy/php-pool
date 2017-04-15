<?php
	require_once('../connect.php');
    require_once('isadmin.php');
    if (isadmin()) {
    	if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['name'] && $_POST['cat']) {
    		mysqli_query($conn, $sql);
    		$sql = "INSERT INTO list (item_id, cat_id)
    			VALUES ('" . $_POST['name'] . "', '" . $_POST['cat'] . "')";
    		mysqli_query($conn, $sql);
        	header('Location: index.php');
        	mysqli_close($conn);
    	}

    ?>
    <html><body>
        <form action="add-cat-to-item.php" method="POST">
            Item ID: <input type="text" name="name" value="" />
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