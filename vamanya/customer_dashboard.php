<?php
session_start();

if(!isset($_SESSION['customer_email'])){
    header("Location: customer_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>VAMANYA Customer Dashboard</title>

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

.logo{
    margin:0;
    font-size:30px;
    color:black;
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

.container{
    padding:30px;
}

.container h2{
    background-color:#c39b34;
    padding:12px;
    border-radius:20px;
}
.jewellry-card{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-top:30px;
}
.card{
    background:white;
    padding:20px;
    border-radius:15px;
    flex:1 1 300px;
    display:flex;
    flex-direction:column;
    gap:15px;
}
.card h3{
    margin:0;
    font-size:20px;
}
.card p{
    color:#555;
    font-size:14px;
}
.product-btn{
    width:100%;
    background:#b8860b;
    color:white;
    border:none;
    padding:12px;
    border-radius:8px;
    font-size:14px;
    cursor:pointer;
    transition:.3s;
}
.product-btn:hover{
    background:#9a6f09;
}
.footer{
    margin-top:40px;
    background:bisque;
    text-align:center;
    padding:15px;
    color:#5a3400;
    font-weight:500;
}
</style>
</head>
<body>

<div class="navbar">

    <div class="nav-top">
        <h1 class="logo">VAMANYA</h1>
        <?php echo $_SESSION['customer_name']; ?> 
    </div>

    <div class="nav-menu">
        <div onclick="go('customer_dashboard.php')">
            Dashboard
        </div>
        <div class="nav-item" onclick="openProfile()">
            👤 My Profile
        </div>
        <div class="nav-item" onclick="go('Cart.php')">
            🛒 Cart
        </div>
        <div class="nav-item" onclick="go('my_orders.php')">
            📦 My Orders
        </div>
        <div class="nav-item" onclick="go('products.php')">
            💎 Shop Products
        </div>
        <div class="nav-item" onclick="logout()">
            Logout
        </div>
    </div>
</div>

<div class="dashboard">

    <div class="container">

    <h2>
        Welcome,
        <?php echo $_SESSION['customer_name']; ?>
    </h2>

    <div class="jewellry-card">

        <div class="card">
            <h3>👤 My Profile</h3>
            <p>Manage personal information</p>
            <button class="product-btn"
                onclick="go('customer_profile.php')">
                OPEN
            </button>
        </div>

        <div class="card">
            <h3>🛒 cart</h3>
            <p>View and manage your shopping cart</p>
            <a href="Cart.php"><button class="product-btn">
                OPEN
            </button></a>
        </div>

        <div class="card">
            <h3>📦 My Orders</h3>
            <p>Track all your jewellery orders</p>
            <button class="product-btn"
                onclick="go('my_orders.php')">
                OPEN
            </button>
        </div>

        <div class="card">
            <h3>💎 Shop Products</h3>
            <p>Browse and purchase jewellery</p>
            <button class="product-btn"
                onclick="go('products.php')">
                SHOP NOW
            </button>
        </div>

        <div class="card">
            <h3>❤️ Wishlist</h3>
            <p>Your saved jewellery collection</p>
            <button class="product-btn"
                onclick="go('wishlist.php')">
                OPEN
            </button>
        </div>

        <div class="card">
            <h3>🏠 Address Book</h3>
            <p>Manage delivery addresses</p>
            <button class="product-btn"
                onclick="go('address_book.php')">
                OPEN
            </button>
        </div>

        <div class="card">
            <h3>🔒 Change Password</h3>
            <p>Keep your account secure</p>
            <button class="product-btn"
                onclick="go('change_password.php')">
                OPEN
            </button>
        </div>

        <div class="card">
            <h3>🚪 Logout</h3>
            <p>Sign out from your account</p>
            <button class="product-btn"
                onclick="go('customer_logout.php')">
                LOGOUT
            </button>
        </div>

    </div>

</div>

</div>
<script>
function go(page){
    window.location.href = page;
}
function logout(){
    if(confirm("Are you sure you want to logout?")){
        window.location.href = "customer_logout.php";
    }
}
function openProfile(){
    window.location.href = "customer_profile.php";
}
function openCart(){
    window.location.href = "Cart.html";
}
</script>

<div class="footer">
    © <?php echo date("Y"); ?> VAMANYA Jewellery. All Rights Reserved.
</div>

</body>
</html>