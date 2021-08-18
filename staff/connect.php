<?php
define('DB_SERVER', 'remotemysql.com');
define('DB_USER', '91GX8MWi6x');
define('DB_PASS' , 'chFVyt9d3n');
define('DB_NAME', '91GX8MWi6x');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);


if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
?>