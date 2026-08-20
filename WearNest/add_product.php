<?php
include 'db.php';

if(isset($_POST['add'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $subcategory= $_POST['subcategory'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $temp,
        "images/products/".$image
    );

    $query = "INSERT INTO products
    (product_name,product_price,product_image,category, subcategory, description)
    VALUES
    ('$name','$price',
    'images/products/$image',
    '$category','$description')";

    mysqli_query($conn,$query);

    echo "Product Added Successfully";
}
?>

<form method="POST" enctype="multipart/form-data">

    Product Name:
    <input type="text" name="name"><br><br>

    Price:
    <input type="number" name="price"><br><br>

    Category:
    <select name="category">
        <option>Men</option>
        <option>Women</option>
        <option>Kids</option>
    </select><br><br>

    Description:
    <textarea name="description"></textarea><br><br>

    Image:
    <input type="file" name="image"><br><br>

    <button name="add">Add Product</button>

</form>