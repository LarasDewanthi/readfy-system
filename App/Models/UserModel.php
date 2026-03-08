<?php

namespace App\Models;

use App\Config\Database;
use PDO;

/*
|--------------------------------------------------------------------------
| USER MODEL
|--------------------------------------------------------------------------
| Class ini digunakan untuk berinteraksi dengan tabel "users"
| di database.
|
| Fungsi utama class ini adalah mengambil data user saat proses login.
|
*/

class UserModel {

    // variabel koneksi database
    private $conn;

    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    | Membuat koneksi database saat object dibuat
    |
    */
    public function __construct() {

        $database = new Database();
        $this->conn = $database->connect();
    }

    /*
    |--------------------------------------------------------------------------
    | FIND BY EMAIL
    |--------------------------------------------------------------------------
    | Method ini digunakan untuk mencari user berdasarkan email
    | pada tabel users.
    |
    | Digunakan saat proses login.
    |
    */
    public function findByEmail($email) {

        // menyiapkan query
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE email=?"
        );

        // menjalankan query
        $stmt->execute([$email]);

        // mengambil hasil query sebagai array associative
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}