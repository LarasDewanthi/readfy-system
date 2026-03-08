<?php

require '../../App/Config/Database.php';
require '../../App/Interfaces/CrudInterface.php';
require '../../App/Controllers/MemberController.php';

use App\Controllers\MemberController;

$controller = new MemberController();

$id = $_GET['id'];

$controller->delete($id);

header("Location: index.php");
exit;