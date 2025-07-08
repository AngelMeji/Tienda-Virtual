<?php
    require_once __DIR__ . '/../models/Categoria.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;

        if ($id && is_numeric($id)) {
            if (Categoria::eliminar($id)) {
                header('Location: ../CategoryManagement.php?success=3');
            } else {
                header('Location: ../CategoryManagement.php?error=db');
            }
        } else {
            header('Location: ../CategoryManagement.php?error=id');
        }
        exit;
    }
?>