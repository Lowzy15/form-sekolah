<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM siswa WHERE id=$id");

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Edit Data Siswa</h1>
</header>

<div class="container">
    <form action="update.php" method="POST" class="form-register">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>

        <label for="nisn">NIS/MP:</label>
        <input type="text" id="nisn" name="nisn" value="<?php echo $data['nisn']; ?>" required>

        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" value="<?php echo $data['kelas']; ?>" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki" <?php if($data['jenis_kelamin']=='Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
            <option value="Perempuan" <?php if($data['jenis_kelamin']=='Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>" required>

        <label for="sebagai">Sebagai:</label>
        <select id="sebagai" name="sebagai" required>
            <option value="">--Pilih Peran--</option>
            <option value="siswa" <?php if($data['sebagai']=='siswa') echo 'selected'; ?>>Siswa</option>
            <option value="guru" <?php if($data['sebagai']=='guru') echo 'selected'; ?>>Guru</option>
        </select>

        <input type="submit" name="submit" value="Update">
    </form>
</div>
</body>
</html>