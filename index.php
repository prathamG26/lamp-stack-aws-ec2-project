<?php
$conn = new mysqli("localhost", "lampuser", "Lamp@123", "lampdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<h2>LAMP Stack Web Application on AWS EC2</h2>";

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["fullname"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["created_at"]."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
