<?php

require '../../App/Config/Database.php';
require '../../App/Interfaces/CrudInterface.php';
require '../../App/Controllers/LoanController.php';

use App\Controllers\LoanController;

$controller = new LoanController();

$id = $_GET['id'];

$controller->delete($id);

header("Location: index.php");