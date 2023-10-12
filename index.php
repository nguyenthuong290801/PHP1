<?php 
session_start();

require_once './vendor/autoload.php';

use App\core\App;
use App\core\Controller;
use App\core\Database;

$app = new App();
$controller = new Controller();
$database = new Database();

?>