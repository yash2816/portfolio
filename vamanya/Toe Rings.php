<?php
session_start();
include 'db.php';
if(!isset($_SESSION['customer_id']))
{
    header("Location: customer_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vamanya Jewellery - Toe Rings Collection</title>
    </head>
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f8f5ef;
        }

        .navbar{
            width:100%;
            background:#c39b34;
            padding:15px 25px;
            box-sizing:border-box;
            border-radius:0 0 25px 25px;
            display:flex;
            flex-direction:column;
            gap:15px;
        }
        .nav-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .nav-menu{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:25px;
            flex-wrap:wrap;
            background:white;
            padding:12px;
            border-radius:20px;
        }

        .nav-menu div{
            cursor:pointer;
            font-weight:600;
            transition:0.3s;
        }

        .nav-menu div:hover{
            color:brown;
        }

        .logo{
            margin:0;
            font-size:30px;
            color:black;
        }   

        .collection h2{
            text-align:center;
            margin:30px 0;
            color:#5a3400;
            font-size:28px;
        }

        .products-container{
            width:90%;
            margin:auto;
            display:grid;
            grid-template-columns: repeat(4, 1fr);
            gap:20px;
            padding-bottom:40px;
        }
        .product-card{
            background:white;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
            width:350px;
            padding:20px;
        }

        .product-card img{
            width:100%;
            height:250px;
            object-fit:contain;
        }

        .product-info{
            padding:15px;
        }

        .product-name{
            font-size:18px;
            font-weight:600;
            color:#5a3400;
        }

        .category{
            margin-top:8px;
            color:#777;
        }

        .product-price{
            margin-top:8px;
            font-size:20px;
            color:#c39b34;
            font-weight:bold;
        }

        .view-btn,
        .add-cart-btn{
            width:100%;
            margin-top:10px;
            padding:10px;
            border:none;
            color:white;
            border-radius:8px;
            cursor:pointer;
            font-size:14px;
            font-weight:600;
        }

        .view-btn{
            background:#5a3400;
        }

        .add-cart-btn{
            background:#c39b34;
        }
        .category-buttons{
            display:flex;
            justify-content:center;
            gap:15px;
            flex-wrap:wrap;
            margin-bottom:40px;
        }

        .category-buttons button{
            padding:10px 25px;
            border:none;
            border-radius:25px;
            background:#d4af37;
            color:white;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        .category-buttons button:hover{
            background:#b8860b;
        }
        </style>
    <body>
        <div class="navbar">

    <div class="nav-top">
        <h1 class="logo">VAMANYA | Welcome,
            <?php echo $_SESSION['customer_name']; ?>
        </h1>
    </div>

    <div class="nav-menu">
                <div onclick="go('customer_dashboard.php')">
                    Dashboard
                </div>
                <div onclick="go('customer_profile.php')">
                    👤 My Profile
                </div>
                <div onclick="go('Cart.php')">
                    🛒 Cart
                </div>
                <div onclick="go('My_orders.php')">
                    📦 My Orders
                </div>
                <div onclick="go('products.php')">
                    💎 Shop Products
                </div>
                <div onclick="go('customer_logout.php')">
                    Logout
                </div>

            </div>
</div>
        <div class="collection">
            <h2>Our Toe Rings Collection</h2>
            <div class="category-buttons">
                <a href="products.php"><button>All</button></a>
                <a href="Rings.php"><button>Ring</button></a>
                <a href="Necklaces.php"><button>Necklace</button></a>
                <a href="Earrings.php"><button>Earrings</button></a>
                <a href="Chains.php"><button>Chain</button></a>
                <a href="Bracelets.php"><button>Bracelet</button></a>
                <a href="Toe Rings.php"><button>Toe Ring</button></a>                
                <a href="Anklets.php"><button>Anklet</button></a>
            </div>
            <div class="products-container">
                <!-- Product 1 -->
                <div class="product-card">
                    <img src="images/Toe Rings/Minimalist Gold Toe Ring.jpg" alt="Minimalist Gold Toe Ring">
                    <div class="product-info">
                        <div class="product-name">Minimalist Gold Toe Ring</div>
                        <div class="product-price">₹1,500</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <img src="images/Toe Rings/Twin Flower Toe Rings.jpg" alt="Twin Flower Toe Rings">
                    <div class="product-info">
                        <div class="product-name">Twin Flower Toe Rings</div>
                        <div class="product-price">₹3,000</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <img src="images/Toe Rings/Leafy Silver Toe Ring.jpg" alt="Leafy Silver Toe Ring">
                    <div class="product-info">
                        <div class="product-name">Leafy Silver Toe Ring</div>
                        <div class="product-price">₹5,000</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card">
                    <img src="images/Toe Rings/Lotus Silver Toe Ring.jpg" alt="Lotus Silver Toe Ring">
                    <div class="product-info">
                        <div class="product-name">Lotus Silver Toe Ring</div>
                        <div class="product-price">₹2,000</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="product-card">
                    <img src="images/Toe Rings/Silver Enamel Spring Toe Ring.jpg" alt="Silver Enamel Spring Toe Ring">
                    <div class="product-info">
                        <div class="product-name">Silver Enamel Spring Toe Ring</div>
                        <div class="product-price">₹4,000</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-card">
                    <img src="images/Toe Rings/Sterling Silver Antique  Heart Toe Ring.jpg" alt="Sterling Silver Antique Heart Toe Ring">
                    <div class="product-info">
                        <div class="product-name">Sterling Silver Antique Heart Toe Ring</div>
                        <div class="product-price">₹3,500</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="product-card">
                    <img src="images/Toe Rings/ZALKARI Braided Silver Toe Rings.jpg" alt="ZALKARI Braided Silver Toe Rings">
                    <div class="product-info">
                        <div class="product-name">ZALKARI Braided Silver Toe Rings</div>
                        <div class="product-price">₹2,500</div>
                        <button class="view-btn">View Details</button>
                        <button class="add-cart-btn">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>