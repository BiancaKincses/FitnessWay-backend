<?php
require_once './models/User.php';
require_once './helpers/Response.php';

class UserController {
    private $db;
    private $userModel;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function getAllUsers() {
        $users = $this->userModel->getAllUsers();
        Response::json($users);
    }
}
