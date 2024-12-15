<?php
// Add CORS headers
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Allowed HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowed headers

// Handle preflight OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Include your API logic
require_once './config/db.php';
require_once './controllers/UserController.php';

$database = new Database();
$db = $database->connect();

$userController = new UserController($db);

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/fitness-way-api/index.php/users':
        $userController->getAllUsers();
        break;
    case '/fitness-way-api/index.php/products':
        $userController->getAllUsers();
        break;
    default:
        Response::json(["message" => "Endpoint not found"], 404);
        break;
}
