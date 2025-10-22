<?php
session_start();
include('./db.php'); // usa $conexion

if (!isset($_SESSION['id_cuenta'])) {
    echo "<script>
            alert('Debes iniciar sesión para realizar una reserva.');
            window.location.href='../login.html';
          </script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idCuenta = $_SESSION['id_cuenta'];
    $region = $_POST['region'];
    $fechaSalida = $_POST['fechaSalida'];
    $pasajeros = $_POST['pasajeros'];
    $vip = isset($_POST['vip']) ? $_POST['vip'] : 'no'; // 👈 Capturamos el valor del formulario

    // Validación básica
    if (empty($region) || empty($fechaSalida) || empty($pasajeros)) {
        echo "<script>
                alert('Por favor completa todos los campos.');
                window.history.back();
              </script>";
        exit;
    }

    // Buscar destino o crearlo si no existe
    $consultaDestino = $conexion->prepare("SELECT id_destino FROM destino WHERE ciudad = ?");
    $consultaDestino->bind_param("s", $region);
    $consultaDestino->execute();
    $resultado = $consultaDestino->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $idDestino = $fila['id_destino'];
    } else {
        $insertDestino = $conexion->prepare("INSERT INTO destino (ciudad) VALUES (?)");
        $insertDestino->bind_param("s", $region);
        $insertDestino->execute();
        $idDestino = $conexion->insert_id;
        $insertDestino->close();
    }

    $consultaDestino->close();

    // Crear un viaje (por simplicidad)
    $idTransporte = 1; // Ejemplo: 1 = Aéreo
    $insertViaje = $conexion->prepare("INSERT INTO viaje (id_transporte, id_destino, fecha_salida) VALUES (?, ?, ?)");
    $insertViaje->bind_param("iis", $idTransporte, $idDestino, $fechaSalida);
    $insertViaje->execute();
    $idViaje = $conexion->insert_id;
    $insertViaje->close();

    // Registrar la reserva con campo VIP
    $insertReserva = $conexion->prepare("INSERT INTO reserva (id_cuenta, id_viaje, cantidad_pasajeros, vip) VALUES (?, ?, ?, ?)");
    $insertReserva->bind_param("iiis", $idCuenta, $idViaje, $pasajeros, $vip);

    if ($insertReserva->execute()) {
        echo "<script>
                alert('✅ Reserva registrada exitosamente.');
                window.location.href='./mis_reservas.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error al registrar la reserva.');
                window.history.back();
              </script>";
    }

    $insertReserva->close();
    $conexion->close();
} else {
    echo "<script>
            alert('Acceso no permitido.');
            window.location.href='./index.php';
          </script>";
}
?>
