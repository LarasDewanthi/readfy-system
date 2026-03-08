<?php

// Namespace untuk konfigurasi aplikasi
namespace App\Config;

use PDO;
use PDOException;

/*
|--------------------------------------------------------------------------
| CLASS DATABASE
|--------------------------------------------------------------------------
| Class ini digunakan untuk membuat koneksi ke database MySQL
| menggunakan PDO (PHP Data Object).
|
| Koneksi ini akan digunakan oleh controller lain seperti:
| - BookController
| - MemberController
| - LoanController
| - UserModel
|
*/

class Database {

    // Konfigurasi database
    private $host = "localhost";
    private $db_name = "book";
    private $username = "root";
    private $password = "";

    // Variabel untuk menyimpan koneksi
    public $conn;

    /*
    |--------------------------------------------------------------------------
    | METHOD CONNECT()
    |--------------------------------------------------------------------------
    | Method ini berfungsi untuk membuat koneksi database menggunakan PDO
    | dan mengembalikan objek koneksi tersebut.
    |
    */
    public function connect() {

        // Default koneksi = null
        $this->conn = null;

        try {

            // Membuat koneksi PDO ke MySQL
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );

            // Mengatur mode error PDO menjadi Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            // Jika koneksi gagal tampilkan pesan error
            die("Connection Error: " . $e->getMessage());
        }

        // Mengembalikan koneksi
        return $this->conn;
    }
}