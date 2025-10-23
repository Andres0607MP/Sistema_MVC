1# 🌐 Sistema Web MVC - Agencia GoColombia

Sistema web desarrollado en **PHP** con arquitectura **MVC**, diseñado para gestionar **reservas de viajes** de una agencia llamada **GoColombia**.  
El sistema permite la gestión de cuentas, reservas, destinos y roles de usuario (cliente, empleado y administrador).

---

## 🧩 Características principales

### 👤 Roles de usuario

- **Cliente:**  
  - Puede iniciar sesión, crear reservas y consultar sus propias reservas.
  
- **Empleado:**  
  - Puede visualizar todas las reservas realizadas por los clientes.
  - Puede **editar el estado de las reservas** (Confirmada o Rechazada).
  - No puede modificar los datos personales de los clientes (nombre, correo).
  - Visualización organizada con **acordeones por cliente**.

- **Administrador:**  
  - Posee todos los privilegios del empleado.
  - Además puede **eliminar reservas**.
  - Interfaz limpia y jerárquica con acordeones para cada cliente.

---

## ⚙️ Tecnologías utilizadas

| Tipo | Herramienta |
|------|--------------|
| Lenguaje backend | PHP 8+ |
| Base de datos | MySQL / MariaDB |
| Servidor local | XAMPP |
| Frontend | HTML5, CSS3, JavaScript |
| Estructura | Modelo - Vista - Controlador (MVC) |

---
## 🗃️ Estructura de la base de datos

La base de datos del sistema se llama **almacen** y contiene las siguientes tablas:

### 🧑‍💻 Tabla: `cuenta`
Guarda la información básica de cada usuario.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_cuenta` | INT (PK) | Identificador único del usuario |
| `nombre` | VARCHAR(100) | Nombre completo del usuario |
| `correo` | VARCHAR(100) | Correo electrónico del usuario |
| `contrasena` | VARCHAR(255) | Contraseña encriptada |

---

### 🔑 Tabla: `cuenta_rol`
Relaciona las cuentas con los diferentes roles del sistema.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_cuenta` | INT (FK) | Relación con la tabla `cuenta` |
| `id_rol` | INT (FK) | Relación con la tabla `rol` |

---

### 🧭 Tabla: `destino`
Registra las ciudades o regiones disponibles para viajes.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_destino` | INT (PK) | Identificador del destino |
| `ciudad` | VARCHAR(100) | Nombre de la ciudad o región |

---

### 📅 Tabla: `viaje`
Contiene los viajes creados, enlazando el destino y transporte.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_viaje` | INT (PK) | Identificador del viaje |
| `id_transporte` | INT (FK) | Relación con la tabla `transporte` |
| `id_destino` | INT (FK) | Relación con la tabla `destino` |
| `fecha_salida` | DATE | Fecha programada de salida |

---

### 🧾 Tabla: `reserva`
Registra las reservas hechas por los clientes.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_reserva` | INT (PK) | Identificador de la reserva |
| `id_cuenta` | INT (FK) | Relación con la tabla `cuenta` |
| `id_viaje` | INT (FK) | Relación con la tabla `viaje` |
| `fecha_reserva` | DATETIME | Fecha en la que se realizó la reserva |
| `cantidad_pasajeros` | INT | Número de pasajeros incluidos |
| `estado` | VARCHAR(20) | Estado de la reserva (Pendiente, Confirmada, Rechazada) |

---

### 🚌 Tabla: `transporte`
Contiene los tipos de transporte disponibles.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_transporte` | INT (PK) | Identificador del transporte |
| `tipo` | VARCHAR(50) | Tipo de transporte (Aéreo, Terrestre, etc.) |

---

### 🛡️ Tabla: `rol`
Define los diferentes roles dentro del sistema.
| Campo | Tipo | Descripción |
|--------|------|-------------|
| `id_rol` | INT (PK) | Identificador del rol |
| `nombre_rol` | VARCHAR(50) | Nombre del rol (Administrador, Empleado, Cliente) |

---

🔗 **Relaciones principales:**
- `cuenta` 1 — N `reserva`  
- `cuenta` 1 — N `cuenta_rol`  
- `rol` 1 — N `cuenta_rol`  
- `viaje` 1 — N `reserva`  
- `destino` 1 — N `viaje`  
- `transporte` 1 — N `viaje`

---

¿Quieres que te genere también el **diagrama relacional visual (MER)** en imagen o código SQL (para importarlo en Workbench o phpMyAdmin)?


## 🔐 Roles configurados

| ID | Rol | Descripción |
|----|-----|--------------|
| 1 | Administrador | Acceso total al sistema. |
| 2 | Empleado | Gestión de reservas. |
| 3 | Cliente | Creación y consulta de reservas. |

---

## 💡 Funciones destacadas

✅ **Validación de sesión:** protección por roles con `$_SESSION['rol']`.
✅ **Inserción segura:** consultas con `prepare()` y `bind_param()`.
✅ **Organización visual:** acordeones por cliente para editar reservas.
✅ **Notificaciones:** alertas de confirmación con JavaScript.
✅ **Control de acceso:** IDs 6 y 7 (cuentas internas) ocultos al personal.

---

## 👨‍💻 Desarrollado por

**Andrés Mancera**
Estudiante de **Tecnólogo en Análisis y Desarrollo de Software (ADSO)** - SENA
Proyecto académico con enfoque en **desarrollo web dinámico** y buenas prácticas de programación.

---
## Mapa de navegacion
## INICIO (index.html)
│
### ├── Iniciar Sesión (login.html)
### │     └── login.php → valida credenciales
### │           ├── index_ad.php → Panel administrador
### │           ├── index_cli.php → Panel cliente
### │           └── reservas_empleado.php → Panel empleado
### │
### ├── Panel Administrador (index_ad.php)
### │     ├── reservas_admin.php → gestión de reservas
### │     ├── mis_reservas_ad.php → ver reservas propias
### │     ├── save_reserva.php → guardar nueva reserva
### │     └── close.php → cerrar sesión
### │
### ├── Panel Cliente (index_cli.php)
### │     ├── mis_reservas.php → ver mis reservas
### │     ├── save_client.php → registrar cliente
### │     ├── formar.php → formulario para transporte aéreo
### │     ├── formter.php → formulario para transporte terrestre
### │     └── close.php → cerrar sesión
### │
### └── Panel Empleado (reservas_empleado.php)
###      ├── mis_reservas.php → ver reservas asignadas
###      ├── save_reserva.php → crear o actualizar reserva
###      └── close.php → cerrar sesión
---

## 🧾 Licencia

Este proyecto es de uso **educativo y libre** bajo la licencia MIT.
Puedes modificarlo y adaptarlo siempre que cites al autor original.
