<?php
    include_once("./connect.php");
    
    $id = $_GET["id"];

    $query_get_data= mysqli_query($db,"SELECT * FROM staff WHERE id = $id");
    $staff = mysqli_fetch_assoc($query_get_data);
    
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];
        
        $query = mysqli_query($db, "UPDATE staff SET nama = '$nama',telp = '$telp', email = '$email' WHERE id=$id" );    
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT STAFF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container w-75 my-4">
        <h1>Form Edit Staff</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input value="<?php echo $staff['nama'] ?>" type="text" id="nama" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp</label>
                <input value="<?php echo $staff['telp'] ?>" type="text" id="telp" name="telp" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="<?php echo $staff['email'] ?>" type="text" id="email" name="email" class="form-control">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a class="btn btn-secondary" href="./staff.php">Kembali Ke Daftar Staff</a>
    </div>
</body>
</html>