<?php
include 'db.php';

$query = "SELECT * FROM products WHERE category='Men' AND subcategory='Crew Neck'";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Dresses Collection | Wearnest</title>
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
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), 
                        url('images/Women/Dress bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: black;
            text-align: center;
        }

        .men-hero h1 { font-family: 'Playfair Display', serif; font-size: 50px; margin-bottom: 10px; }
        .men-hero p { letter-spacing: 3px; text-transform: uppercase; font-size: 14px; }

        /* --- Filter Bar --- */
        .filter-bar {
            padding: 20px 5%;
            display: flex;
            justify-content: center;
            gap: 20px;
            border-bottom: 1px solid var(--light-grey);
            overflow-x: auto;
            white-space: nowrap;
        }

        .filter-item {
            padding: 8px 20px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 13px;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-item:hover, .filter-item.active {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
        }

        /* --- Product Grid --- */
        .container { padding: 60px 5%; }
        
        .grid-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 40px 30px;
        }

        .product-card { position: relative; }

        .img-box {
            position: relative;
            height: 380px;
            background: var(--light-grey);
            overflow: hidden;
            margin-bottom: 15px;
        }

        .img-box img { width: 100%; height: 100%; object-fit: cover; transition: var(--transition); }
        .product-card:hover img { transform: scale(1.05); }

        .tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background: white;
            padding: 4px 10px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .add-btn {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            background: var(--accent);
            color: white;
            border: none;
            transform: translateY(100%);
            transition: var(--transition);
            cursor: pointer;
            font-weight: 600;
        }

        .product-card:hover .add-btn { transform: translateY(0); }

        .info h3 { font-size: 15px; font-weight: 500; margin-bottom: 5px; }
        .info .price { font-weight: 700; color: #333; }
        .info .category { font-size: 12px; color: var(--muted); text-transform: uppercase; margin-bottom: 5px; }

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
    height: 120%;
    object-fit: cover;
}

.add-to-cart-overlay{
    position: absolute;
    left: 0;
    bottom: -60px;
    width: 100%;
    background: #000;
    color: #fff;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s ease;
}

.product-card:hover .add-to-cart-overlay{
    bottom: 0;
}
        .section-title{
    font-size:32px;
    margin:50px 0 25px;
    font-weight:700;
    border-left:4px solid #000;
    padding-left:15px;
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
        <h1>Women's Dresses Collection</h1>
    </header>

     <?php include 'filterbar.php'?>

   <main class="container">

        <?php
       $types = [
    'Asymmetrical',
    'Empire Waist',
    'A-line',
    'Sundress',
    'Bodycon',
    'Bouffant',
    'Polo',
    'Nightdress',
    'Strapless'
];
       
        foreach($types as $type){

        ?>

        <section>

            <h2 class="section-title"><?php echo $type; ?></h2>

            <div class="product-grid">

                <?php

                $sql = "SELECT * FROM women_products 
                        WHERE category='Women' 
                        AND subcategory='$type'";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){
                ?>

                <a href="product_detail.php?id=<?php echo $row['product_id']; ?>" 
                    style="text-decoration:none; color:inherit;">

                    <div class="product-card">

                        <div class="product-img-container">

                            <img src="<?php echo $row['product_image']; ?>"
                                alt="<?php echo $row['product_name']; ?>">

                        
                            <div class="add-to-cart-overlay">
                                Add to Cart
                            </div>
                        </div>

                        <div class="product-info">

                            <h3><?php echo $row['product_name']; ?></h3>

                            <p class="price">
                                ₹<?php echo number_format($row['product_price']); ?>
                            </p>

                            <p>
                                <?php echo $row['subcategory']; ?>
                            </p>

                        </div>

                    </div>
                </a>

                <?php
                    }
                }
                else{
                    echo "<p>No products found in $type</p>";
                }
                ?>

            </div>

        </section>

        <?php } ?>

    </main>

    <section class="shop-look">
        <div class="look-img">
            <img src="images/Women/footer bg.png" alt="Full Look">
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
function go(page){
    window.location.href = page;
}
</script>
</html>