<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['password']) && isset($_FILES['profile_pic']['name'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profile_pic = $_FILES['image']['name'];


    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // File extension validation
    $extension = strtolower(pathinfo($profile_pic, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif format allowed');</script>";
    } else {
        // Rename the image file for uniqueness
        $imgnewfile = md5($profile_pic) . time() . "." . $extension;

        // Directory to upload image
        $upload_dir = "images/";

        // Ensure the directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $imgnewfile)) {

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

            // Prepared statement untuk keamanan
            $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $email, $hashed_password);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Mahasiswa sudah berhasil registrasi (POST)');
                        window.location.href='register_post.php';
                    </script>";
                
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "<script>alert('Failed to upload image');</script>";
        }
    }
}else{
    header("Location: register_post.php");
    exit();
}

?>
