<?php
$conn = new mysqli("localhost", "root", "", "vihara");

// Fetch all pending bookings
$result = $conn->query("SELECT b.id, u.username, p.name AS package_name, b.num_people, b.from_date, b.to_date, b.total_price
                        FROM bookings b
                        JOIN users u ON b.user_id = u.id
                        JOIN packages p ON b.package_id = p.id
                        WHERE b.status = 'Pending'
                        ORDER BY b.created_at DESC");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><b>{$row['username']}</b> booked <b>{$row['package_name']}</b> for {$row['num_people']} people from {$row['from_date']} to {$row['to_date']}.</p>";
    }
} else {
    echo "<p>No new bookings.</p>";
}
?>
