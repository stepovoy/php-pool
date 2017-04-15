<?php
    session_start();
    require_once('connect.php');
    if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != "")
        echo 'Welcome, ' . $_SESSION['loggued_on_user'] . '! How are you?';
    else
        echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
    echo '<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Corrector Shop</title>
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
            <h2 class="last-correctors">
                LAST CORRECTORS:
            </h2>
            <div class="main-flex-wrap">';
    $sql = "SELECT * FROM items LIMIT 8";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            foreach (explode("\n", file_get_contents("1.txt")) as $value) {
                $exists = 0;
                if ($value == $row['name'])
                {
                    $exists = 1;
                    break;
                }
            }
            $url = "https://cdn.intra.42.fr/users/medium_" . $row['name'] . ".jpg";
            if ($exists) 
                $img_src = $url;
            else
                $img_src = "https://cdn.intra.42.fr/users/medium_llymar.jpg";
            echo '<div class="main-flex-elem">
                    <div class="shop-item">
                        <div class="img-wrap">
                            <img src="' . $img_src .'" alt=""
                                 class="person">
                        </div>
                        <h2 class="login">' . $row['name'] . '</h2>
                        <div class="price">
                            <p class="price-text">' . $row['price'] . ' UAH</p>
                            <div class="price-button">
                                <p class="buy">
                                    <form action="cart.php" method="GET">
                                        <input class="hid" type="text" name="name"  value="' . $row['name'] . '"/>
                                        <input class="hid" type="text" name="price"  value="' . $row['price'] . '"/>
                                        <input type="submit" name="submit" value="BUY" />
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "No items in shop yet :(";
    }
    echo '</div>
        </main>
        <footer class="footer">
            <div class="footer-content">
                <p class="footer-text">
                    FOOTER
                </p>
            </div>
        </footer>
    </body>
    </html>';
    mysqli_close($conn);
?>