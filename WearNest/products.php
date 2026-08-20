<?php
include 'db.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>Products</h1>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>
    <div style="border:1px solid #ccc;padding:10px;margin:10px;">
        <h3><?php echo $row['product_name']; ?></h3>
        <p>Category: <?php echo $row['category']; ?></p>
        <p>Price: ₹<?php echo $row['price']; ?></p>
    </div>
<?php
}
?>

</body>
</html>