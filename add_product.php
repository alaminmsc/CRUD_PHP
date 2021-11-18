<?php
    echo '<pre>';
    echo print_r($_POST);

    if(isset($_POST['btn'])){

        function save_product($data){

            require 'db_connect.php'; //db_connection

            //insert query
            $sql = "INSERT INTO tbl_product (product_name,product_description,product_price) 
                    VALUES ('$data[product_name]','$data[product_description]','$data[product_price]')";

            if(mysqli_query($connection,$sql)){
                $message = "Product info save successfully";
                return $message;
            }else{
                die("Query problem".mysqli_error($connection));
            }
    }
    $message = save_product($_POST);
}
?>


<div style="text-align:center; margin-bottom:30px;">
    <a href="add_product.php">Add Product</a>
    <a href="view_product.php">View Product</a>
</div>
<form action="" method="post">
        <h1><?php if(isset($message)) {echo $message;}  ?></h1>
        <table align="center">
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="product_name"></td>
        </tr>
        <tr>
            <td>Product Description</td>
            <td><textarea name="product_description" id="" cols="22" rows="4"></textarea></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td><input type="number" name="product_price"></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" name="btn" value="Save Product"></td>
        </tr>
    </table>
</form>