<?php

include 'db.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $query = "INSERT INTO customers
    (full_name,email,mobile,password)
    VALUES
    ('$name','$email','$mobile','$password')";

    mysqli_query($conn,$query);

    echo "Registration Successful";
}
?>

<form method="POST">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="text" name="mobile" placeholder="Mobile">

<input type="password" name="password" placeholder="Password">

<button name="register">
Register
</button>

</form>