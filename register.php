<?php
require_once "header.php";
require_once "connection.php";

if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $gender=$_POST['gender'];
    $sql="INSERT INTO users(name,email,password,gender) VALUES('$name','$email','$password','$gender')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Account Created";
        header("Location:register.php");
    }else{
        $_SESSION['error']="Account Not Created";
        header("Location:register.php");
    }
}
?>

<h1>Welcome to BCA Ecommerce page</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <blockquote>
        <h1>Register Form</h1>
        <hr>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="gender">Gender:</label>
            <select name="gender" id="" required>
                <option value="">-------------Select Gender-----------</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select><br><br>

            <button>Create new account</button>
            
            </form>
    </blockquote>
</body>
</html>

<?php
require_once "footer.php";
?>