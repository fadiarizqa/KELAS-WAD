<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pendaftaran";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, nama, email, profile_pic FROM mahasiswa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row["nama"] . "</h3>";
        echo "<p>Email: " . $row["email"] . "</p>";

        if (!empty($row["profile_pic"])) {
            echo "<img src='images/" . $row["profile_pic"] . "' alt='Profile Image' width='150' height='150'>";
        } else {
            echo "<p>No image available</p>";
        }

        echo "</div>";
        echo "<hr>";
    }
} else {
    echo "No students found.";
}

$conn->close();
?>
