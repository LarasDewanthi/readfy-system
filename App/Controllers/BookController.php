<?php

namespace App\Controllers;

use App\Config\Database;
use App\Interfaces\CrudInterface;
use PDO;

/*
|--------------------------------------------------------------------------
| BOOK CONTROLLER
|--------------------------------------------------------------------------
| Controller ini digunakan untuk mengelola data buku
| pada tabel "books".
|
| Fitur yang tersedia:
| - Tambah buku
| - Menampilkan buku
| - Update buku
| - Hapus buku
|
*/

class BookController implements CrudInterface {

    // Variabel koneksi database
    private $conn;

    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    | Saat objek dibuat, otomatis akan membuat koneksi database
    |
    */
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE BOOK
    |--------------------------------------------------------------------------
    | Menambahkan data buku ke database
    |
    */
    public function create($data) {

        $stmt = $this->conn->prepare(
            "INSERT INTO books (title, author, stock) VALUES (?, ?, ?)"
        );

        return $stmt->execute([
            $data['title'],
            $data['author'],
            $data['stock']
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | READ BOOKS
    |--------------------------------------------------------------------------
    | Mengambil semua data buku dari tabel books
    |
    */
    public function read() {

        $stmt = $this->conn->prepare("SELECT * FROM books");
        $stmt->execute();

        return $stmt;
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE BOOK
    |--------------------------------------------------------------------------
    | Mengubah data buku berdasarkan ID
    |
    */
    public function update($id, $data) {

        $stmt = $this->conn->prepare(
            "UPDATE books SET title=?, author=?, stock=? WHERE id=?"
        );

        return $stmt->execute([
            $data['title'],
            $data['author'],
            $data['stock'],
            $id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE BOOK
    |--------------------------------------------------------------------------
    | Menghapus buku berdasarkan ID
    |
    */
    public function delete($id) {

        $stmt = $this->conn->prepare(
            "DELETE FROM books WHERE id=?"
        );

        return $stmt->execute([$id]);
    }

    /*
    |--------------------------------------------------------------------------
    | GET BOOK BY ID
    |--------------------------------------------------------------------------
    | Mengambil satu data buku berdasarkan ID
    |
    */
    public function getById($id) {

        $stmt = $this->conn->prepare(
            "SELECT * FROM books WHERE id=?"
        );

        $stmt->execute([$id]);

        return $stmt;
    }
}