<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Mahasiswa (POST)</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran Mahasiswa (POST)</h2>
        <form action="process_post.php" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
         
            <label for="profile_pic">Select image file to upload:</label>
            <input type="file" class="form-control" name="profile_pic" accept=".jpg, .jpeg, .png, .gif" required>
            <span style="color:red; font-size:12px;">Only jpg / jpeg / png / gif format allowed.</span>

            <input type="submit" value="Daftar">
        </form>
    
    </div>
            
    </div>
</body>
</html>
