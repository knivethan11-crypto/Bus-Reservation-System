<?php include 'db.php';
$user_id = $_SESSION['user_id'];
$res = $conn->query("SELECT b.*, bu.bus_name, bu.source, bu.destination, bu.date 
    FROM bookings b 
    JOIN buses bu ON b.bus_id = bu.id 
    WHERE b.user_id = $user_id");
echo "<h3>My Bookings</h3><table border='1'><tr><th>Bus</th><th>From</th><th>To</th><th>Date</th><th>Seat</th><th>Ticket</th></tr>";
while($row = $res->fetch_assoc()) {
    echo "<tr>
        <td>{$row['bus_name']}</td>
        <td>{$row['source']}</td>
        <td>{$row['destination']}</td>
        <td>{$row['date']}</td>
        <td>{$row['seat_no']}</td>
        <td><a href='print.php?id={$row['id']}'>Print</a></td>
    </tr>";
}
echo "</table>";