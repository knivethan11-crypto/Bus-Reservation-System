<?php include 'db.php';
$bus_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $seat = $_POST['seat_no'];
    $conn->query("INSERT INTO bookings (user_id, bus_id, seat_no) VALUES ($user_id, $bus_id, $seat)");
    $conn->query("UPDATE buses SET seats_available = seats_available - 1 WHERE id = $bus_id");
    echo "Booking Successful. <a href='mybookings.php'>View</a>";
    exit;
}

$bus = $conn->query("SELECT * FROM buses WHERE id = $bus_id")->fetch_assoc();
?>
<h2>Book: <?= $bus['bus_name'] ?></h2>
<form method="POST">
    Seat No: <input name="seat_no" type="number" required><br>
    <input type="submit" value="Book">
</form>