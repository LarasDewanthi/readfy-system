<?php

namespace App\Models;

/*
|--------------------------------------------------------------------------
| CLASS USER
|--------------------------------------------------------------------------
| Class ini merupakan class dasar (parent class) yang merepresentasikan
| pengguna dalam sistem.
|
| Class ini memiliki beberapa atribut:
| - name  : nama pengguna
| - email : email pengguna
| - role  : peran pengguna (admin / user)
|
| Class ini juga akan diwarisi oleh class lain seperti Admin.
|
*/

class User {

    // atribut user
    protected $name;
    protected $email;
    protected $role;

    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    | Method ini dijalankan saat object User dibuat.
    | Digunakan untuk mengisi data awal user.
    |
    */
    public function __construct($name, $email, $role) {
        $this->name  = $name;
        $this->email = $email;
        $this->role  = $role;
    }

    // Mengambil nama user
    public function getName() {
        return $this->name;
    }

    // Mengambil email user
    public function getEmail() {
        return $this->email;
    }

    // Mengambil role user
    public function getRole() {
        return $this->role;
    }

    /*
    |--------------------------------------------------------------------------
    | GET ACCESS
    |--------------------------------------------------------------------------
    | Method ini menentukan hak akses user.
    | Method ini bisa dioverride oleh class turunan.
    |
    */
    public function getAccess() {
        return "User access";
    }
}