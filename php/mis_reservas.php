<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('./db.php');

if (!isset($_SESSION['id_cuenta'])) {
    echo "<script>
          alert('Debes iniciar sesión para ver tus reservas.');
          window.location.href='../login.html';
        </script>";
    exit;
}

$idCuenta = $_SESSION['id_cuenta'];

$sql = "SELECT 
          r.id_reserva,
          d.ciudad,
          v.fecha_salida,
          r.cantidad_pasajeros,
          r.fecha_reserva,
          r.vip,
          r.estado
        FROM reserva r
        INNER JOIN viaje v ON r.id_viaje = v.id_viaje
        INNER JOIN destino d ON v.id_destino = d.id_destino
        WHERE r.id_cuenta = ?
        ORDER BY r.fecha_reserva DESC";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idCuenta);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoColombia - Explora tu país</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2e0e6b6d5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/a2e0e6b6d5.js" crossorigin="anonymous"></script>
</head>

<body>




    <header class="w-full sticky top-0 z-50">
        <nav class="border-gray-200 bg-orange-600 py-2.5">
            <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between px-4">




                <div class="flex items-center gap-3">
                    <img src="../img/image.png" alt="Logo GoColombia"
                        class="h-[50px] rounded-full filter brightness-[0.95]">
                    <a href="#" class="flex items-center">
                        <span class="self-center text-2xl font-bold whitespace-nowrap text-white">GoColombia</span>
                    </a>
                </div>




                <div class="flex items-center lg:order-2 space-x-3">
                    <a href="#"
                        class="rounded-lg border-2 border-white px-4 py-2 text-sm font-medium text-white hover:bg-white hover:text-orange-600 transition duration-300"><i
                            class="fas fa-user"> </i>
                         <?php echo $_SESSION['nombre']; ?>
                        </a>
                    <a href="./close.php"
                        class="rounded-lg border-2 border-white px-4 py-2 text-sm font-medium text-white hover:bg-white hover:text-orange-600 transition duration-300">Cerrar
                        sesión</a>
                </div>




                <div class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto" id="mobile-menu-2">
                    <ul class="mt-4 flex flex-col font-medium lg:mt-0 lg:flex-row lg:space-x-8">
                        <li><a class="block border-b py-2 px-3 text-gray-200 hover:text-white lg:border-0 lg:hover:text-yellow-200 transition"
                                href="./index.php">Inicio</a></li>
                        <li><a class="block border-b py-2 px-3 text-gray-200 hover:text-white lg:border-0 lg:hover:text-yellow-200 transition"
                                href="#" active>Mis Reservas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


  <div class="relative bg-orange-600" id="inicio">
    <div class="absolute inset-x-0 bottom-0">
      <svg viewBox="0 0 224 12" fill="currentColor" class="-mb-1 w-full text-white" preserveAspectRatio="none">
        <path
          d="M0,0 C48.8902582,6.27314026 86.2235915,9.40971039 112,9.40971039 C137.776408,9.40971039 175.109742,6.27314026 224,0 L224,12.0441132 L0,12.0441132 L0,0 Z">
        </path>
      </svg>
    </div>

    <div class="mx-auto px-4 py-10 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8 lg:py-14">
      <div class="relative max-w-2xl sm:mx-auto sm:text-center">




        <h2 class="mb-6 text-center font-sans text-4xl font-bold tracking-tight text-white sm:text-5xl sm:leading-none">
          Mis Reservas
        </h2>




        <p class="mb-8 text-center text-base text-yellow-100 md:text-lg">
          Aquí puedes ver todas tus reservas registradas. 
        </p>




        
      </div>
    </div>
  </div>
    

    <section id="reservas" class="bg-gradient-to-b flex flex-col items-center justify-center min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
           
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-4xl overflow-hidden">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="bg-orange-600 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Destino</th>
                        <th class="px-6 py-3">Fecha salida</th>
                        <th class="px-6 py-3">Pasajeros</th>
                        <th class="px-6 py-3">Fecha reserva</th>
                        <th class="px-6 py-3">Vip</th>
                        <th class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-3 font-medium"><?= htmlspecialchars($row['ciudad']) ?></td>
                                <td class="px-6 py-3"><?= htmlspecialchars($row['fecha_salida']) ?></td>
                                <td class="px-6 py-3"><?= htmlspecialchars($row['cantidad_pasajeros']) ?></td>
                                <td class="px-6 py-3"><?= htmlspecialchars($row['fecha_reserva']) ?></td>
                                <td class="px-6 py-3"><?= $row['vip'] === 'si'  ? 'Sí' : 'No' ?></td>
                                <td class="px-6 py-3">
                                    <span class="px-3 py-1 rounded-full text-white 
                      <?= $row['estado'] === 'Confirmada' ? 'bg-green-500' : 'bg-yellow-500' ?>">
                                        <?= htmlspecialchars($row['estado']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">No tienes reservas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="index.php" class="mt-6 text-orange-600 hover:underline">⬅ Volver al inicio</a>
    </section>
    <footer>
        <div class="bg-orange-600 text-white py-6">
            <div class="mx-auto max-w-screen-xl px-4 text-center">
                <p>&copy; 2025 GoColombia. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>

<?php
$stmt->close();
$conexion->close();
?>