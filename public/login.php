<?php

// memulai session untuk menyimpan data login user
session_start();

// memanggil file class yang dibutuhkan
require_once '../App/Models/User.php';
require_once '../App/Models/Admin.php';
require_once '../App/Config/Database.php';
require_once '../App/Models/UserModel.php';

// menggunakan namespace class
use App\Models\User;
use App\Models\Admin;
use App\Models\UserModel;

// variabel untuk menyimpan pesan error
$error = "";

/*
|--------------------------------------------------------------------------
| PROSES LOGIN
|--------------------------------------------------------------------------
| Kode ini akan dijalankan ketika user menekan tombol login
| karena form menggunakan method POST
|
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // membuat object UserModel untuk mengambil data user dari database
    $userModel = new UserModel();

    // mencari user berdasarkan email yang dimasukkan
    $userData  = $userModel->findByEmail($_POST['email']);

    /*
    |--------------------------------------------------------------------------
    | VALIDASI PASSWORD
    |--------------------------------------------------------------------------
    | Mengecek apakah user ditemukan dan password yang dimasukkan
    | sesuai dengan password yang ada di database
    |
    */

    if ($userData && password_verify($_POST['password'], $userData['password'])) {

        /*
        |--------------------------------------------------------------------------
        | CEK ROLE USER
        |--------------------------------------------------------------------------
        | Jika role admin maka object yang dibuat adalah Admin
        | Jika bukan maka object User biasa
        |
        | Ini merupakan implementasi konsep OOP:
        | - Inheritance
        | - Polymorphism
        |
        */

        if ($userData['role'] === 'admin') {

            // membuat object Admin
            $user = new Admin(
                $userData['name'],
                $userData['email'],
                $userData['role']
            );

        } else {

            // membuat object User biasa
            $user = new User(
                $userData['name'],
                $userData['email'],
                $userData['role']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | MENYIMPAN DATA USER KE SESSION
        |--------------------------------------------------------------------------
        | Data ini digunakan agar user tetap login saat berpindah halaman
        |
        */

        $_SESSION['user'] = [
            'name'   => $user->getName(),   // mengambil nama user
            'email'  => $user->getEmail(),  // mengambil email user
            'role'   => $user->getRole(),   // mengambil role user
            'access' => $user->getAccess()  // hak akses user
        ];

        // pesan sukses login
        $_SESSION['success'] = "Login successful. Welcome!";

        // mengarahkan user ke halaman dashboard
        header("Location: dashboard.php");
        exit;

    } else {

        // jika email atau password salah
        $error = "Email or password incorrect!";
    }
}

?>

<!-- menghubungkan file CSS -->
<link rel="stylesheet" href="style.css">

<!-- library icon dari fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- container login -->
<div class="login-container">

    <!-- judul halaman login -->
    <h1><span>📚</span> Login Akun</h1>

    <!-- menampilkan pesan error jika login gagal -->
    <?php if ($error): ?>
        <p class="error-msg"><?= $error ?></p>
    <?php endif; ?>

    <!-- form login -->
    <form method="POST" class="login-form">

        <!-- input email -->
        <input type="email" name="email" placeholder="Email" required>

        <!-- input password -->
        <input type="password" name="password" placeholder="Password" required>

        <!-- tombol login -->
        <button type="submit">Login</button>

    </form>
</div>