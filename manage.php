<?php
include "db.php";
$result = $conn->query("SELECT * FROM packages");
?>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Description</th>
        <th>Hotel Details</th>
        <th>Price Per Head</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><img src="uploads/<?php echo $row['image']; ?>" width="100"></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['hotel_details']; ?></td>
        <td>$<?php echo $row['price_per_head']; ?></td>
        <td>
            <a href="edit_package.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete_package.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>