<?php
session_start ();

include_once("./connect.php");

// isset : apakah ada?
// apakah ada kiriman data email dan password dari database
if (isset ($_POST['email']) && isset ($_POST['password'])) {
    // simpen data email ke variabel email
    $email = $_POST ['email'];

    // simpen data password di variabel password
    // password_hash : melalukan hashing ke password
    // PASSWORD_DEFAULT : algoritma hashing bcrypt
    $password = password_hash ($_POST ['password'], PASSWORD_DEFAULT) ;

    // cek apakah email sudah pernah terdaftar di database
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($db, $sql);

    // apakah email ada di database
    if (mysqli_num_rows ($result) > 0) {
        echo "Email sudah terdaftar.";
    } else {
        // bikin 1 query sql baru untuk memasukan data
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
            
            // kalo registrasi berhasil
            if (mysqli_query($db, $sql) === TRUE) {
                echo "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
            
            // kalo registrasi gagal
            }else {
                echo "Registrasi gagal!";
        }
    }
}