<?php
    include ("../config/db_connection.php");
    include ("../css/style.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $db->query("SELECT * FROM list WHERE id = $id");
        $row = $result->fetch_assoc();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $task_name = $_POST['task_name'];
        $sql = "UPDATE list SET name = '$task_name' WHERE id = $id";
        if ($db->query($sql) === TRUE) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
?>

<div class="container">
    <h2 class="mt-5 mb-4">Edit Tugas</h2>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="task_name">Nama Tugas:</label>
            <input type="text" class="form-control" id="task_name" name="task_name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="../index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>



