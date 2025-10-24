<?php
require_once "config.php";

$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
$result = $mysqli->query($sql);

if (!$result) {
    die("Query Error: ". $mysqli->error);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
        <h1 class="mb-4">Manajemen Data Buku</h1>
        <a href="add_book.php" class="btn btn-primary mb-3">Tambah Buku Baru</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM buku ORDER BY id_buku DESC";
                    $result = $mysqli->query($sql);
                    $no = 1;
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><?php echo $no ?></th>
                        <td><?php echo $row['judul'] ?></td>
                        <td><?php echo $row['penulis'] ?></td>
                        <td><?php echo $row['penerbit'] ?></td>
                        <td><?php echo $row['tahun_terbit'] ?></td>
                        <td><?php echo $row['stok'] ?></td>
                        <td>
                            <a href="edit_buku.php?id=<?php echo $row['id_buku'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="hapus_buku.php?id=<?php echo $row['id_buku'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>