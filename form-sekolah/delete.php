<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM siswa WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: datasiswa.php");
    } else {
        echo "Error menghapus data: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
