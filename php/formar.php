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
                        <?php
                        session_start();
                        echo $_SESSION['nombre']; 
                        ?>
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
                                href="#">Mis Reservas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="reservas" class="bg-gradient-to-b from-white to-orange-50 py-16">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-10">
                <h3 class="text-3xl font-extrabold text-orange-600">Reserva tu viaje con GoColombia</h3>
                <p class="text-gray-600 mt-2">Selecciona tu destin. ¡Nosotros nos
                    encargamos del resto!</p>
            </div>



            <form id="formReserva" action="./save_reserva.php" method="POST" class="bg-white shadow-2xl rounded-2xl p-8 space-y-6">
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-1">Nombre
                        completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                        required>
                </div>



                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Correo
                        electrónico</label>
                    <input type="email" id="email" name="email" placeholder="tunombre@email.com"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                        required>
                </div>



                <div>
                    <label for="region" class="block text-sm font-semibold text-gray-700 mb-1">Destino</label>
                    <select id="region" name="region"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                        required>
                        <option value="">Selecciona una región</option>
                        <optgroup label="Rutas aereas">
                            <option>Cartagena</option>
                            <option>San Andrés</option>
                            <option>Leticia (Amazonas)</option>
                            <option>Medellín</option>
                            <option>Bogotá</option>
                            <option>Cali</option>
                        </optgroup>
                    </select>
                </div>

                <div>
                    <fieldset class="border-2 border-orange-600 rounded-xl p-4">
                        <legend class="text-orange-600 font-semibold px-2">¿Eres cliente VIP?</legend>
                        <div class="flex items-center gap-6 mt-2">
                            <label for="si" class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" id="si" name="vip" value="si"
                                    class="text-orange-600 focus:ring-orange-500" required>
                                <span class="text-gray-700 font-medium">Sí</span>
                            </label>
                            <label for="no" class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" id="no" name="vip" value="no"
                                    class="text-orange-600 focus:ring-orange-500" required>
                                <span class="text-gray-700 font-medium">No</span>
                            </label>
                        </div>
                    </fieldset>
                </div>


                <!-- Fechas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="fechaSalida" class="block text-sm font-semibold text-gray-700 mb-1">Fecha</label>
                        <input type="date" id="fechaSalida" name="fechaSalida"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                            required>
                    </div>
                </div>



                <div>
                    <label for="pasajeros" class="block text-sm font-semibold text-gray-700 mb-1">Número de
                        pasajeros</label>
                    <input type="number" id="pasajeros" name="pasajeros" min="1" value="1"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                        required>
                </div>



                <button type="submit"
                    class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg py-3 transition transform hover:scale-[1.02]">
                    Reservar ahora
                </button>
            </form>
        </div>
    </section>

    <footer>
        <div class="bg-orange-600 text-white py-6">
            <div class="mx-auto max-w-screen-xl px-4 text-center">
                <p>&copy; 2025 GoColombia. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>



    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



<script>
    document.getElementById('formReserva').addEventListener('submit', e => {
        alert('✅ Enviando tu reserva...');
    });
</script>


</body>

</html>