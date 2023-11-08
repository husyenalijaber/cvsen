<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM cv_dats WHERE id=1"); // Sesuaikan dengan id CV
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    .profile-image {
        display: block; /* Change to block display to use margin: 0 auto for centering */
        width: 215px;
        height: 265px;
        margin: 0 auto 15px; /* Margin for top and bottom, 0 for left and right, auto for horizontal centering */
    }

    .comment {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
    }

    .biru {
        background-color: aliceblue;
    }
    .cv-table {
        width: 100%;
        border-collapse: collapse; /* Remove space between table cells */
    }
    .cv-table th, .cv-table td {
        border: 1px solid #ddd; /* Add border to table cells */
        padding: 8px;
        text-align: left;
    }
</style>


    <script src="script.js"></script>
    <title>Curriculum Vitae</title>
</head>

<body class="p-3">
    <nav class="navbar sticky-top bg-body-tertiary biru">
        <div class="container-fluid">
            <h1>Curriculum Vitae</h1>
            <a class="navbar-brand" href="admin.php">Update</a>
        </div>
    </nav>
    <div class="card">
        <div class="p-3">
            <img src="<?php echo $data['foto_path']; ?>" alt="Foto Profil" class="profile-image">
            <div class="card-body">
                <table class="cv-table">
                    <tr>
                        <th>Nama:</th>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat:</th>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Telepon:</th>
                        <td><?php echo $data['telepon']; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Web:</th>
                        <td><?php echo $data['web']; ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td><?php echo $data['pendidikan']; ?></td>
                    </tr>
                    <tr>
                        <th>Pengalaman Kerja:</th>
                        <td><?php echo $data['pengalaman_kerja']; ?></td>
                    </tr>
                    <tr>
                        <th>Keterampilan:</th>
                        <td><?php echo $data['keterampilan']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
