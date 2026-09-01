<?php
require_once "header.php";
require_once "connection.php";

$sql= "SELECT * FROM products";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Welcome to BCA Ecommerce page</h1>
<h1>Product List</h1>
<div class="card_container">
    <div class="card">
        <?php foreach($result as $product) { ?>
            <h1><?php echo $product['title'] ?></h1>
            <img src="images/<?php echo $product['image'] ?>" width="200" height="200" ><br><br>
            <a href="product_details.php?slug=<?php echo $product['slug'] ?>">View Product</a>
        <?php } ?>  
    </div>
</div>
</body>
</html>

<?php
require_once "footer.php";
?>