<?php
    // Importa el archivo donde está la clase User (modelo)
    require_once __DIR__ . '/../models/User.php';

    // Se crea la clase que manejará todo lo relacionado con usuarios
    class UserController {

        // Método para registrar nuevos usuarios
        public function register() {
            // Verifica si se envió el formulario por POST y si se presionó el botón "register"
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {

                // Obtiene los datos del formulario y elimina espacios al inicio y final
                $nombre   = trim($_POST['nombre']);
                $email    = trim($_POST['email']);
                $password = trim($_POST['password']);

                // Verifica que todos los campos estén llenos
                if (!empty($nombre) && !empty($email) && !empty($password)) {

                    // Cifra la contraseña para guardarla de forma segura
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Crea una instancia del modelo User y llama a la función para registrar
                    $user = new User();
                    $result = $user->register($nombre, $email, $hashedPassword);

                    // Si se registró correctamente, redirige al formulario de inicio de sesión
                    if ($result) {
                        header("Location: index.php?controller=user&action=signin");
                        exit();
                    } else {
                        // Si hubo un error al registrar, muestra un mensaje
                        echo "Error al registrar usuario.";
                    }
                } else {
                    // Si algún campo está vacío, muestra un mensaje
                    echo "Todos los campos son obligatorios.";
                }
            }
        }

        // Método para iniciar sesión
        public function login() {
            // Verifica si se envió el formulario y se presionó el botón "login"
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

                // Obtiene los datos del formulario y los limpia
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);

                // Verifica que los campos no estén vacíos
                if (!empty($email) && !empty($password)) {

                    // Busca al usuario en la base de datos usando el modelo
                    $userModel = new User();
                    $user = $userModel->login($email);

                    // Verifica que el usuario exista y que la contraseña sea correcta
                    if ($user && password_verify($password, $user['password'])) {

                        // Inicia la sesión si aún no ha sido iniciada
                        if (session_status() === PHP_SESSION_NONE) session_start();

                        // Guarda la información del usuario en la sesión
                        $_SESSION['usuario'] = [
                            'id' => $user['id'],
                            'nombre' => $user['nombre'],
                            'email' => $user['email'],
                            'rol' => $user['rol']
                        ];

                        // Redirige al inicio del sitio
                        header("Location: index.php");
                        exit();
                    } else {
                        // Si la contraseña o el correo están mal, muestra un mensaje
                        echo "Correo o contraseña inválidos.";
                    }
                } else {
                    // Si algún campo está vacío, muestra un mensaje
                    echo "Todos los campos son obligatorios.";
                }
            }
        }

        // Método para cerrar sesión
        public function logout() {
            // Inicia la sesión si no está iniciada
            if (session_status() === PHP_SESSION_NONE) session_start();

            // Elimina todas las variables de sesión
            session_unset();

            // Destruye la sesión
            session_destroy();

            // Limpia el búfer de salida (por seguridad)
            if (ob_get_length()) ob_end_clean();

            // Redirige a la página de inicio
            header("Location: index.php");
            exit(); 
        }

        // Cargar la vista de inicio de sesión
        public function signin() {
            require_once './views/signin.php';
        }

        // Cargar la vista de registro
        public function registerView() {
            require_once './views/register.php';
        }
    }
?>