<?php
require_once "header.php";
require_once "connection.php";

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user=mysqli_fetch_assoc($result);
        $_SESSION['success']="Login Successful!";
        $_SESSION['auth']=$user;
        header("Location:index.php");
    } else {
        $_SESSION['error']="Invalid creditials";
        header("Location:login.php");
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
        <h1>Login Form</h1>
        <hr>
        <form action="" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>

                <button type="submit">Login</button>
        </form>
    </blockquote>
</body>
</html>

<?php
require_once "footer.php";
?>