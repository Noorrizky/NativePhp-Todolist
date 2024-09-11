<?php
    include ("../config/db_connection.php");

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $stmt = $db->prepare("DELETE FROM list WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: ../index.php");
    exit();

?>