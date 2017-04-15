<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your cart</title>
</head>
<body>
<header class="main-header">
    <div class="left-header-part">
        <h1 class="header-main-text">
            CORRECTOR SHOP
        </h1>
    </div>
    <div class="right-header-part">
        <div class="menu">

        </div>
    </div>
</header>
<main class="main">
    <div class="cart-name">
        <h2>
            YOUR CART:
        </h2>
    </div>
    <div class="main-flex-wrap">

<?php
    session_start();
    require_once('connect.php');
    if ($_SESSION['loggued_on_user']) {
    	if ($_GET['name'] && $_GET['submit'] == "BUY") {
    		foreach ($_SESSION['orders'] as $order) {
    			if ($order[0] == $_GET['name']) {
    				echo 'This item is already in your cart.';
    				$exists = 1;
    				break;
    			}
	    	}
	    	if (!$exists) {
				$_SESSION['orders'][] = array ($_GET['name'], $_GET['price']);
				$_SESSION['sum'] += $_GET['price'];
	    	}
    	}
        foreach ($_SESSION['orders'] as $order) {
            foreach (explode("\n", file_get_contents("1.txt")) as $value) {
                $exists = 0;
                if ($value == $order[0])
                {
                    $exists = 1;
                    break;
                }
            }
            $url = "https://cdn.intra.42.fr/users/medium_" . $order[0] . ".jpg";
            if ($exists) 
                $img_src = $url;
            else
                $img_src = "https://cdn.intra.42.fr/users/medium_llymar.jpg";
            echo '<div class="main-flex-elem">
                <div class="shop-item">
                    <div class="img-wrap">
                        <img src="' . $img_src . '" alt=""
                             class="person">
                    </div>
                    <div class="order-info">
                        <h2 class="login">' . $order[0] . '</h2>
                        <p class="price-text">' . $order[1] . ' UAH</p>
                    </div>
                </div>
            </div>';
        }
    }
    else
    	echo 'You are not logged in. To make purchases please <a href="login.php">log in</a> first.';
?>

        
    </div>
    <div class="checkout">
        <p class="total">
            Total sum: <?php echo $_SESSION['sum'] . " UAH"; ?>
        </p>
        <form action="checkout.php" class="checkout" method="GET">
            <input type="submit" name="submit" value="Checkout">
        </form>
        <form action="index.php" class="checkout">
            <input type="submit" name="" value="Back to shopping!">
        </form>

    </div>
</main>
</body>
</html>