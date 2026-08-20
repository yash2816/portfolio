<?php
include 'db.php';

$message = "";
$error = "";

if(isset($_POST['signup'])){

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if email already exists
    $check = mysqli_query($conn,
        "SELECT * FROM customers WHERE email='$email'"
    );

    if(mysqli_num_rows($check) > 0){

        $error = "Email already registered!";

    }elseif($password != $confirm_password){

        $error = "Passwords do not match!";

    }else{

        $query = "INSERT INTO customers(full_name,email,password)
                  VALUES('$full_name','$email','$password')";

        if(mysqli_query($conn,$query)){

            $message = "Registration Successful! You can now login.";

        }else{

            $error = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WearNest Signup</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<style>

:root{
    --accent:#1a1a1a;
    --muted:#767676;
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

.signup-container{
    width:450px;
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    padding:40px;
    border-radius:10px;
    box-shadow:0 20px 50px rgba(0,0,0,.2);
}

.logo{
    text-align:center;
    margin-bottom:25px;
}

.logo h1{
    font-family:'Playfair Display',serif;
    font-size:42px;
}

.logo p{
    color:#767676;
}

.success{
    background:#d4edda;
    color:#155724;
    padding:12px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
}

.error{
    background:#f8d7da;
    color:#721c24;
    padding:12px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
}

.input-group{
    margin-bottom:15px;
}

.input-group label{
    display:block;
    margin-bottom:5px;
    font-weight:600;
}

.input-group input{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    outline:none;
}

.input-group input:focus{
    border-color:#1a1a1a;
}

.signup-btn{
    width:100%;
    padding:15px;
    border:none;
    background:#1a1a1a;
    color:white;
    font-weight:600;
    cursor:pointer;
    margin-top:10px;
}

.signup-btn:hover{
    background:black;
}

.links{
    text-align:center;
    margin-top:20px;
}

.links a{
    color:#1a1a1a;
    font-weight:600;
    text-decoration:none;
}

.back-home{
    text-align:center;
    margin-top:15px;
}

.back-home a{
    text-decoration:none;
    color:#767676;
}

</style>
</head>
<body>

<div class="signup-container">

    <div class="logo">
        <h1>WearNest</h1>
        <p>Create Your Account</p>
    </div>

    <?php if($message!=""){ ?>
        <div class="success"><?php echo $message; ?></div>
    <?php } ?>

    <?php if($error!=""){ ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">

        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="full_name" required>
        </div>

        <div class="input-group">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required>
        </div>

        <button type="submit" name="signup" class="signup-btn">
            Create Account
        </button>

    </form>

    <div class="links">
        Already have an account?
        <a href="login.php">Login</a>
    </div>

    <div class="back-home">
        <a href="WearNest.php">← Back to Store</a>
    </div>

</div>

</body>
</html>