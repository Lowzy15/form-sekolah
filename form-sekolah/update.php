<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $sebagai = $_POST['sebagai'];

    $sql = "UPDATE siswa SET nama=?, nisn=?, jenis_kelamin=?, kelas=?, jurusan=?, sebagai=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nama, $nisn, $jenis_kelamin, $kelas, $jurusan, $sebagai, $id);

    if ($stmt->execute()) {
        header("Location: datasiswa.php");
    } else {
        echo "Error saat mengupdate: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>