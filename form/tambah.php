<?php
    include ("../config/db_connection.php");
    include ("../css/style.php");
?>

<div class="container mt-5">
    <h2>Tambah todo-list</h2>
    <form action="../aksi/tambah.php" method="POST">
        <div class="form-group">
            <label for="nama">Tambahkan:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>



