<?php include 'db.php';
if ($_SESSION['role'] != 'admin') exit("Access Denied");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['bus_name'];
    $s = $_POST['source'];
    $d = $_POST['destination'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $seats = $_POST['seats'];
    $conn->query("INSERT INTO buses (bus_name, source, destination, date, time, seats_available)
                  VALUES ('$n', '$s', '$d', '$date', '$time', $seats)");
}
?>
<h2>Admin Panel - Add Bus</h2>
<form method="POST">
    Name: <input name="bus_name"><br>
    Source: <input name="source"><br>
    Destination: <input name="destination"><br>
    Date: <input name="date" type="date"><br>
    Time: <input name="time" type="time"><br>
    Seats: <input name="seats" type="number"><br>
    <input type="submit" value="Add Bus">
</form>