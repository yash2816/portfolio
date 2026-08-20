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
<title>My Orders | Vamanya Jewellery</title>
</head>
<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f5f5f5;
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

.orders-section{
    width:90%;
    max-width:1200px;
    margin:40px auto;
}

.orders-section h2{
    color:#5a3300;
    margin-bottom:25px;
}

.order-card{
    background:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:20px;
    margin-bottom:20px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.order-card img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:10px;
}

.order-details{
    flex:1;
    margin-left:20px;
}

.order-details h3{
    color:#5a3300;
    margin-bottom:10px;
}

.order-details p{
    margin-bottom:5px;
}

.status{
    display:inline-block;
    padding:8px 15px;
    border-radius:20px;
    color:white;
    margin-top:10px;
    font-size:14px;
}

.pending{
    background:orange;
}

.shipped{
    background:#007bff;
}

.delivered{
    background:green;
}

.order-buttons{
    display:flex;
    flex-direction:column;
    gap:10px;
}

.track-btn,
.cancel-btn,
.invoice-btn{
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    color:white;
}

.track-btn{
    background:#5a3300;
}

.cancel-btn{
    background:red;
}

.invoice-btn{
    background:#b8860b;
}

.track-btn:hover,
.invoice-btn:hover{
    opacity:0.9;
}

@media(max-width:768px){

.order-card{
    flex-direction:column;
    text-align:center;
}

.order-details{
    margin:15px 0;
}

.order-buttons{
    width:100%;
}

}
</style>
<body>
<div class="navbar">

    <div class="nav-top">
        <h1 class="logo">
                    VAMANYA | Welcome,
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
                    logout
                </div>
            </div>
</div>

<section class="orders-section">

    <h2>My Orders</h2>

    <!-- Order 1 -->

    <div class="order-card">

        <img src="images/Rings/Emerald Royal.jpg" alt="Emerald Royal Ring">

        <div class="order-details">

            <h3>Emerald Royal Ring</h3>

            <p><strong>Order ID:</strong> #VM1001</p>

            <p><strong>Order Date:</strong> 07 June 2026</p>

            <p><strong>Quantity:</strong> 1</p>

            <p><strong>Price:</strong> ₹25,000</p>

            <span class="status pending">
                Pending
            </span>

        </div>

        <div class="order-buttons">

            <button class="track-btn">
                Track Order
            </button>

            <button class="cancel-btn">
                Cancel Order
            </button>

        </div>

    </div>

    <!-- Order 2 -->

    <div class="order-card">

        <img src="images/Necklaces/Halo Diamond Necklace.jpg" alt="Halo Diamond Necklace">

        <div class="order-details">

            <h3>Halo Diamond Necklace</h3>

            <p><strong>Order ID:</strong> #VM1002</p>

            <p><strong>Order Date:</strong> 05 June 2026</p>

            <p><strong>Quantity:</strong> 1</p>

            <p><strong>Price:</strong> ₹80,000</p>

            <span class="status shipped">
                Shipped
            </span>

        </div>

        <div class="order-buttons">

            <button class="track-btn">
                Track Order
            </button>

        </div>

    </div>

    <!-- Order 3 -->

    <div class="order-card">

        <img src="images/Chains/Classic Pearl String.jpg" alt="Classic Pearl String">

        <div class="order-details">

            <h3>Classic Pearl String</h3>

            <p><strong>Order ID:</strong> #VM1003</p>

            <p><strong>Order Date:</strong> 01 June 2026</p>

            <p><strong>Quantity:</strong> 1</p>

            <p><strong>Price:</strong> ₹55,000</p>

            <span class="status delivered">
                Delivered
            </span>

        </div>

        <div class="order-buttons">

            <button class="invoice-btn">
                Download Invoice
            </button>

        </div>

    </div>

</section>

<script>
    function go(page){
        window.location.href = page;
    }
    document.querySelectorAll(".track-btn").forEach(button=>{

    button.addEventListener("click",function(){

        alert("Order Tracking Feature Coming Soon!");

    });

});

document.querySelectorAll(".cancel-btn").forEach(button=>{

    button.addEventListener("click",function(){

        if(confirm("Are you sure you want to cancel this order?")){

            alert("Order Cancelled Successfully!");

        }

    });

});

document.querySelectorAll(".invoice-btn").forEach(button=>{

    button.addEventListener("click",function(){

        alert("Invoice Download Started!");

    });

});
</script>

</body>
</html>