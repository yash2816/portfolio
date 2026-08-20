<?php
session_start();
include 'db.php';

if(!isset($_SESSION['customer_email'])){
    header("Location: customer_login.php");
    exit();
}

$email = $_SESSION['customer_email'];

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    $update = "UPDATE customers SET
               name='$name',
               mobile='$mobile',
               address='$address',
               gender='$gender',
               city='$city',
               state='$state'
               WHERE email='$email'";

    mysqli_query($conn,$update);

    $_SESSION['customer_name'] = $name;

    header("Location: customer_profile.php");
    exit();
}

$query = "SELECT * FROM customers WHERE email='$email'";
$result = mysqli_query($conn,$query);
$customer = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>

<style>
body{
    background:#f8f8f8;
    font-family:Poppins,sans-serif;
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
.form-box{
    width:600px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#5a3400;
}

input,select,textarea{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:8px;
}

button{
    width:100%;
    padding:12px;
    background:#c39b34;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#a67f22;
}
</style>
</head>

<body>
<div class="navbar">

    <div class="nav-top">
        <h1 class="logo">VAMANYA</h1>
    </div>
</div>
<div class="form-box">

<h2>Edit Profile</h2>

<form method="POST">

<input type="text" name="name"
value="<?php echo $customer['name']; ?>" required>

<input type="text" name="mobile"
value="<?php echo $customer['mobile']; ?>" required>

<textarea name="address" required><?php echo $customer['address']; ?></textarea>

<select name="gender">
    <option value="Male" <?php if($customer['gender']=="Male") echo "selected"; ?>>Male</option>
    <option value="Female" <?php if($customer['gender']=="Female") echo "selected"; ?>>Female</option>
    <option value="Other" <?php if($customer['gender']=="Other") echo "selected"; ?>>Other</option>
</select>

<input type="text" name="city"
value="<?php echo $customer['city']; ?>" required>

<input type="text" name="state"
value="<?php echo $customer['state']; ?>" required>

<button type="submit" name="update">
    Update Profile
</button>

</form>

</div>

</body>
</html>
```
