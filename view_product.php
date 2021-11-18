<?php

    if(isset($_GET['status'])){
        $product_id = $_GET['product_id'];
        function delete_product_info($product_id){
            require 'db_connect.php';
            $sql = "DELETE FROM tbl_product Where product_id='$product_id'";
            if(mysqli_query($connection,$sql)){
                $message = "Product info deleted successfully";
                return $message;

            }else{
                die('Query problem'.mysqli_error($connection));
            }

        }
        $message = delete_product_info($product_id);
    }

    //view_product
    function view_product($data){
        require 'db_connect.php';        
        
        $sql = "SELECT * FROM tbl_product";
        if(mysqli_query($connection,$sql)){
           $resource_id = mysqli_query($connection,$sql);
           return $resource_id;
        }else{
            die("Query problem".mysqli_error($connection));
        }
    }
    $resource_id = view_product($_POST);

?>
<div style="text-align:center; margin-bottom:30px;">
    <a href="add_product.php">Add Product</a>
    <a href="view_product.php">View Product</a>
</div>
<h1 style="text-align:center;">All Product information</h1>
<h2 style="text-align:center;"><?php if(isset($message)) {echo $message; }?></h2>
<table border="1" align="center" width="900">
    <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price</th>
        <th>Action</th>
    </tr>
    <?php while($product_info = mysqli_fetch_assoc($resource_id)) { ?>
    <tr>
        <td><?php echo $product_info['product_id']; ?></td>
        <td><?php echo $product_info['product_name']; ?></td>
        <td><?php echo $product_info['product_description']; ?></td>
        <td><?php echo $product_info['product_price']; ?></td>
        <td>
            <a href="edit_product.php?x_id=<?php echo $product_info['product_id'];?>">Edit</a>  
            <a href="?status=delete&product_id=<?php echo $product_info['product_id'];?>">Delete</a>
        </td>
    </tr>
    <?php }?>
</table>