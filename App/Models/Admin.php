<?php

namespace App\Models;

/*
|--------------------------------------------------------------------------
| CLASS ADMIN
|--------------------------------------------------------------------------
| Class Admin merupakan turunan (inheritance) dari class User.
|
| Artinya Admin mewarisi semua atribut dan method dari class User,
| tetapi dapat memiliki perilaku khusus yang berbeda.
|
*/

class Admin extends User {

    /*
    |--------------------------------------------------------------------------
    | METHOD GET ACCESS
    |--------------------------------------------------------------------------
    | Method ini menimpa (override) method getAccess()
    | dari class User.
    |
    | Ini adalah contoh konsep POLYMORPHISM dalam OOP.
    |
    */
    public function getAccess() {
        return "Admin can manage books";
    }
}