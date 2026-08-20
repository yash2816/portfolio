<?php
session_start();
include 'db.php';

$error = "";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $query = "SELECT * FROM customers
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['customer_email'] = $email;

        $save = mysqli_query($conn,
            "INSERT INTO login_history(customer_email)
            VALUES('$email')"
        );

        if(!$save){
            die("Database Error: " . mysqli_error($conn));
        }

        header("Location: WearNest.php");
        exit();

    }else{
        $error = "Invalid Email or Password!";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WearNest Login</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<style>

:root{
    --accent:#1a1a1a;
    --muted:#767676;
    --bg:#ffffff;
    --light-grey:#f5f5f5;
    --white:#ffffff;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:
    linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
    url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
}

.login-container{
    width:420px;
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(10px);
    padding:45px;
    border-radius:10px;
    box-shadow:0 20px 50px rgba(0,0,0,.2);
}

.logo{
    text-align:center;
    margin-bottom:30px;
}

.logo h1{
    font-family:'Playfair Display',serif;
    font-size:42px;
    letter-spacing:2px;
    color:#1a1a1a;
}

.logo p{
    color:#767676;
    margin-top:5px;
}

.error{
    background:#ffe5e5;
    color:#d60000;
    padding:12px;
    margin-bottom:20px;
    border-radius:5px;
    text-align:center;
}

.input-group{
    margin-bottom:20px;
}

.input-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
}

.input-group input{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    outline:none;
    font-size:15px;
    transition:.3s;
}

.input-group input:focus{
    border-color:#1a1a1a;
}

.login-btn{
    width:100%;
    padding:15px;
    background:#1a1a1a;
    color:white;
    border:none;
    cursor:pointer;
    font-weight:600;
    letter-spacing:1px;
    text-transform:uppercase;
    transition:.3s;
}

.login-btn:hover{
    background:black;
}

.links{
    margin-top:25px;
    text-align:center;
}

.links a{
    color:#1a1a1a;
    text-decoration:none;
    font-weight:600;
}

.links a:hover{
    text-decoration:underline;
}

.back-home{
    text-align:center;
    margin-top:15px;
}

.back-home a{
    color:#767676;
    text-decoration:none;
}

.back-home a:hover{
    color:#1a1a1a;
}

</style>
</head>
<body>

<div class="login-container">

    <div class="logo">
        <h1>WearNest</h1>
        <p>Nestle In Style</p>
    </div>

    <form method="POST">

        <div class="input-group">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <a href="WearNest/WearNest.php"><button type="submit" name="login" class="login-btn">
            Login
        </button></a>

    </form>

    <div class="links">
        Don't have an account?
        <a href="signup.php">Create Account</a>
    </div>

    <div class="back-home">
        <a href="WearNest.php">← Back to Store</a>
    </div>

</div>

</body>
</html>