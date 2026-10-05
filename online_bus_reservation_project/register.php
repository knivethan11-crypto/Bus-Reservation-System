<?php include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (username, password) VALUES ('$user', '$pass')");
    echo "Registration successful. <a href='login.php'>Login</a>";
    exit;
}
?>
<form method="POST">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>