<?php
// -----------------------------------------------------------------------------
// 1. Ping MYSQL Server

$conn = mysqli_connect($fh['db_addr'], $fh['db_user'], $fh['db_pass'],null,$fh['db_port']);
if (!$conn = mysqli_connect($fh['db_addr'], $fh['db_user'], $fh['db_pass'],null,$fh['db_port'])) {
	$_SESSION['err_setup'] = '<p class="alert alert-danger">Could not connect to MYSQL: '.$fh['db_addr'] . '</p>';
	redirectTo('install.php');
}

// -----------------------------------------------------------------------------
// 2. Create database

$create_db = "CREATE DATABASE {$fh['db_name']};";
if (!mysqli_query($conn,  $create_db)) {
	$_SESSION['err_setup'] = '<p class="alert alert-danger">Could not create database: '.$fh['db_name'] . '</p>';
	redirectTo('install.php');
}

$connect_db = "USE {$fh['db_name']};";
if (!mysqli_query($conn,  $connect_db)) {
	$_SESSION['err_setup'] = '<p class="alert alert-danger">Could not connect to database: '.$fh['db_name'] . '</p>';
	redirectTo('install.php');
}

// -----------------------------------------------------------------------------
// 3. Create tables

$table_users = "CREATE TABLE users (id INT(6) NOT NULL auto_increment, name VARCHAR(15), surname VARCHAR(32), password VARCHAR(40), PRIMARY KEY (id) );";
if (!mysqli_query($conn,  $table_users)) {
	$_SESSION['err_setup'] = '<p class="alert alert-danger">Could not create table users in '.$fh['db_name'] . ' DB</p>';
	redirectTo('install.php');
}

// -----------------------------------------------------------------------------
// 4. Insert data

$insert_users = "INSERT INTO users VALUES('', 'admin', 'admin', MD5('admin')),('', 'Scarlett', 'Johansson', MD5('qwerty'));";
if (!mysqli_query($conn,  $insert_users)) {
	$_SESSION['err_setup'] = '<p class="alert alert-danger">Could not insert into users table in '.$fh['db_name'] . ' DB</p>';
	redirectTo('install.php');
}

// -----------------------------------------------------------------------------
// 4. Save config file
$configFilePath = ROOT_DIR . 'conf/config.ini';
$configContent = "
[Server]
wi_user = {$fh['wi_user']}
wi_pass = {$fh['wi_pass']}

[Database]
db_addr = {$fh['db_addr']}
db_name = {$fh['db_name']}
db_user = {$fh['db_user']}
db_pass = {$fh['db_pass']}";
file_put_contents($configFilePath, $configContent);



// -----------------------------------------------------------------------------
// 5. Done

$_SESSION['err_setup'] = '<p class="alert alert-success"><i class="fa fa-check fa-lg"></i> Database successfully created <br><br><b>Remember your credentials: pug - pug<br><br><a href="login.php" role="button" class="btn btn-success btn-block">Login</a></b></p>';
redirectTo('install.php');


?>
