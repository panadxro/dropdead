<?php
require_once "../../functions/autoload.php";
$email = $_POST["email"];
$pass = $_POST["pass"];
$id = $_POST["id"];

$usuario = (new Usuario())->usuario_x_email($email);

if ($usuario) {
  if (password_verify($pass, $usuario->getPassword())) {
      try {
          $usuario->edit(
              $_POST["id"],
              $_POST["email"], 
              $_POST["rol_id"],
              $_POST["new_pass"] ?? null
          );
          header("Location: ../index.php?sec=admin_usuarios");
      } catch (Exception $e) {
          echo $e->getMessage();
          die("Error al editar usuario");
      }
  } else {
    (new Alerta())->add_alerta("Contraseña actual incorrecta.", "danger");
    header("Location: ../index.php?sec=edit_usuario&id=$id");
  }
} else {
  header("Location: ../index.php?sec=admin_usuarios");
}