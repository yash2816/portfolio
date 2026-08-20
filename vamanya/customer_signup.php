<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $customer_mobile = mysqli_real_escape_string($conn, $_POST['customer_mobile']);
    $customer_password = $_POST['customer_password'];
    $confirm_password = $_POST['confirm_password'];
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $customer_city = mysqli_real_escape_string($conn, $_POST['customer_city']);
    $customer_state = mysqli_real_escape_string($conn, $_POST['customer_state']);
    $customer_postal_code = mysqli_real_escape_string($conn, $_POST['customer_postal_code']);
    $customer_gender = mysqli_real_escape_string($conn, $_POST['customer_gender']);

    // Check Password Match
    if($customer_password != $confirm_password)
    {
        echo "<script>
                alert('Passwords do not match!');
                window.history.back();
              </script>";
        exit();
    }

    // Check Email Already Exists
    $check_email = "SELECT * FROM customers WHERE email='$customer_email'";
    $result = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<script>
                alert('Email already registered!');
                window.history.back();
              </script>";
        exit();
    }

    // Hash Password
    $hashed_password = password_hash($customer_password, PASSWORD_DEFAULT);

    // Insert Data
    $query = "INSERT INTO customers
(
    name,
    email,
    mobile,
    address,
    gender,
    city,
    state,
    password
)
VALUES
(
    '$customer_name',
    '$customer_email',
    '$customer_mobile',
    '$customer_address',
    '$customer_gender',
    '$customer_city',
    '$customer_state',
    '$hashed_password'
)";

    if(mysqli_query($conn, $query))
    {
        echo "<script>
                alert('Registration Successful!');
                window.location.href='customer_login.html';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Registration Failed!');
                window.history.back();
              </script>";
    }
}
?>