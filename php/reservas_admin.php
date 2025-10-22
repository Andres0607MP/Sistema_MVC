<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('./db.php');

// Verificar sesión y rol de administrador
if (!isset($_SESSION['id_cuenta']) || !isset($_SESSION['id_rol']) || (int)$_SESSION['id_rol'] !== 1) {
  echo "<script>alert('Acceso denegado.'); window.location.href='../index.php';</script>";
  exit;
}

// Eliminar reserva
if (isset($_POST['eliminar'], $_POST['id_reserva'])) {
  $id_reserva = $_POST['id_reserva'];
  $stmt = $conexion->prepare("DELETE FROM reserva WHERE id_reserva = ?");
  $stmt->bind_param("i", $id_reserva);
  $stmt->execute();
  echo "<script>alert('🗑️ Reserva eliminada correctamente.'); window.location.href='reservas_admin.php';</script>";
  exit;
}

// Actualizar reserva
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_reserva']) && !isset($_POST['eliminar'])) {
  $id_reserva = $_POST['id_reserva'];
  $cantidad_pasajeros = $_POST['cantidad_pasajeros'];
  $estado = $_POST['estado'];
  $vip = $_POST['vip'];

  if (in_array($estado, ['Activa', 'Cancelada', 'Completada'])) {
    $stmt = $conexion->prepare("UPDATE reserva SET cantidad_pasajeros=?, estado=?, vip=? WHERE id_reserva=?");
    $stmt->bind_param("issi", $cantidad_pasajeros, $estado, $vip, $id_reserva);
    $stmt->execute();
  }
  echo "<script>alert('✅ Cambios guardados exitosamente.'); window.location.href='reservas_admin.php';</script>";
  exit;
}

// Consultar reservas agrupadas por cliente (excluyendo cuentas 6 y 7)
$query = "
  SELECT 
    r.id_reserva,
    r.id_cuenta,
    c.nombre,
    c.correo,
    d.ciudad AS destino,
    v.fecha_salida,
    r.cantidad_pasajeros,
    r.estado,
    r.vip
  FROM reserva r
  INNER JOIN cuenta c ON r.id_cuenta = c.id_cuenta
  INNER JOIN viaje v ON r.id_viaje = v.id_viaje
  INNER JOIN destino d ON v.id_destino = d.id_destino
  WHERE c.id_cuenta NOT IN (6)
  ORDER BY c.nombre ASC, r.id_reserva DESC
";
$result = $conexion->query($query);

// Agrupar por cliente
$reservasPorCliente = [];
while ($row = $result->fetch_assoc()) {
  $reservasPorCliente[$row['nombre'] . ' (' . $row['correo'] . ')'][] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Administrador - GoColombia</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</head>
<body class="bg-orange-50">

  <!-- Header -->
  <header class="bg-orange-600 py-3 text-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4">
      <div class="flex items-center gap-3">
        <img src="../img/image.png" class="h-12 rounded-full" alt="Logo">
        <span class="text-2xl font-bold">GoColombia - Admin</span>
      </div>
      <div class="flex gap-3">
        <span class="bg-orange-500 px-4 py-2 rounded-lg border border-white">
          <i class="fas fa-user-shield"></i> <?= htmlspecialchars($_SESSION['nombre']); ?>
        </span>
        <a href="./close.php"
          class="px-4 py-2 rounded-lg bg-white text-orange-600 border border-white hover:bg-orange-100">
          Cerrar sesión
        </a>
      </div>
    </div>
  </header>

  <!-- Contenido -->
  <main class="max-w-6xl mx-auto py-10 px-4 h-screen">
    <h1 class="text-4xl font-bold text-orange-600 text-center mb-8">Panel de Reservas</h1>

    <div class="space-y-4">
      <?php foreach ($reservasPorCliente as $cliente => $reservas): ?>
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
          <!-- Encabezado del acordeón -->
          <button class="w-full flex justify-between items-center px-6 py-4 bg-orange-600 text-white font-semibold text-lg accordion-btn">
            <span><i class="fas fa-user"></i> <?= htmlspecialchars($cliente); ?> (<?= count($reservas) ?> reservas)</span>
            <i class="fas fa-chevron-down transition-transform duration-300"></i>
          </button>

          <!-- Contenido del acordeón -->
          <div class="hidden accordion-content">
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-orange-100 text-gray-900 uppercase text-xs">
                  <tr>
                    <th class="px-4 py-2">Destino</th>
                    <th class="px-4 py-2">Fecha salida</th>
                    <th class="px-4 py-2">Pasajeros</th>
                    <th class="px-4 py-2">Estado</th>
                    <th class="px-4 py-2">VIP</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($reservas as $reserva): ?>
                    <tr class="border-b hover:bg-orange-50 transition">
                      <form method="POST" class="flex flex-row" onsubmit="return confirmarAccion(event);">
                        <input type="hidden" name="id_reserva" value="<?= $reserva['id_reserva'] ?>">

                        <td class="px-4 py-2"><?= htmlspecialchars($reserva['destino']); ?></td>

                        <td class="px-4 py-2">
                          <input type="date" value="<?= htmlspecialchars($reserva['fecha_salida']); ?>"
                            class="border px-2 py-1 rounded w-full bg-gray-100 cursor-not-allowed" readonly>
                        </td>

                        <td class="px-4 py-2">
                          <input type="number" name="cantidad_pasajeros" min="1"
                            value="<?= htmlspecialchars($reserva['cantidad_pasajeros']); ?>"
                            class="border px-2 py-1 rounded w-full">
                        </td>

                        <td class="px-4 py-2">
                          <select name="estado" class="border px-2 py-1 rounded w-full">
                            <option value="Activa" <?= $reserva['estado'] === 'Activa' ? 'selected' : '' ?>>Activa</option>
                            <option value="Cancelada" <?= $reserva['estado'] === 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
                            <option value="Completada" <?= $reserva['estado'] === 'Completada' ? 'selected' : '' ?>>Completada</option>
                          </select>
                        </td>

                        <td class="px-4 py-2">
                          <select name="vip" class="border px-2 py-1 rounded w-full">
                            <option value="no" <?= $reserva['vip'] === 'no' ? 'selected' : '' ?>>No</option>
                            <option value="si" <?= $reserva['vip'] === 'si' ? 'selected' : '' ?>>Sí ⭐</option>
                          </select>
                        </td>

                        <td class="px-4 py-2 text-center flex gap-2 justify-center">
                          <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg transition">
                            <i class="fas fa-save"></i>
                          </button>
                        </form>

                        <form method="POST" onsubmit="return confirmarEliminacion();">
                          <input type="hidden" name="id_reserva" value="<?= $reserva['id_reserva'] ?>">
                          <input type="hidden" name="eliminar" value="1">
                          <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg transition">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <a href="./index_ad.php" class="block mt-8 text-center text-orange-600 font-medium hover:underline">
      ⬅ Volver al panel principal
    </a>
  </main>

  <footer class="bg-orange-600 text-white py-6 text-center mt-10">
    <p>&copy; 2025 GoColombia. Todos los derechos reservados.</p>
  </footer>

  <script>
    // Acordeón animado
    document.querySelectorAll(".accordion-btn").forEach(btn => {
      btn.addEventListener("click", () => {
        const content = btn.nextElementSibling;
        const icon = btn.querySelector("i.fas.fa-chevron-down");
        content.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
      });
    });

    // Confirmación al editar
    function confirmarAccion(e) {
      return confirm("¿Deseas guardar los cambios en esta reserva?");
    }

    // Confirmación al eliminar
    function confirmarEliminacion() {
      return confirm("⚠️ ¿Seguro que deseas eliminar esta reserva? Esta acción no se puede deshacer.");
    }
  </script>
</body>
</html>
