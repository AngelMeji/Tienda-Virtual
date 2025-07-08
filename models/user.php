<?php
require_once '../config/conexion.php'; // Importa la clase Database para conectarse a la BD

class User {
    private $conn; // Propiedad para la conexión

    public function __construct() {
        $this->conn = Database::connect(); // Establece la conexión al instanciar la clase
    }

    // Método para registrar al usuario
    public function register($name, $email, $password) {
        // Prepara la consulta SQL con placeholders (?)
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");

        // Si falla la preparación, retorna false
        if (!$stmt) {
            return false;
        }

        // Asocia los parámetros a los placeholders (3 strings)
        $stmt->bind_param("sss", $name, $email, $password);

        // Ejecuta la consulta y guarda el resultado (true/false)
        $success = $stmt->execute();

        // Cierra la sentencia preparada
        $stmt->close();

        // Retorna el resultado de la ejecución
        return $success;
    }
    //  Para el sign in
    public function login($email) {
        // Consulta segura: busca al usuario por email
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Si encontró un usuario, lo retorna como arreglo asociativo
        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

}
