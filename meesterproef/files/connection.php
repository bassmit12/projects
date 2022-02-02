<?php
$username = "root"; #Username from the admin account from the MySQL database (standard is root)
$pass = ""; #Password from the admin account from the MySQL database (standard is blank)
$host = "localhost"; #The hostname for the MySQL database
$db_name = "ethernet"; #The name of the database (seen in localhost/phpmyadmin)
$con = mysqli_connect ($host, $username, $pass);
$db = mysqli_select_db ( $con, $db_name );
?>