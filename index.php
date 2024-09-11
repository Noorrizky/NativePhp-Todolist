<?php
    include ("config/db_connection.php");
    include ("css/style.php")
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4 text-center">Todo-List</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Tugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $db->query("SELECT * FROM list");
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td>
                                    <a href="form/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="konfirmasiHapus(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                
                <div class="mt-3">
                    <a href="form/tambah.php" class="btn btn-primary">Tambah Tugas</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function konfirmasiHapus(id) {
        if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {
            window.location.href = 'aksi/hapus.php?id=' + id;
        }
    }
    </script>
</body>
</html>
