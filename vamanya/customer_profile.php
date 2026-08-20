<?php
session_start();
include 'db.php';

if(!isset($_SESSION['customer_email'])){
    header("Location: customer_login.html");
    exit();
}

$email = $_SESSION['customer_email'];

$query = "SELECT * FROM customers WHERE email='$email'";
$result = mysqli_query($conn, $query);

$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Profile</title>

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

/* Navbar */

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

/* Profile Container */

.container{
    width:90%;
    max-width:900px;
    margin:30px auto;
}

.container h2{
    background-color:#c39b34;
    padding:12px;
    border-radius:20px;
    color:#5a3400;
    text-align:center;
    margin-bottom:25px;
}

/* Profile Card */

.profile-card{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.profile-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 10px;
    border-bottom:1px solid #eee;
}

.profile-item label{
    font-weight:600;
    color:#5a3400;
}

.profile-item span{
    color:#555;
}

/* Button */

.btn{
    display:block;
    width:250px;
    margin:30px auto 0;
    background:#b8860b;
    color:white;
    text-align:center;
    padding:12px;
    border-radius:8px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.btn:hover{
    background:#9a6f09;
}

/* Footer */

.footer{
    margin-top:40px;
    background:bisque;
    text-align:center;
    padding:15px;
    color:#5a3400;
    font-weight:500;
}
.edit-btn{
    background:#2e8b57;
    margin-bottom:15px;
}

.edit-btn:hover{
    background:#1f6b42;
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
<div class="container">
    <div class="profile-card">

        <h2>My Profile</h2>

        <div class="profile-item">
            <label>Name:</label>
            <span><?php echo $customer['name']; ?></span>
        </div>

        <div class="profile-item">
            <label>Email:</label>
            <span><?php echo $customer['email']; ?></span>
        </div>

        <div class="profile-item">
            <label>Mobile:</label>
            <span><?php echo $customer['mobile']; ?></span>
        </div>

        <div class="profile-item">
            <label>Address:</label>
            <span><?php echo $customer['address']; ?></span>
        </div>

        <div class="profile-item">
            <label>Gender:</label>
            <span><?php echo $customer['gender']; ?></span>
        </div>

        <div class="profile-item">
            <label>City:</label>
            <span><?php echo $customer['city']; ?></span>
        </div>

        <div class="profile-item">
            <label>State:</label>
            <span><?php echo $customer['state']; ?></span>
        </div>
        <a href="edit_profile.php" class="btn edit-btn">
             Edit Profile
        </a>
        <a href="customer_dashboard.php" class="btn">
            Back to Dashboard
        </a>

    </div>
</div>
<div class="footer">
    © <?php echo date("Y"); ?> VAMANYA Jewellery. All Rights Reserved.
</div>
</body>
<script>
    function go(page){
        window.location.href = page;
    }
    function logout(){
        if(confirm("Are you sure you want to logout?")){
            window.location.href = "customer_logout.php";
        }
}
</script>
</html>