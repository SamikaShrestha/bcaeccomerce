<?php 
require_once 'header.php';
require_once 'connection.php';

if(!isset($_SESSION['auth'])){
    $_SESSION['error']="Login to access this page";
    header("Location:login.php");
    exit;
}

if(!empty($_POST)){
    $category_id = $_POST['category_id'];
    $userid=$_SESSION['auth']['uid'];
    $title = $_POST['title'];
    $slug=strtolower(str_replace("","-",$title));
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $image=$_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
    if(!move_uploaded_file($tmp_name,"images/".$image)){
        echo "Image not uploaded!";
    }
    $description=$_POST['description'];
    $sql="INSERT INTO products(category_id,user_id,title,slug,quantity,price,image,description)
    VALUES ('$category_id','$userid','$title','$slug','$quantity','$price','$image','$description')";
    $result=mysqli_query($conn,$sql);
    if($result) {
        $_SESSION['success']="Product added successfully";
        header("Location:add-product.php");
    }else{
    $_SESSION['error']="Product not added";
    header("Location:add-product.php");
    }
}    

$query="SELECT * FROM category";
$category = mysqli_query($conn,$query);

?>

<h1>Add Product</h1>
<form action="" method="post" enctype="multipart/form-data">
    Category: <select name="category_id" id="" required>
        <option value="">----------Select Category-----------</option>
        <?php foreach($category as $cat) { ?>
        <option value="<?php echo $cat['cid']; ?> ">
            <?php echo $cat['name']; ?>
        </option>
        <?php } ?>
    </select> <br><br>
    Title: <input type="text" name="title" id="" required><br><br>
    Quantity: <input type="number" name="quantity" id="" required><br><br>
    Price: <input type="number" name="price" id="" required><br><br>
    Image: <input type="file" name="image" id="" required><br><br>
    Description: <textarea name="description" id="" required></textarea><br><br>
    <button>Add Products</button>
</form>