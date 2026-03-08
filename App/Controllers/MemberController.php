<?php

namespace App\Controllers;

use App\Config\Database;
use App\Interfaces\CrudInterface;
use PDO;

/*
|--------------------------------------------------------------------------
| MEMBER CONTROLLER
|--------------------------------------------------------------------------
| Digunakan untuk mengelola data anggota perpustakaan
| pada tabel "members".
|
*/

class MemberController implements CrudInterface {

    private $conn;

    // Constructor untuk koneksi database
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Menambahkan anggota baru
    public function create($data) {

        $stmt = $this->conn->prepare(
            "INSERT INTO members (name, email, phone) VALUES (?, ?, ?)"
        );

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone']
        ]);
    }

    // Menampilkan semua anggota
    public function read() {

        $stmt = $this->conn->prepare("SELECT * FROM members");
        $stmt->execute();

        return $stmt;
    }

    // Update data anggota
    public function update($id, $data) {

        $stmt = $this->conn->prepare(
            "UPDATE members SET name=?, email=?, phone=? WHERE id=?"
        );

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $id
        ]);
    }

    // Menghapus anggota
    public function delete($id) {

        $stmt = $this->conn->prepare(
            "DELETE FROM members WHERE id=?"
        );

        return $stmt->execute([$id]);
    }

    // Mengambil data anggota berdasarkan ID
    public function getById($id) {

        $stmt = $this->conn->prepare(
            "SELECT * FROM members WHERE id=?"
        );

        $stmt->execute([$id]);

        return $stmt;
    }
}