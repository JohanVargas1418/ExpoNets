✨ ExpoNets: ¡Tu Pasaporte a Eventos y Productos Inolvidables! 🚀
&lt;p align="center">
&lt;a href="[se quitó una URL no válida]">&lt;img src="[se quitó una URL no válida]" alt="Estado de la Construcción">&lt;/a>
&lt;a href="[se quitó una URL no válida]">&lt;img src="[se quitó una URL no válida]" alt="Descargas Totales">&lt;/a>
&lt;a href="[se quitó una URL no válida]">&lt;img src="[se quitó una URL no válida]" alt="Última Versión Estable">&lt;/a>
&lt;a href="[se quitó una URL no válida]">&lt;img src="[se quitó una URL no válida]" alt="Licencia">&lt;/a>
&lt;/p>

🌟 Sobre Laravel: La Magia Detrás de Escena
ExpoNets está construido sobre la sólida base de Laravel, un framework de aplicaciones web con una sintaxis elegante y expresiva. ¡Creemos que el desarrollo debe ser una experiencia placentera y creativa! 🎨 Laravel elimina el dolor de cabeza de tareas comunes en proyectos web, como:

🛣️ Motor de enrutamiento simple y rápido.
💉 Contenedor de inyección de dependencias potente.
💾 Múltiples back-ends para almacenamiento de sesiones y caché.
🐘 ORM de base de datos expresivo e intuitivo (Eloquent).
🔄 Migraciones de esquema de base de datos agnósticas.
⚙️ Procesamiento robusto de trabajos en segundo plano.
📢 Transmisión de eventos en tiempo real.
¡Laravel es accesible, potente y proporciona las herramientas necesarias para aplicaciones grandes y robustas! 💪

🎓 Aprende Laravel: ¡Conviértete en un Maestro!
Laravel cuenta con la documentación más extensa y completa 📚 y la biblioteca de tutoriales en video más grande de todos los frameworks modernos, lo que facilita enormemente el inicio:

📖 Sumérgete en la documentación oficial(https://laracasts.com) tiene miles de tutoriales en video! 🎓
Gestión de Usuarios Completa: Operaciones CRUD para usuarios con sus roles, nombres, correos y contraseñas. 🧑‍💻
Eventos Personalizados: Crea, edita y elimina eventos con descripciones, direcciones, fechas, horas, imágenes y modalidades. 🎉
Catálogo de Productos Dinámico: Administra tus productos con detalles como activo, cantidad, categoría, descripción, nombre y precio. 🛍️
Gestión de Órdenes Eficiente: Controla cada orden con sus fechas de creación, pago, recibo, número de orden y total. 🛒
Detalles de Órdenes Precisos: Desglosa cada orden por evento, producto, cantidad, método de pago, nombre, precio y total. 📋
Procesamiento de Pagos: Maneja los pagos de forma segura con número de tarjeta, fecha de vencimiento, código de seguridad, monto, dirección de facturación, código postal y fecha de pago. 💳
Sistema de Comentarios: Permite a los usuarios añadir comentarios con fecha, hora y el contenido del comentario. 💬
Notificaciones Personalizadas: Envía notificaciones con título, mensaje, estado de lectura, fecha y tipo. 🔔
Imágenes de Productos: Asocia múltiples imágenes a tus productos. 🖼️
Recuperación de Contraseña Segura: Implementa tokens de recuperación para restablecimiento de contraseñas. 🔒
Control de Acceso Basado en Roles (RBAC): Protege tus rutas y recursos según el rol del usuario. 🛡️
🛠️ Instalación: ¡Manos a la Obra!
Sigue estos sencillos pasos para poner en marcha ExpoNets en tu entorno local:

Clona el repositorio:

Bash

git clone [url_del_repositorio]
cd expoNets
Instala las dependencias de Composer:

Bash

composer install
Copia el archivo de entorno:

Bash

cp .env.example .env
Genera la clave de la aplicación:

Bash

php artisan key:generate
Genera la clave secreta de JWT:

Bash

php artisan jwt:secret
Configura tu base de datos:
Actualiza el archivo .env con tus credenciales de base de datos (ejemplo para MySQL):

Fragmento de código

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exponets_db
DB_USERNAME=root
DB_PASSWORD=
Ejecuta las migraciones de la base de datos:

Bash

php artisan migrate
Siembra la base de datos (opcional):

Bash

php artisan db:seed
Inicia el servidor de desarrollo:

Bash

php artisan serve
¡Tu aplicación estará lista en http://127.0.0.1:8000! 🥳

🔗 Endpoints de la API: ¡Conéctate!
Todos los endpoints de la API están definidos en routes/api.php.

Autenticación 🔒
POST /api/registrar - Registra un nuevo usuario.
POST /api/login - Inicia sesión y recibe un JWT.
POST /api/cerrar - Cierra la sesión (requiere JWT).
GET /api/listarDatos - Obtiene datos del usuario autenticado (requiere JWT).
Usuarios 🧑‍💻
GET /api/listarUsuarios - Lista todos los usuarios (requiere JWT).
POST /api/creaUsuario - Crea un nuevo usuario (requiere JWT).
GET /api/listarUsuario/{id} - Obtiene un usuario por ID (requiere JWT).
PUT /api/editarUsuario/{id} - Actualiza un usuario por ID (requiere JWT).
DELETE /api/eliminarUsuario/{id} - Elimina un usuario por ID (requiere JWT).
Eventos 🎉
GET /api/listarEventos - Lista todos los eventos (requiere JWT).
POST /api/crearEventos - Crea un nuevo evento (requiere JWT).
GET /api/listarEventos/{id} - Obtiene un evento por ID (requiere JWT).
PUT /api/editarEventos/{id} - Actualiza un evento por ID (requiere JWT).
DELETE /api/eliminarEventos/{id} - Elimina un evento por ID (requiere JWT).
Productos 🛍️
GET /api/listarProductos - Lista todos los productos (requiere JWT).
POST /api/crearProducto - Crea un nuevo producto (requiere JWT).
GET /api/listarProducto/{id} - Obtiene un producto por ID (requiere JWT).
PUT /api/editarProducto/{id} - Actualiza un producto por ID (requiere JWT).
DELETE /api/eliminarProducto/{id} - Elimina un producto por ID (requiere JWT).
Pagos 💳
GET /api/listarPagos - Lista todos los pagos (requiere JWT).
POST /api/crearProducto - Crea un nuevo pago (requiere JWT).
GET /api/listarProducto/{id} - Obtiene un pago por ID (requiere JWT).
PUT /api/editarProducto/{id} - Actualiza un pago por ID (requiere JWT).
DELETE /api/eliminarProducto/{id} - Elimina un pago por ID (requiere JWT).
Órdenes 🛒
GET /api/listarOrdenes - Lista todas las órdenes (requiere JWT).
POST /api/crearOrdenes - Crea una nueva orden (requiere JWT).
GET /api/listarOrdenes/{id} - Obtiene una orden por ID (requiere JWT).
PUT /api/editarOrdenes/{id} - Actualiza una orden por ID (requiere JWT).
DELETE /api/eliminarOrdenes/{id} - Elimina una orden por ID (requiere JWT).
Notificaciones 🔔
GET /api/listarNotificaciones - Lista todas las notificaciones (requiere JWT).
POST /api/crearNotificaciones - Crea una nueva notificación (requiere JWT).
GET /api/listarNotificaciones/{id} - Obtiene una notificación por ID (requiere JWT).
PUT /api/editarNotificaciones/{id} - Actualiza una notificación por ID (requiere JWT).
DELETE /api/eliminarNotificaciones/{id} - Elimina una notificación por ID (requiere JWT).
Imágenes de Producto 🖼️
GET /api/listarImagen - Lista todas las imágenes de productos (requiere JWT).
POST /api/crearImagen - Crea una nueva imagen de producto (requiere JWT).
GET /api/listarImagen/{id} - Obtiene una imagen de producto por ID (requiere JWT).
PUT /api/editarImagen/{id} - Actualiza una imagen de producto por ID (requiere JWT).
DELETE /api/eliminarImagen/{id} - Elimina una imagen de producto por ID (requiere JWT).
Detalles de Órdenes 📋
GET /api/listarDetalles - Lista todos los detalles de órdenes (requiere JWT).
POST /api/crearDetalles - Crea nuevos detalles de orden (requiere JWT).
GET /api/listarDetalles/{id} - Obtiene detalles de orden por ID (requiere JWT).
PUT /api/editarDetalles/{id} - Actualiza detalles de orden por ID (requiere JWT).
DELETE /api/eliminarDetalles/{id} - Elimina detalles de orden por ID (requiere JWT).
Comentarios 💬
GET /api/listarComentarios - Lista todos los comentarios (requiere JWT).
POST /api/crearComentarios - Crea un nuevo comentario (requiere JWT).
GET /api/listarComentarios/{id} - Obtiene un comentario por ID (requiere JWT).
PUT /api/editarComentarios/{id} - Actualiza un comentario por ID (requiere JWT).
DELETE /api/eliminarComentarios/{id} - Elimina un comentario por ID (requiere JWT).
Tokens de Recuperación 🔑
GET /api/listarToken - Lista todos los tokens de recuperación (requiere JWT).
POST /api/crearToken - Crea un nuevo token de recuperación (requiere JWT).
GET /api/listarToken/{id} - Obtiene un token de recuperación por ID (requiere JWT).
PUT /api/editarToken/{id} - Actualiza un token de recuperación por ID (requiere JWT).
DELETE /api/eliminarToken/{id} - Elimina un token de recuperación por ID (requiere JWT).
🤝 Contribuciones: ¡Hazlo Tuyo!
¡Gracias por considerar contribuir al framework Laravel! 🙏 La guía de contribución la puedes encontrar en la documentación de Laravel(https://laravel.com/docs/contributions#code-of-conduct)(mailto:taylor@laravel.com)(https://opensource.org/licenses/MIT(mailto:taylor@laravel.com)(https://opensource.org/licenses/MIT)) [cite: johanvargas1418/exponets/ExpoNets-ef34689678478b9f32e4bf0a8f01e661c4bb3268/expoNets/README.md).
