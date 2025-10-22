<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GoColombia | Iniciar Sesión</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <div x-data="authPage()" class="min-h-screen bg-gray-100">
    <div class="min-h-screen flex">
      



    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md">
          <div class="bg-white rounded-2xl shadow-xl p-8">




          <div class="text-center mb-8">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-4">
                <i x-show="isLogin" class="fas fa-sign-in-alt text-orange-600 fa-lg"></i>
                <i x-show="!isLogin" class="fas fa-user-plus text-orange-600 fa-lg"></i>
              </div>
              <h2 class="text-2xl font-bold text-gray-800">
                <span x-text="isLogin ? '¡Bienvenido de nuevo!' : 'Crear cuenta'"></span>
              </h2>
              <p class="text-gray-600 mt-2">
                <span x-text="isLogin ? 'Inicia sesión para continuar' : 'Comienza creando tu cuenta'"></span>
              </p>
            </div>




            <form @submit.prevent="handleSubmit">
              



            <div x-show="!isLogin" class="mb-6 transition-all duration-300 ease-out">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo</label>
                <input
                  type="text"
                  x-model="name"
                  required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-colors"
                  placeholder="Tu Nombre Completo"
                />
              </div>




              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                <div class="relative">
                  <input
                    type="email"
                    x-model="email"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-colors"
                    placeholder="you@example.com"
                  />
                  <i class="fas fa-envelope absolute right-3 top-4 text-gray-400"></i>
                </div>
                <p x-show="email && !validateEmail(email)" class="mt-2 text-sm text-red-600">
                  Ingresa un correo válido.
                </p>
              </div>




              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                <div class="relative">
                  <input
                    :type="showPassword ? 'text' : 'password'"
                    x-model="password"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-colors"
                    placeholder="••••••••"
                  />
                  <button
                    type="button"
                    aria-label="Mostrar u ocultar contraseña"
                    class="absolute right-3 top-3 text-gray-400 hover:text-gray-600"
                    @click="showPassword = !showPassword"
                  >
                    <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                  </button>
                </div>
                <p x-show="password && !validatePassword(password)" class="mt-2 text-sm text-red-600">
                  La contraseña debe tener al menos 8 caracteres.
                </p>
              </div>




              <div x-show="!isLogin" class="mb-6 transition-all duration-300 ease-out">
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                <div class="relative">
                  <input
                    :type="showConfirmPassword ? 'text' : 'password'"
                    x-model="confirmPassword"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-colors"
                    placeholder="••••••••"
                  />
                  <button
                    type="button"
                    aria-label="Mostrar u ocultar confirmación de contraseña"
                    class="absolute right-3 top-3 text-gray-400 hover:text-gray-600"
                    @click="showConfirmPassword = !showConfirmPassword"
                  >
                    <i :class="showConfirmPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                  </button>
                </div>
                <p x-show="confirmPassword && !validateConfirmPassword()" class="mt-2 text-sm text-red-600">
                  Las contraseñas no coinciden.
                </p>
              </div>




              <button
                type="submit"
                class="w-full bg-orange-600 text-white py-3 rounded-lg font-semibold hover:bg-orange-700 focus:ring-4 focus:ring-orange-400 focus:ring-opacity-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="
                  loading ||
                  (email && !validateEmail(email)) ||
                  (password && !validatePassword(password)) ||
                  (!isLogin && confirmPassword && !validateConfirmPassword())
                "
              >
                <span x-show="loading" class="inline-flex items-center">
                  <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Procesando...
                </span>
                <span x-show="!loading" x-text="isLogin ? 'Iniciar sesión' : 'Crear cuenta'"></span>
              </button>




              <p class="mt-6 text-center text-gray-600">
                <span x-text="isLogin ? '¿No tienes cuenta?' : '¿Ya tienes cuenta?'"></span>
                <button
                  type="button"
                  class="ml-1 text-orange-600 hover:text-orange-700 font-semibold focus:outline-none"
                  @click="isLogin = !isLogin"
                >
                  <span x-text="isLogin ? 'Regístrate' : 'Inicia sesión'"></span>
                </button>
              </p>
            </form>
          </div>
        </div>
      </div>




      <div
        class="hidden lg:block lg:w-1/2 bg-cover bg-center"
        style="background-image: url('./img/font.svg');"
        alt="Fondo de paisaje colombiano"
      >
        <div class="h-full bg-black bg-opacity-50 flex items-center justify-center">
          <div class="text-center text-white px-12">
            <h2 class="text-4xl font-bold mb-6">Bienvenido a <span class="text-orange-400">GoColombia</span></h2>
            <p class="text-xl">Explora, reserva y viaja por todo el país con solo unos clics.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('authPage', () => ({
        isLogin: true,
        showPassword: false,
        showConfirmPassword: false,
        email: '',
        password: '',
        confirmPassword: '',
        name: '',
        loading: false,

        validateEmail(email) {
          return /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/.test(email);
        },

        validatePassword(password) {
          return password.length >= 8;
        },

        validateConfirmPassword() {
          return this.password === this.confirmPassword;
        },

        handleSubmit() {
          this.loading = true;
          setTimeout(() => {
            this.loading = false;
            alert(this.isLogin ? '¡Inicio de sesión exitoso!' : '¡Cuenta creada correctamente!');
          }, 1500);
        }
      }));
    });
  </script>
</body>
</html>
