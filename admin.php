<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission here, update the database with the new data
    $id = 1; // Replace with the CV ID you want to edit

    // Retrieve form data and sanitize it as needed
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $web = isset($_POST['web']) ? $_POST['web'] : '';
    $pendidikan = isset($_POST['pendidikan']) ? $_POST['pendidikan'] : '';
    $pengalaman_kerja = isset($_POST['pengalaman_kerja']) ? $_POST['pengalaman_kerja'] : '';
    $keterampilan = isset($_POST['keterampilan']) ? $_POST['keterampilan'] : '';

    // Perform the update query
    $update_query = "UPDATE cv_dats SET nama='$nama', alamat='$alamat', telepon='$telepon', email='$email', web='$web', pendidikan='$pendidikan', pengalaman_kerja='$pengalaman_kerja', keterampilan='$keterampilan' WHERE id=$id";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Retrieve the updated data from the database
        $result = mysqli_query($conn, "SELECT * FROM cv_dats WHERE id=1");
        $data = mysqli_fetch_array($result);
        // Display a success message
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
} else {
    $result = mysqli_query($conn, "SELECT * FROM cv_dats WHERE id=1"); // Sesuaikan dengan id CV
    $data = mysqli_fetch_array($result);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <title>Update CV</title>
</head>

<body class="p-3">
  <!-- <div class="container mt-5"> -->
    <nav class="navbar sticky-top bg-body-tertiary biru">
      <div class="container-fluid">
        <h1>Update CV</h1>
        <a class="navbar-brand" href="/cvsen/index.php">View</a>
      </div>
    </nav>
    <div class="card">
      <div class="p-3">
        <div class="card-body">
          <form method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Nama" required>
              <label for="alamat" class="form-label">Alamat</label>
              <input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required>
              <label for="telepon" class="form-label">Telepon</label>
              <input class="form-control" id="telepon" type="text" name="telepon" value="<?php echo $data['telepon']; ?>" placeholder="Telepon" required>
              <label for="email" class="form-label">Email</label>
              <input class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email" required>
              <label for="web" class="form-label">Web</label>
              <input class="form-control" id="web" type="text" name="web" value="<?php echo $data['web']; ?>" placeholder="Web" required>
              <label for="pendidikan" class="form-label">Pendidikan</label>
              <textarea class="form-control" id="pendidikan" name="pendidikan" rows="3" placeholder="Pendidikan" required><?php echo $data['pendidikan']; ?></textarea>
              <label for="pengalamanKerja" class="form-label">Pengalaman Kerja</label>
              <textarea class="form-control" id="pengalamanKerja" name="pengalaman_kerja" rows="3" placeholder="Pengalaman Kerja" required><?php echo $data['pengalaman_kerja']; ?></textarea>
              <label for="keterampilan" class="form-label">Keterampilan</label>
              <textarea class="form-control" id="keterampilan" name="keterampilan" rows="3" placeholder="Keterampilan" required><?php echo $data['keterampilan']; ?></textarea>
              <label for="formFile" class="form-label">Foto Path</label>
              <input class="form-control" type="text" id="formFile" name="foto_path" value="<?php echo $data['foto_path']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  <!-- </div> -->
</body>

</html>
