<?php
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM buku" );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Daftar Buku</h1>
        <table class="table table-striped">
            <tr>
                    <td>Nama</td>
                    <td>ISBN</td>
                    <td>Unit</td>
                    <td>ACTION</td>
                </tr>
                <?php foreach($query as $buku) { ?>
                    <tr>
                        <td><?php echo $buku["nama"]?></td>
                        <td><?php echo $buku["isbn"]?></td>
                        <td><?php echo $buku["unit"]?></td>
                        <td><a class="btn btn-outline-warning" href=<?php echo "edit-buku.php?id=" . $buku["id"] ?>>EDIT</a>
                            <a class="btn btn-outline-danger" href=<?php echo "delete-buku.php?id=" . $buku["id"] ?>>HAPUS</a>
                            </td>
                    </tr>
                <?php } ?>
        </table>
        <a class="btn btn-primary" href="./tambah-buku.php">Tambah Buku</a> 
        <a class="btn btn-secondary" href="./index.php">Kembali Ke Halaman Utama</a>
    </div>
    
</body>
</html>