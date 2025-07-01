<?php
require_once '../models/User.php'; // Importa el modelo User

// Verifica si el formulario fue enviado correctamente por método POST y con botón 'register'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    
    // Recoge los datos del formulario y los limpia de espacios
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Valida que los campos no estén vacíos
    if (!empty($name) && !empty($email) && !empty($password)) {
        
        // Encripta la contraseña con un algoritmo seguro
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Crea instancia del modelo User
        $user = new User();

        // Llama al método register y guarda si fue exitoso
        $result = $user->register($name, $email, $hashedPassword);

        // Si el registro fue exitoso, redirige al login
        if ($result) {
            header("Location: ../views/login.php");
            exit(); // Detiene la ejecución
        } else {
            // Si hubo un fallo en el guardado
            echo "Error al registrar usuario.";
        }

    } else {
        // Si algún campo está vacío, muestra un mensaje
        echo "Todos los campos son obligatorios.";
    }
}
// Para sign in
session_start();
require_once '../models/User.php';

// LOGIN
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $userModel = new User();
        $user = $userModel->login($email);

        if ($user && password_verify($password, $user['password'])) {
            // Inicio de sesión exitoso
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Redirigir al dashboard (ajústalo según tu sistema)
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            // Credenciales incorrectas
            echo "Correo o contraseña inválidos.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
