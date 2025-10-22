<!DOCTYPE html>
<html lang="es">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoColombia - Explora tu país</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2e0e6b6d5.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>




  <header class="w-full sticky top-0 z-50 bg-orange-600">
    <nav class="border-gray-200 bg-orange-600 py-2.5">
      <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between px-4">




        <div class="flex items-center gap-3">
          <img src="../img/image.png" alt="Logo GoColombia" class="h-[50px] rounded-full filter brightness-[0.95]">
          <a href="#" class="flex items-center">
            <span class="self-center text-2xl font-bold whitespace-nowrap text-white">GoColombia</span>
          </a>
        </div>




        <div class="flex items-center lg:order-2 space-x-3">
          <a href="./reservas_empleado.php"
            class="rounded-lg border-2 border-white px-4 py-2 text-sm font-medium text-white hover:bg-white hover:text-orange-600 transition duration-300"><i class="fas fa-user"> </i>
            <?php
            session_start();
            echo $_SESSION['nombre']; 
            ?>
          <a href="./close.php"
            class="rounded-lg border-2 border-white px-4 py-2 text-sm font-medium text-white hover:bg-white hover:text-orange-600 transition duration-300">Cerrar
            sesión</a>
        </div>




        <div class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto" id="mobile-menu-2">
          <ul class="mt-4 flex flex-col font-medium lg:mt-0 lg:flex-row lg:space-x-8">
            <li><a
                class="block border-b py-2 px-3 text-gray-200 hover:text-white lg:border-0 lg:hover:text-yellow-200 transition"
                href="#inicio" active>Inicio</a></li>
            <li><a
                class="block border-b py-2 px-3 text-gray-200 hover:text-white lg:border-0 lg:hover:text-yellow-200 transition"
                href="#destinos">Destinos</a></li>
            <li><a
                class="block border-b py-2 px-3 text-gray-200 hover:text-white lg:border-0 lg:hover:text-yellow-200 transition"
                href="./mis_reservas.php">Mis Reservas</a></li>
            <li><a
                class="block border-b py-2 px-3 text-gray-200 hover:text-white lg:border-0 lg:hover:text-yellow-200 transition"
                href="#contacto">Contáctanos</a></li>
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
          Descubre Colombia con nosotros
        </h2>




        <p class="mb-8 text-center text-base text-yellow-100 md:text-lg">
          Explora los mejores destinos del país, reserva tus viajes fácilmente y vive experiencias inolvidables.
          En <strong>GoColombia</strong> te conectamos con la aventura.
        </p>




        <a href="#destinos"
          class="mx-auto flex items-center justify-center rounded-lg border-2 border-white px-5 py-3 text-sm font-semibold text-white hover:bg-white hover:text-orange-600 transition duration-300">
          Explorar destinos
          <svg class="ml-2 h-5 w-5 text-white group-hover:text-orange-600 transition duration-300"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4" />
          </svg>
        </a>

      </div>
    </div>
  </div>

  <main class="min-h-screen">
  <section class="w-full mx-auto py-16 px-4">



    <div class="text-center mb-10">
      <h1 class="text-4xl font-extrabold text-orange-600 mb-2">Vive la experiencia GoColombia</h1>
      <p class="text-gray-600 text-lg">
        Viaja, descubre y disfruta cada rincón de nuestro país con comodidad y confianza.
      </p>
    </div>

    <div class="flex flex-col items-center space-y-16">




      <div
        class="xl:w-[80%] sm:w-[85%] w-[95%] mx-auto flex md:flex-row flex-col items-center bg-white shadow-lg rounded-2xl overflow-hidden transition-transform hover:scale-[1.01]">
        <img
          class="md:w-[50%] w-full object-cover h-80 md:h-auto"
          src="../img/explor.png"
          alt="Turismo en Colombia" />

        <div class="md:w-[50%] w-full p-8">
          <h2 class="text-3xl font-bold text-orange-600 mb-4">Explora los mejores destinos</h2>
          <p class="text-gray-700 leading-relaxed">
            Descubre los lugares más increíbles de Colombia: desde las playas del Caribe hasta los paisajes
            de la zona cafetera. En <strong class="text-orange-500">GoColombia</strong> te ayudamos a planear
            tu viaje ideal con paquetes y experiencias personalizadas.
          </p>
        </div>
      </div>




      <div
        class="xl:w-[80%] sm:w-[85%] w-[95%] mx-auto flex md:flex-row flex-col-reverse items-center bg-white shadow-lg rounded-2xl overflow-hidden transition-transform hover:scale-[1.01]">
        <div class="md:w-[50%] w-full p-8">
          <h2 class="text-3xl font-bold text-orange-600 mb-4">Reservas rápidas y seguras</h2>
          <p class="text-gray-700 leading-relaxed">
            Con nuestra plataforma podrás reservar hospedajes, tours y transportes en segundos.
            <strong class="text-orange-500">GoColombia</strong> garantiza una experiencia confiable,
            sencilla y adaptada a tus necesidades de viaje.
          </p>
        </div>

        <img
          class="md:w-[50%] w-full object-cover h-80 md:h-auto"
          src="../img/reservas.png"
          alt="Reservas seguras" />
      </div>

    </div>
  </section>
</main>


<section class="py-16 bg-gradient-to-b from-orange-50 to-white" id="destinos">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-extrabold text-orange-600">Explora Colombia</h2>
      <p class="text-gray-600 mt-2 text-lg">12 destinos imperdibles, divididos entre rutas aéreas y terrestres</p>
    </div>




    <h3 class="text-2xl font-bold text-orange-500 mb-6 flex items-center gap-2">
      <i class="fas fa-plane text-orange-600"></i> Rutas Aéreas
    </h3>
    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-3 mb-12">



      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/aereos/cartagena.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Cartagena</h4>
          <p class="text-gray-700 mt-2 text-sm">Historia, playas y ambiente caribeño. Ideal para escapadas cortas.</p>
          <a href="./formar.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>




      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/aereos/sanAndres.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">San Andrés</h4>
          <p class="text-gray-700 mt-2 text-sm">Mar de siete colores, buceo y relajación total.</p>
          <a href="./formar.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>        
        </div>
      </article>




      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/aereos/leticia.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Leticia (Amazonas)</h4>
          <p class="text-gray-700 mt-2 text-sm">Selva, cultura indígena y biodiversidad sin igual.</p>
          <a href="./formar.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>




      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/aereos/medellin.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Medellín</h4>
          <p class="text-gray-700 mt-2 text-sm">Clima primaveral, innovación y cultura urbana.</p>
          <a href="./formar.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>




      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/aereos/bogota.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Bogotá</h4>
          <p class="text-gray-700 mt-2 text-sm">Capital llena de historia, museos y gastronomía.</p>
          <a href="./formar.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>




      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/aereos/cali.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Cali</h4>
          <p class="text-gray-700 mt-2 text-sm">La capital mundial de la salsa. Música, ritmo y alegría.</p>
          <a href="./formar.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>
    </div>




    <h3 class="text-2xl font-bold text-orange-500 mb-6 flex items-center gap-2">
      <i class="fas fa-bus text-orange-600"></i> Rutas Terrestres
    </h3>
    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-3">



      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/terrestre/ejecaf.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Eje Cafetero</h4>
          <p class="text-gray-700 mt-2 text-sm">Paisajes de café, pueblos coloridos y cultura rural.</p>
          <a href="./formter.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>

      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/terrestre/leyva.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Villa de Leyva</h4>
          <p class="text-gray-700 mt-2 text-sm">Arquitectura colonial, fósiles y tranquilidad total.</p>
          <a href="./formter.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>

      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/terrestre/barichara.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Barichara</h4>
          <p class="text-gray-700 mt-2 text-sm">El pueblo más lindo de Colombia. Caminos de piedra y encanto.</p>
          <a href="./formter.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>

      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/terrestre/popayan.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Popayán</h4>
          <p class="text-gray-700 mt-2 text-sm">Ciudad blanca, historia y gastronomía tradicional.</p>
          <a href="./formter.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>

      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/terrestre/tatacoa.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Desierto de la Tatacoa</h4>
          <p class="text-gray-700 mt-2 text-sm">Cielos estrellados, colores únicos y turismo astronómico.</p>
          <a href="./formter.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>

      <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition transform">
        <img src="../img/terrestre/cañon.png" class="w-full h-48 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-orange-600">Cañón del Chicamocha</h4>
          <p class="text-gray-700 mt-2 text-sm">Aventura, parapente y vistas impresionantes.</p>
          <a href="./formter.php">
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition">Reservar ahora</button>
          </a>
        </div>
      </article>
    </div>
  </div>
</section>

<section id="contacto" class="bg-gradient-to-b from-orange-50 to-white py-16">
  <div class="max-w-5xl mx-auto px-6">
    <div class="text-center mb-10">
      <h3 class="text-3xl font-extrabold text-orange-600">Contáctanos</h3>
      <p class="text-gray-600 mt-2">¿Tienes dudas, quieres una cotización o asesoría personalizada? Escríbenos, estamos para ayudarte.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">



      <form class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
        <div>
          <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-1">Nombre completo</label>
          <input type="text" id="nombre" name="nombre" placeholder="Tu nombre"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico</label>
          <input type="email" id="email" name="email" placeholder="tunombre@email.com"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
        </div>

        <div>
          <label for="mensaje" class="block text-sm font-semibold text-gray-700 mb-1">Mensaje</label>
          <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntanos en qué te podemos ayudar..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"></textarea>
        </div>

        <button type="submit"
          class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg py-2 transition transform hover:scale-[1.02]">
          Enviar mensaje
        </button>
      </form>




      <div class="flex flex-col justify-center space-y-6">
        <div class="flex items-center space-x-4">
          <i class="fa-solid fa-location-dot text-orange-600 text-2xl"></i>
          <p class="text-gray-700">Centro de Biotecnología Agropecuaria, Colombia</p>
        </div>

        <div class="flex items-center space-x-4">
          <i class="fa-solid fa-phone text-orange-600 text-2xl"></i>
          <p class="text-gray-700">+57 322 406 5279</p>
        </div>

        <div class="flex items-center space-x-4">
          <i class="fa-solid fa-envelope text-orange-600 text-2xl"></i>
          <p class="text-gray-700">andresmancera06156@gmail.com</p>
        </div>
      </div>
    </div>
  </div>
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