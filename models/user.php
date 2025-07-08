<?php
require_once __DIR__ . '/../config/conexion.php'; // Importa la clase Database para conectarse a la BD

class User {
    private $conn; // Propiedad para la conexión

    public function __construct() {
        $this->conn = Database::connect(); // Establece la conexión al instanciar la clase
    }

    // Método para registrar al usuario
    public function register($nombre, $email, $password) {
        // Prepara la consulta SQL con placeholders (?)
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        if (!$stmt) return false; // Si falla la preparación, retorna false
        
        
        $stmt->bind_param("sss", $nombre, $email, $password); // Asocia los parámetros a los placeholders (3 strings)
        $success = $stmt->execute(); // Ejecuta la consulta y guarda el resultado (true/false)
        $stmt->close(); // Cierra la sentencia preparada


        return $success; // Retorna el resultado de la ejecución
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
