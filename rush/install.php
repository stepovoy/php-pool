<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "111111";
$db_name = "shop";
$db_port = "8080";

$conn = mysqli_connect($db_host, $db_user, $db_pass, "", $db_port);
if (!$conn)
    die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
$sql = "CREATE DATABASE " . $db_name;
if (mysqli_query($conn, $sql))
    echo "Database created successfully";
else
    echo "Error creating database: " . mysqli_error($conn);

mysqli_close($conn);

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
if (!$conn)
    die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

$sql = "CREATE TABLE users (
uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
login VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
admin INT(1) DEFAULT '0',
reg_date TIMESTAMP
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table users: " . mysqli_error($conn);

$sql = "CREATE TABLE categories (
cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table categories: " . mysqli_error($conn);

$sql = "CREATE TABLE items (
iid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
price INT(6) DEFAULT '0' NOT NULL,
link VARCHAR(500) NOT NULL,
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table items: " . mysqli_error($conn);

$sql = "CREATE TABLE list (
lid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
item_id INT(6) NOT NULL, 
cat_id INT(6) NOT NULL
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table list: " . mysqli_error($conn);

$sql = "CREATE TABLE orders (
nid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user VARCHAR(30) NOT NULL,
sum INT(6) DEFAULT '0' NOT NULL,
order_date TIMESTAMP
)";
if (!mysqli_query($conn, $sql))
    echo "Error creating table orders: " . mysqli_error($conn);

mysqli_close($conn);
?>