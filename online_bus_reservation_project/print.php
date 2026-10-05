<?php include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT b.*, u.username, bs.bus_name, bs.source, bs.destination, bs.date 
    FROM bookings b 
    JOIN users u ON b.user_id = u.id 
    JOIN buses bs ON b.bus_id = bs.id 
    WHERE b.id = $id")->fetch_assoc();
?>
<h2>Bus Ticket</h2>
<p>Name: <?= $row['username'] ?></p>
<p>Bus: <?= $row['bus_name'] ?></p>
<p>From: <?= $row['source'] ?> To: <?= $row['destination'] ?></p>
<p>Date: <?= $row['date'] ?> | Seat: <?= $row['seat_no'] ?></p>
<button onclick="window.print()">Print</button>