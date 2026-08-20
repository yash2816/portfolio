<?php
session_start();
include 'db.php';

if(!isset($_SESSION['customer_id']))
{
    header("Location: customer_login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];

$query = "
SELECT
c.cart_id,
c.quantity,
p.product_id,
p.product_name,
p.price,
p.image
FROM cart c
INNER JOIN products p
ON c.product_id = p.product_id
WHERE c.customer_id = '$customer_id'
";

$result = mysqli_query($conn,$query);

$grandTotal = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vamanya Jewellery - Cart</title>
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

        /* Cart */

        .cart-container{
            width:90%;
            max-width:1200px;
            margin:40px auto;
        }

        .cart-container h2{
            margin-bottom:20px;
            color:#5a3300;
        }

        .cart-item{
            background:white;
            padding:20px;
            margin-bottom:20px;
            border-radius:12px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            box-shadow:0 3px 10px rgba(0,0,0,0.1);
        }

        .cart-item img{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:10px;
        }

        .product-details{
            flex:1;
            margin-left:20px;
        }

        .product-details h3{
            color:#5a3300;
            margin-bottom:10px;
        }

        .product-details p{
            color:#b8860b;
            font-size:22px;
            font-weight:bold;
            gap:10px;
            padding: 10px;
        }

        .quantity-box{
            display:flex;
            align-items:center;
            gap:20px;
            padding: 20px;
        }

        .quantity-box button{
            width:35px;
            height:35px;
            border:none;
            background:#5a3300;
            color:white;
            font-size:18px;
            border-radius:5px;
            cursor:pointer;
            gap:20px;
        }

        .qty{
            font-size:18px;
            font-weight:bold;
        }

        .item-total{
            font-size:20px;
            font-weight:bold;
            color:#b8860b;
            padding:15px;
        }

        .remove-btn{
            background:red;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:6px;
            cursor:pointer;
        }

        .cart-summary{
            background:white;
            padding:25px;
            border-radius:12px;
            text-align:right;
            box-shadow:0 3px 10px rgba(0,0,0,0.1);
        }

        .cart-summary h3{
            color:#5a3300;
            margin-bottom:15px;
        }

        .checkout-btn{
            background:#b8860b;
            color:white;
            border:none;
            padding:12px 30px;
            border-radius:8px;
            cursor:pointer;
            font-size:18px;
        }

        .checkout-btn:hover{
            background:#5a3300;
        }

        /* Responsive */

        @media(max-width:768px){

        .cart-item{
            flex-direction:column;
            text-align:center;
            gap:15px;
        }

        .product-details{
            margin-left:0;
        }

        .cart-summary{
            text-align:center;
        }

        }
        </style>
    </head>
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


        <section class="cart-container">

    <h2>My Shopping Cart</h2>

    <?php
    $grandTotal = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $total = $row['price'] * $row['quantity'];
        $grandTotal += $total;
    ?>
    <div class="cart-item">

        <img src="<?php echo $row['image']; ?>" alt="">

        <div class="product-details">
            <h3><?php echo $row['product_name']; ?></h3>
            <p>₹<?php echo number_format($row['price']); ?></p>
            <p>Quantity: <?php echo $row['quantity']; ?></p>
        </div>

        <div class="item-total">
            ₹<?php echo number_format($total); ?>
        </div>

    </div>
    <?php
    }
    ?>

    <div class="cart-summary">
        <h3>Total: ₹<?php echo number_format($grandTotal); ?></h3>

        <button class="checkout-btn">
            Proceed To Checkout
        </button>
    </div>

</section>

        <script>
            function go(page){
                window.location.href = page;
            }   
            function increase(button){

            let qtyElement =
            button.parentElement.querySelector(".qty");

            let qty =
            parseInt(qtyElement.innerText);

            qty++;

            qtyElement.innerText = qty;

            updateTotal();
        }

        function decrease(button){

            let qtyElement =
            button.parentElement.querySelector(".qty");

            let qty =
            parseInt(qtyElement.innerText);

            if(qty > 1){
                qty--;
            }

            qtyElement.innerText = qty;

            updateTotal();
        }

        function removeItem(button){

            button.parentElement.remove();

            updateTotal();
        }

        function updateTotal(){

            let items =
            document.querySelectorAll(".cart-item");

            let grandTotal = 0;

            items.forEach(item => {

                let price =
                parseInt(
                item.querySelector(".product-details p")
                .innerText.replace(/[₹,]/g,'')
                );

                let qty =
                parseInt(
                item.querySelector(".qty").innerText
                );

                let total = price * qty;

                item.querySelector(".item-total")
                .innerText = "₹" + total.toLocaleString();

                grandTotal += total;
            });

            document.getElementById("grandTotal")
            .innerText = grandTotal.toLocaleString();
        }

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let output = "";

if(cart.length === 0)
{
    output = "<h2>Your cart is empty</h2>";
}
else
{
    cart.forEach(item => {

        output += `
        <div style="background:white;padding:15px;margin:15px;border-radius:10px;">
            <img src="${item.image}" width="120">
            <h3>${item.name}</h3>
            <p>Price: ₹${item.price}</p>
            <p>Quantity: ${item.quantity}</p>
            <p>Total: ₹${item.price * item.quantity}</p>
        </div>
        `;
    });
}

document.getElementById("cart-items").innerHTML = output;

        </script>

    </body>
</html>