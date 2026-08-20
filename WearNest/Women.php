<?php
include 'db.php';

$query = "SELECT * FROM products WHERE category='Men'";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>women's Collection | Wearnest</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --accent: #1a1a1a;
            --muted: #767676;
            --light-grey: #f5f5f5;
            --white: #ffffff;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background: var(--white); color: var(--accent); }

        /* --- Header (Consistent with Home) --- */
        nav {
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--white);
            border-bottom: 1px solid var(--light-grey);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo { font-family: 'Playfair Display', serif; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; }
        .nav-links a { text-decoration: none; color: var(--accent); margin-right: 25px; font-size: 13px; font-weight: 600; text-transform: uppercase; }

        /* --- Hero Banner --- */
        .men-hero {
            height: 400px;
            background:url('images/Women/main bg.jpg');
            background-size: cover;
            background-position: center ;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: black;
            text-align: center;
        }

        .men-hero h1 { font-family: 'Playfair Display', serif; font-size: 50px; margin-bottom: 10px; }
        .men-hero p { letter-spacing: 3px; text-transform: uppercase; font-size: 14px; }

       
        /* --- Shop The Look (Promo) --- */
        .shop-look {
            background: var(--light-grey);
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            margin-top: 50px;
        }

        .look-text { padding: 10%; }
        .look-text h2 { font-family: 'Playfair Display', serif; font-size: 40px; margin-bottom: 20px; }
        .look-img img { width: 100%; height: 600px; object-fit: cover; display: block; }

        .btn-black {
            background: var(--accent);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 20px;
        }

        /* --- Footer --- */
        footer { padding: 60px 5%; background: #111; color: white; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; }
        footer h4 { margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px; }
        footer p { color: #999; line-height: 1.8; font-size: 14px; }

        @media (max-width: 768px) {
            .shop-look { grid-template-columns: 1fr; }
            .men-hero h1 { font-size: 36px; }
        }
        .product-img-container{
            position: relative;
            overflow: hidden;
            height: 350px;
        }

        .product-img-container img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .add-to-cart-overlay{
            position: absolute;
            left: 0;
            bottom: -60px;
            width: 100%;
            background: #000;
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .product-card:hover .add-to-cart-overlay{
            bottom: 0;
        }
        .women-categories{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
    padding:40px;
}

.category-card{
    background:#fff;
    display:
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    text-align:center;
    transition:.3s;
}

.category-card:hover{
    transform:translateY(-10px);
}

.category-card img{
    width:100%;
    height:320px;
    object-fit:contain
}

.category-card h3{
    padding:15px 10px;
}

.category-card a{
    display:inline-block;
    margin-bottom:20px;
    padding:10px 25px;
    background:#111827;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
}
    </style>
</head>
<body>

    <nav>
        <div class="logo">Wearnest</div>
        <div class="nav-links">
            <a href="WearNest.php">Home</a>
            <a href="#">New Arrivals</a>
            <a href="Mens.php">Men</a>
            <a href="Women.php">Women</a>
            <a href="Accessories.php">Accessories</a>
            
        </div>
        <div class="nav-icons">
            <i class="fas fa-search" style="margin-right: 15px;"></i>
            <i class="fas fa-shopping-bag"></i>
        </div>
    </nav>

    <header class="men-hero">
        <p>A New Standard of Style</p>
        <h1>Women's Collection</h1>
    </header>

    <section class="women-categories">

    <div class="category-card">
        <img src="images/Women/Dress.jpg">
        <h3>Dresses</h3>
        <a href="Dresses.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Top.jpg">
        <h3>Tops</h3>
        <a href="Tops.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Kurtis.jpg">
        <h3>Kurtis</h3>
        <a href="Kurtis.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Jeans.jpg">
        <h3>Jeans</h3>
        <a href="Jeans.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Ethnic wear.jpg">
        <h3>Ethnic Wear</h3>
        <a href="EthnicWear.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Skirt.jpg">
        <h3>Skirts</h3>
        <a href="Skirts.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Footwear.jpg">
        <h3>Footwear</h3>
        <a href="Footwear.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Handbags.jpg">
        <h3>Handbags</h3>
        <a href="Handbags.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Accessories.jpg">
        <h3>Accessories</h3>
        <a href="Accessories.php">Shop Now</a>
    </div>

    <div class="category-card">
        <img src="images/Women/Beauty products.jpg">
        <h3>Beauty Products</h3>
        <a href="Beauty.php">Shop Now</a>
    </div>

</section>

    <section class="shop-look">
        <div class="look-img">
            <img src="images/Women/footer bg.png">
        </div>
        <div class="look-text">
            <h2>Shop The Look: <br> "The Urban Nomad"</h2>
            <p>A curated set designed for the modern Woman who values comfort without compromising on sophistication. Features our signature Trench Coat, Merino Scarf, and Chelsea Boots.</p>
            <a href="#" class="btn-black">Shop This Look</a>
        </div>
    </section>

    <footer>
        <div>
            <h4>Wearnest</h4>
            <p>Refining masculine style since 2026. High quality materials, ethical production.</p>
        </div>
        <div>
            <h4>Help</h4>
            <p>Track Order</p>
            <p>Returns</p>
            <p>Sizing Guide</p>
        </div>
        <div>
            <h4>Contact</h4>
            <p>Surat, Gujarat, India</p>
            <p>support@wearnest.com</p>
        </div>
        <div>
            <h4>Newsletter</h4>
            <input type="text" placeholder="Enter your email" style="background:#222; border:none; padding:10px; color:white; width:100%">
        </div>
    </footer>
</body>
<script>
        function openPage(page){
            window.location.href = page;
        }
    </script>
</html>