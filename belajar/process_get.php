<?php
if (isset($_GET['nama']) && isset($_GET['email']) && isset($_GET['password'])) {
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Hash password untuk keamanan (menggunakan bcrypt secara default)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); //terenskripsi

    // Konfigurasi koneksi database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "pendaftaran";

    // Membuat koneksi ke database
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menggunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>
                alert('Mahasiswa sudah berhasil registrasi (GET)');
                window.location.href='register_get.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: register_get.php");
    exit();
}
?>
