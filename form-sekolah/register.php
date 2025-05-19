<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $sebagai = $_POST['sebagai'];

        $sql = "INSERT INTO siswa (nama, nisn, jenis_kelamin, kelas, jurusan, sebagai)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nama, $nisn, $jenis_kelamin, $kelas, $jurusan, $sebagai);
    

    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'datasiswa.php';
            </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>