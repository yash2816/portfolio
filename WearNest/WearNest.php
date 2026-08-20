<?php

session_start();

if(!isset($_SESSION['customer_email'])){
    header("Location: login.php");
    exit();
}

echo "Welcome " . $_SESSION['customer_email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wearnest | Nestle in Style</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --accent: #1a1a1a;
            --muted: #767676;
            --bg: #ffffff;
            --light-grey: #f5f5f5;
            --white: #ffffff;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--accent);
            overflow-x: hidden;
        }

        /* --- Navigation --- */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--accent);
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-icons {
            display: flex;
            gap: 20px;
            font-size: 18px;
            cursor: pointer;
        }

        .cart-count {
            background: var(--accent);
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
            position: relative;
            top: -10px;
            left: -10px;
        }

        /* --- Hero Section --- */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), 
                        url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(40px, 8vw, 90px);
            margin-bottom: 20px;
        }

        .btn-shop {
            padding: 15px 40px;
            background: var(--white);
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: var(--transition);
            border: none;
        }

        .btn-shop:hover {
            background: var(--accent);
            color: var(--white);
        }

        /* --- Categories --- */
        .section-padding { padding: 80px 5%; }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .cat-card {
            height: 500px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .cat-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .cat-card:hover img { transform: scale(1.05); }

        .cat-label {
            position: absolute;
            bottom: 30px;
            left: 30px;
            color: white;
        }

        .cat-label h2 { font-family: 'Playfair Display', serif; font-size: 32px; }

        /* --- Product Grid --- */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .product-card {
            position: relative;
            transition: var(--transition);
        }

        .product-img-container {
            position: relative;
            overflow: hidden;
            background: var(--light-grey);
            height: 400px;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .add-to-cart-overlay {
            position: absolute;
            bottom: -50px;
            width: 100%;
            background: var(--accent);
            color: white;
            text-align: center;
            padding: 15px;
            transition: var(--transition);
            cursor: pointer;
            font-weight: 600;
        }

        .product-card:hover .add-to-cart-overlay { bottom: 0; }
        .product-card:hover img { opacity: 0.8; }

        .product-info { padding: 15px 0; }
        .product-info h3 { font-size: 16px; margin-bottom: 5px; font-weight: 400; }
        .product-info .price { font-weight: 600; }

        /* --- Cart Sidebar --- */
        .cart-sidebar {
            position: fixed;
            top: 0; right: -400px;
            width: 400px; height: 100%;
            background: white;
            z-index: 2000;
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
            transition: var(--transition);
            padding: 40px;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.active { right: 0; }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid var(--light-grey);
            padding-bottom: 20px;
        }

        .cart-items { flex: 1; overflow-y: auto; }

        .cart-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .cart-item img { width: 80px; height: 100px; object-fit: cover; }

        /* --- Footer --- */
        footer {
            background: var(--light-grey);
            padding: 60px 5%;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
        }

        .footer-logo { font-family: 'Playfair Display', serif; font-size: 24px; margin-bottom: 20px; }
        .footer-links h4 { margin-bottom: 20px; text-transform: uppercase; font-size: 14px; }
        .footer-links p { color: var(--muted); margin-bottom: 10px; font-size: 14px; }

        @media (max-width: 768px) {
            .category-grid { grid-template-columns: 1fr; }
            .cart-sidebar { width: 100%; right: -100%; }
            .nav-links { display: none; }
            footer { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Nav -->
    <nav id="navbar">
        <div class="logo">Wearnest</div>
        <div class="nav-links">
            <a href="NewArrivals.php">New Arrivals</a>
            <a href="Mens.php">Men</a>
            <a href="Women.php">Women</a>
            <a href="Accessories.php">Accessories</a>
        </div>
        <div class="nav-icons">
            <i class="fas fa-search"></i>
            <i class="fas fa-user"></i>
            <div onclick="toggleCart()">
                <i class="fas fa-shopping-bag"></i>
                <span class="cart-count" id="cart-badge">0</span>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>The Autumn <br> Collection</h1>
            <a href="shop.html" class="btn-shop">Explore Now</a>
        </div>
    </section>

    <!-- Categories -->
    <section class="section-padding">
        <div class="category-grid">
            <div class="cat-card">
                <img src="images/Mens/1.png" alt="Men wearing a stylish jacket in a city street setting">
                <div class="cat-label"><h2>Men</h2></div>
            </div>
            <div class="cat-card">
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=600&q=80" alt="Woman in a fashionable outfit posing outdoors">
                <div class="cat-label"><h2>Women</h2></div>
            </div>
            <div class="cat-card">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80" alt="Flatlay of fashion accessories and essentials on a tabletop">
                <div class="cat-label"><h2>Essentails</h2></div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section class="section-padding" id="shop">
        <div style="margin-bottom: 40px; display: flex; justify-content: space-between; align-items: flex-end;">
            <h2 style="font-family: 'Playfair Display'; font-size: 36px;">Trending Now</h2>
            <a href="#" style="color: var(--accent); font-weight: 600;">View All</a>
        </div>

        <div class="product-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-img-container">
                    <img src="images/Mens/Minimalist Wool Coat.jpg" alt="Minimalist wool coat displayed against a neutral studio background with a calm autumn tone">
                    <div class="add-to-cart-overlay" onclick="addToCart('Minimalist Coat', 129)">Add to Cart</div>
                </div>
                <div class="product-info">
                    <h3>Minimalist Wool Coat</h3>
                    <p class="price">$129.00</p>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-img-container">
                    <img src="images/Mens/Urban Bomber Jacket.jpg" alt="Urban bomber jacket worn by a model in a contemporary city scene">
                    <div class="add-to-cart-overlay" onclick="addToCart('Urban Bomber', 89)">Add to Cart</div>
                </div>
                <div class="product-info">
                    <h3>Urban Bomber Jacket</h3>
                    <p class="price">$89.00</p>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-img-container">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=500&q=80" alt="Silk evening dress shown on a model under soft lighting for an elegant look">
                    <div class="add-to-cart-overlay" onclick="addToCart('Silk Evening Dress', 159)">Add to Cart</div>
                </div>
                <div class="product-info">
                    <h3>Silk Evening Dress</h3>
                    <p class="price">$159.00</p>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-img-container">
                    <img src="https://images.unsplash.com/photo-1550639525-c97d455acf70?auto=format&fit=crop&w=500&q=80" alt="Premium cotton tee folded neatly on a surface in a bright casual setting">
                    <div class="add-to-cart-overlay" onclick="addToCart('Premium Cotton Tee', 35)">Add to Cart</div>
                </div>
                <div class="product-info">
                    <h3>Premium Cotton Tee</h3>
                    <p class="price">$35.00</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <i class="fas fa-times" onclick="toggleCart()" style="cursor: pointer;"></i>
        </div>
        <div class="cart-items" id="cartItems">
            <!-- Items appear here -->
            <p style="color: var(--muted); text-align: center; margin-top: 50px;">Your cart is empty.</p>
        </div>
        <div style="margin-top: 20px; border-top: 1px solid var(--light-grey); padding-top: 20px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <strong>Total:</strong>
                <strong id="cartTotal">$0.00</strong>
            </div>
            <button class="btn-shop" style="width: 100%; background: var(--accent); color: white;">Checkout</button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div>
            <div class="footer-logo">Wearnest</div>
            <p style="color: var(--muted); max-width: 300px;">Elevating your everyday essentials with timeless designs and sustainable craftsmanship.</p>
        </div>
        <div class="footer-links">
            <h4>Shop</h4>
            <p>All Collections</p>
            <p>Winter Wear</p>
            <p>Sale</p>
        </div>
        <div class="footer-links">
            <h4>Support</h4>
            <p>Shipping Policy</p>
            <p>Returns & Exchanges</p>
            <p>Contact Us</p>
        </div>
        <div class="footer-links">
            <h4>Follow Us</h4>
            <div style="display: flex; gap: 15px; font-size: 18px;">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
        </div>
    </footer>

    <script>
        let cart = [];
        const cartBadge = document.getElementById('cart-badge');
        const cartSidebar = document.getElementById('cartSidebar');
        const cartItemsContainer = document.getElementById('cartItems');
        const cartTotal = document.getElementById('cartTotal');

        function toggleCart() {
            cartSidebar.classList.toggle('active');
        }

        function addToCart(name, price) {
            cart.push({ name, price });
            updateCart();
            if(!cartSidebar.classList.contains('active')) toggleCart();
        }

        function updateCart() {
            cartBadge.innerText = cart.length;
            
            if(cart.length === 0) {
                cartItemsContainer.innerHTML = '<p style="color: var(--muted); text-align: center; margin-top: 50px;">Your cart is empty.</p>';
            } else {
                cartItemsContainer.innerHTML = cart.map((item, index) => `
                    <div class="cart-item">
                        <div style="flex:1">
                            <h4>${item.name}</h4>
                            <p style="color: var(--muted)">$${item.price}.00</p>
                        </div>
                        <i class="fas fa-trash" style="font-size: 12px; cursor:pointer" onclick="removeItem(${index})"></i>
                    </div>
                `).join('');
            }

            const total = cart.reduce((sum, item) => sum + item.price, 0);
            cartTotal.innerText = `$${total}.00`;
        }

        function removeItem(index) {
            cart.splice(index, 1);
            updateCart();
        }

        // Change nav background on scroll
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if(window.scrollY > 50) {
                nav.style.padding = '15px 5%;';
                nav.style.boxShadow = '0 5px 20px rgba(0,0,0,0.05)';
            } else {
                nav.style.padding = '20px 5%';
                nav.style.boxShadow = 'none';
            }
        });
        
    </script>
</body>
</html>