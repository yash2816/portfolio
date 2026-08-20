<?php
include 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE product_id='$id'";
$result = mysqli_query($conn,$query);

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $product['product_name']; ?></title>

<style>

body{
    font-family:Arial;
    margin:0;
    padding:40px;
}

.product-container{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:50px;
}

.product-image img{
    width:100%;
    border-radius:10px;
}

.product-name{
    font-size:35px;
    font-weight:bold;
}

.price{
    font-size:30px;
    color:#000;
    margin:20px 0;
}

.description{
    color:#555;
    line-height:1.8;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:15px 35px;
    background:black;
    color:white;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="product-container">

    <div class="product-image">
        <img src="<?php echo $product['product_image']; ?>">
    </div>

    <div>

        <h1 class="product-name">
            <?php echo $product['product_name']; ?>
        </h1>

        <div class="price">
            ₹<?php echo number_format($product['product_price']); ?>
        </div>

        <p>
            Category:
            <?php echo $product['category']; ?>
        </p>

        <p>
            Type:
            <?php echo $product['subcategory']; ?>
        </p>

        <p class="description">
            <?php echo $product['description']; ?>
        </p>

        <a href="#" class="btn">
            Add To Cart
        </a>

        <a href="#" class="btn">
            Buy Now
        </a>

    </div>

</div>

</body>
</html>