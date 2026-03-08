<?php

namespace App\Controllers;

require_once __DIR__ . '/../Interfaces/CrudInterface.php';
require_once __DIR__ . '/../Config/Database.php';

use App\Config\Database;
use App\Interfaces\CrudInterface;
use PDO;

/*
|--------------------------------------------------------------------------
| LOAN CONTROLLER
|--------------------------------------------------------------------------
| Controller ini mengelola data peminjaman buku
| pada tabel "loans".
|
*/

class LoanController implements CrudInterface {

    private $conn;

    // Constructor koneksi database
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Menambahkan data peminjaman
    public function create($data) {

        $stmt = $this->conn->prepare(
            "INSERT INTO loans (book_id, member_id, loan_date, return_date) VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([
            $data['book_id'],
            $data['member_id'],
            $data['loan_date'],
            $data['return_date']
        ]);
    }

    // Menampilkan data peminjaman dengan join tabel
    public function read() {

        $stmt = $this->conn->prepare("
            SELECT l.*, 
            b.title AS book_title, 
            m.name AS member_name 
            FROM loans l 
            JOIN books b ON l.book_id=b.id 
            JOIN members m ON l.member_id=m.id
        ");

        $stmt->execute();
        return $stmt;
    }

    // Update data peminjaman
    public function update($id, $data) {

        $stmt = $this->conn->prepare(
            "UPDATE loans SET book_id=?, member_id=?, loan_date=?, return_date=? WHERE id=?"
        );

        return $stmt->execute([
            $data['book_id'],
            $data['member_id'],
            $data['loan_date'],
            $data['return_date'],
            $id
        ]);
    }

    // Menghapus data peminjaman
    public function delete($id) {

        $stmt = $this->conn->prepare("DELETE FROM loans WHERE id=?");
        return $stmt->execute([$id]);
    }

    // Mengambil data peminjaman berdasarkan ID
    public function getById($id) {

        $stmt = $this->conn->prepare("SELECT * FROM loans WHERE id=?");

        $stmt->execute([$id]);

        return $stmt;
    }
}