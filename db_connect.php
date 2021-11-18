<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'db_product_info';
$connection = mysqli_connect($servername,$username,$password);

if($connection){
        $db_select = mysqli_select_db($connection,$db_name);
        if($db_select){
            echo "Database is connected";
        }else{
            die('Database connection is failed'.mysqli_error($connection));
        }
}else{
        die('Database connection failed'.mysqli_error($connection));
    }

?>