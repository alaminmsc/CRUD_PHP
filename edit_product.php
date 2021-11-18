<?php
    $product_id = $_GET['x_id'];
    function select_product_info_by_id($product_id){
        require 'db_connect.php';
        $sql = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        if(mysqli_query($connection, $sql)){
            $resource_id = mysqli_query($connection, $sql);
            return $resource_id;
        }else{
            die('Query problem'.mysqli_error($connection));
        }

    }
    $resource_id = select_product_info_by_id($product_id);
    $product_info = mysqli_fetch_assoc($resource_id);

    //update statements
    if(isset($_POST['btn'])){
        function update_product_info($data){
            require 'db_connect.php';
            $sql = "UPDATE tbl_product SET product_name ='$data[product_name]',product_description ='$data[product_description]',product_price ='$data[product_price]' WHERE product_id='$data[product_id]'";
            if(mysqli_query($connection,$sql)){
                header('Location: view_product.php');
                echo "Updated";

            }else{
                die('Query Problem'.mysqli_error($connection));
            }

        }
        update_product_info($_POST);
    }


?>

<h1>Edit Product</h1>
<div style="text-align:center; margin-bottom:30px;">
    <a href="add_product.php">Add Product</a>
    <a href="view_product.php">View Product</a>
</div>
<form action="" method="post">

    <table align="center">
    <tr>
        <td>Product Name</td>
        <td><input type="text" name="product_name" value="<?php echo $product_info['product_name'];?>"></td>
        <td><input type="hidden" name="product_id" value="<?php echo $product_info['product_id'];?>"></td>
    </tr>
    <tr>
        <td>Product Description</td>
        <td><textarea name="product_description" id="" cols="22" rows="4"><?php echo $product_info['product_description'];?></textarea></td>
    </tr>
    <tr>
        <td>Product Price</td>
        <td><input type="number" name="product_price" value="<?php echo $product_info['product_price'];?>"></td>
    </tr>
    <tr>
       <td></td>
       <td><input type="submit" name="btn" value="Update Product"></td>
    </tr>
</table>
</form>