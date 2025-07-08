<?php
require_once __DIR__ . '/../models/User.php'; // Importa el modelo User

class UserController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $nombre   = trim($_POST['nombre']);
            $email    = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $user = new User();
                $result = $user->register($nombre, $email, $hashedPassword);

                if ($result) {
                    header("Location: index.php?controller=user&action=signin");
                    exit();
                } else {
                    echo "Error al registrar usuario.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {
                $userModel = new User();
                $user = $userModel->login($email);

                if ($user && password_verify($password, $user['password'])) {
                    if (session_status() === PHP_SESSION_NONE) session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nombre'];
                    $_SESSION['user_email'] = $user['email'];

                    header("Location: index.php");
                    exit();
                } else {
                    echo "Correo o contraseña inválidos.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_unset();
        session_destroy();

        header("Location: index.php");
    }

    // Puedes crear vistas como login, register si las manejas desde el controlador
    public function signin() {
        require_once './views/signin.php';
    }

    public function registerView() {
        require_once './views/register.php';
    }

}