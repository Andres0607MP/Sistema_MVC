<?php
include "./db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
    $correo = trim($_POST['email']);
    $contrasena = trim($_POST['password']);
    $confirm = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : "";

    if (!empty($nombre)) {
        if ($contrasena !== $confirm) {
            echo "<script>alert('Las contraseñas no coinciden'); window.history.back();</script>";
            exit;
        }

        $check = $conexion->prepare("SELECT * FROM cuenta WHERE correo = ?");
        $check->bind_param("s", $correo);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Este correo ya está registrado'); window.history.back();</script>";
            exit;
        }

        // Encriptar contraseña
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Insertar en cuenta
        $insert = $conexion->prepare("INSERT INTO cuenta (nombre, correo, contrasena) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $nombre, $correo, $hash);

        if ($insert->execute()) {
            $id_cuenta = $conexion->insert_id;
            $rol_cliente = 3; // Cliente

            // Asignar rol
            $rolInsert = $conexion->prepare("INSERT INTO cuenta_rol (id_cuenta, id_rol) VALUES (?, ?)");
            $rolInsert->bind_param("ii", $id_cuenta, $rol_cliente);
            $rolInsert->execute();

            echo "<script>alert('¡Cuenta creada correctamente!'); window.location='../login.html';</script>";
        } else {
            echo "<script>alert('Error al crear la cuenta'); window.history.back();</script>";
        }

    // INICIO DE SESIÓN
    } else {
        $login = $conexion->prepare("SELECT * FROM cuenta WHERE correo = ?");
        $login->bind_param("s", $correo);
        $login->execute();
        $result = $login->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($contrasena, $user['contrasena'])) {
                session_start();
                $_SESSION['id_cuenta'] = $user['id_cuenta'];
                $_SESSION['nombre'] = $user['nombre'];

                // Consultar rol
                $rolQuery = $conexion->prepare("SELECT id_rol FROM cuenta_rol WHERE id_cuenta = ?");
                $rolQuery->bind_param("i", $user['id_cuenta']);
                $rolQuery->execute();
                $rolResult = $rolQuery->get_result();
                $rol = $rolResult->fetch_assoc()['id_rol'];

                $_SESSION['id_rol'] = $rol;

                switch ($rol) {
                    case 1:
                        echo "<script>
                                alert('Bienvenido Administrador');
                                window.location='./reservas_admin.php';
                              </script>";
                        break;
                    case 2:
                        echo "<script>
                                alert('Bienvenido Empleado');
                                window.location='./reservas_empleado.php';
                              </script>";
                        break;
                    case 3:
                        echo "<script>
                                alert('Inicio de sesión exitoso');
                                window.location='./index.php';
                              </script>";
                        break;
                    default:
                        echo "<script>
                                alert('Rol no reconocido');
                                window.location='../login.html';
                              </script>";
                }

            } else {
                echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('No existe una cuenta con ese correo'); window.history.back();</script>";
        }
    }
}

$conexion->close();
?>
