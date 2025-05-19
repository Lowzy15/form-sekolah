<?php
include 'db.php';

$sql = "SELECT * FROM siswa ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="button.css">
</head>
<body>
<header>
    <h1>Sistem Data Siswa</h1>
    <nav>
        <a href="register.html">Tambah Data</a>
        <a href="datasiswa.php">Lihat Data</a>
    </nav>
</header>

<div class="tabel1">
    <h2>Daftar Siswa/Guru</h2>
    <div class="table-responsive">
        <table border="1" cellpadding="10" cellspacing="0" style="width:100%;">
            <tr style="background-color:#0078D7; color:white;">
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Sebagai</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . $row['nisn'] . '</td>
                    <td>' . $row['kelas'] . '</td>
                    <td>' . $row['jenis_kelamin'] . '</td>
                    <td>' . $row['jurusan'] . '</td>
                    <td>' . $row['sebagai'] . '</td>
                    <td>
                        <div class="btn-group">
                            <a href="edit.php?id=' . $row['id'] . '"><button class="btn-blue">Edit</button></a>
                            <a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus?\');"><button class="btn-red">Delete</button></a>
                        </div>
                    </td>
                </tr>';
                    $no++;
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>Tidak ada data</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<footer>
    <p></p>
</footer>
</body>
</html>
