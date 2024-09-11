<?php
    include ("../config/db_connection.php");

    // Pastikan form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nama = $_POST['nama'];

        // Buat query untuk memasukkan data
        $query = "INSERT INTO list (name) VALUES ('$nama')";

        // Jalankan query
        if ($db->query($query) === TRUE) {
            // Redirect ke index.php setelah berhasil menambahkan data
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $db->error;
        }
    }

    // Tutup koneksi database
    $db->close();
?>