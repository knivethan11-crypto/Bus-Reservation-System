<?php include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $res = $conn->query("SELECT * FROM users WHERE username = '$user'");
    $row = $res->fetch_assoc();
    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        header("Location: index.php");
    } else {
        echo "Login failed.";
    }
}
?>
<form method="POST">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>