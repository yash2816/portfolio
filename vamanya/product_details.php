<?php
session_start();
include 'db.php';

if(!isset($_GET['id']))
{
    header("Location: products.php");
    exit();
}

$product_id = $_GET['id'];

$query = "SELECT * FROM products WHERE product_id='$product_id'";
$result = mysqli_query($conn,$query);

$product = mysqli_fetch_assoc($result);

if(!$product)
{
    echo "Product Not Found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $product['product_name']; ?></title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f8f8f8;
}

/* NAVBAR */

.navbar{
    width:100%;
    background-color:bisque;
    padding:15px 25px;
    border-radius:0 0 25px 25px;
}

.logo{
    font-size:30px;
    color:#5a3400;
    text-align:center;
}

/* PRODUCT SECTION */

.product-container{
    width:90%;
    max-width:1200px;
    margin:40px auto;
    display:flex;
    gap:40px;
    flex-wrap:wrap;
}

.product-images{
    flex:1;
    min-width:350px;
}

.main-image{
    width:100%;
    height:500px;
    object-fit:cover;
    border-radius:20px;
    background:white;
    padding:10px;
}

.thumbnail-row{
    display:flex;
    gap:10px;
    margin-top:15px;
}

.thumbnail-row img{
    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:10px;
    cursor:pointer;
}

/* DETAILS */

.product-details{
    flex:1;
    min-width:350px;
    background:white;
    padding:30px;
    border-radius:20px;
}

.product-name{
    font-size:35px;
    color:#5a3400;
    margin-bottom:15px;
}

.price{
    font-size:30px;
    color:#b8860b;
    font-weight:bold;
    margin-bottom:20px;
}

.description{
    color:#555;
    line-height:1.8;
    margin-bottom:25px;
}

.detail-box{
    margin-bottom:15px;
    font-size:17px;
}

.stock{
    color:green;
    font-weight:600;
}

.add-cart-btn{
    width:100%;
    background:#b8860b;
    color:white;
    border:none;
    padding:15px;
    border-radius:10px;
    font-size:18px;
    cursor:pointer;
    margin-top:20px;
}

.add-cart-btn:hover{
    background:#9a6f09;
}

.footer{
    margin-top:40px;
    background:bisque;
    text-align:center;
    padding:15px;
    color:#5a3400;
}

</style>
</head>
<body>

<div class="navbar">
    <h1 class="logo">VAMANYA</h1>
</div>

<div class="product-container">

    <!-- IMAGES -->

    <div class="product-images">

        <img
        src="images/<?php echo $product['product_image']; ?>"
        class="main-image"
        id="mainImage">

        <div class="thumbnail-row">

            <img src="images/<?php echo $product['product_image']; ?>"
            onclick="changeImage(this.src)">

            <img src="images/<?php echo $product['product_image']; ?>"
            onclick="changeImage(this.src)">

            <img src="images/<?php echo $product['product_image']; ?>"
            onclick="changeImage(this.src)">

        </div>

    </div>

    <!-- DETAILS -->

    <div class="product-details">

        <h2 class="product-name">
            <?php echo $product['product_name']; ?>
        </h2>

        <div class="price">
            ₹<?php echo number_format($product['product_price'],2); ?>
        </div>

        <div class="description">
            <?php echo $product['product_description']; ?>
        </div>

        <div class="detail-box">
            <strong>Weight:</strong> 10 gm
        </div>

        <div class="detail-box">
            <strong>Material:</strong> Gold / Diamond
        </div>

        <div class="detail-box">
            <strong>Stock Status:</strong>

            <span class="stock">
                <?php
                if($product['stock_quantity'] > 0)
                {
                    echo "In Stock";
                }
                else
                {
                    echo "Out of Stock";
                }
                ?>
            </span>
        </div>

        <form action="add_to_cart.php" method="POST">

            <input
            type="hidden"
            name="product_id"
            value="<?php echo $product['product_id']; ?>">

            <button class="add-cart-btn">
                Add To Cart
            </button>

        </form>

    </div>

</div>

<div class="footer">
    © <?php echo date('Y'); ?> VAMANYA Jewellery. All Rights Reserved.
</div>

<script>

function changeImage(src)
{
    document.getElementById("mainImage").src = src;
}

</script>

</body>
</html>