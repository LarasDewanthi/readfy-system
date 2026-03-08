<?php

// Namespace untuk interface
namespace App\Interfaces;

/*
|--------------------------------------------------------------------------
| INTERFACE CRUD
|--------------------------------------------------------------------------
| Interface ini mendefinisikan method standar CRUD
| yang harus dimiliki oleh setiap controller.
|
| CRUD = Create, Read, Update, Delete
|
| Controller yang menggunakan interface ini:
| - BookController
| - MemberController
| - LoanController
|
*/

interface CrudInterface {

    // Menambahkan data baru
    public function create($data);

    // Mengambil semua data
    public function read();

    // Mengupdate data berdasarkan ID
    public function update($id, $data);

    // Menghapus data berdasarkan ID
    public function delete($id);

    // Mengambil satu data berdasarkan ID
    public function getById($id);
}