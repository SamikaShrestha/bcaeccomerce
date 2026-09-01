<?php
require_once "header.php";
require_once "connection.php";
$slug=$_GET['slug'];
$sql="SELECT category.cid,category.name as category_name,users.uid,users.name,products.* FROM products
JOIN category on category.cid=products.category_id
JOIN users ON users.uid=products.user_id
WHERE products.slug='$slug'";
$result = mysqli_query($conn,$sql);
$product= mysqli_fetch_assoc($result);
?>

<h1>Products Details</h1>
<h2><?php echo $product['title'] ?></h2>
<img src="images/<?php echo $product['image'] ?>" width="200" height="200" ><br><br>
<p>Price:
    <?php echo $product['price'] ?>
    Vendor: <?php echo $product['name'] ?>
    Category: <?php echo $product['category_name'] ?>
</p>
<a href="">Order Now</a>

<?php
require_once "footer.php";
?>

