<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking System</title>
</head>
<body>

<?php if (isset($_SESSION['user_id'])): ?>
    <h2>Welcome <?= htmlspecialchars($_SESSION['role']) ?></h2>
    <a href="logout.php">Logout</a>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <a href="admin.php">Admin Panel</a>
    <?php endif; ?>
    <a href="mybookings.php">My Bookings</a>
<?php else: ?>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
<?php endif; ?>

<h3>Available Buses</h3>
<table border="1">
    <tr>
        <th>Bus</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Time</th>
        <th>Seats</th>
        <th>Action</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM buses");
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['bus_name']) . "</td>
            <td>" . htmlspecialchars($row['source']) . "</td>
            <td>" . htmlspecialchars($row['destination']) . "</td>
            <td>" . htmlspecialchars($row['date']) . "</td>
            <td>" . htmlspecialchars($row['time']) . "</td>
            <td>" . htmlspecialchars($row['seats_available']) . "</td>
            <td><a href='book.php?id={$row['id']}'>Book</a></td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
