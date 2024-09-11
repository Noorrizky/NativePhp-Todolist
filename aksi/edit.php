<?php
    include ("../config/db_connection.php");
    include ("../css/style.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $task_name = $_POST['task_name'];
        
        // Gunakan prepared statement untuk mencegah SQL injection
        $sql = "UPDATE list SET name = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("si", $task_name, $id);
        
        if ($stmt->execute()) {
            // Jika berhasil, arahkan kembali ke halaman utama
            header("Location: ../index.php");
            exit();
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }

    $db->close();
?>