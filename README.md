# Task Manager

## Descripción

Task Manager es una aplicación web que permite a los usuarios gestionar sus tareas de manera eficiente. Esta aplicación permite crear, leer, actualizar y eliminar tareas, proporcionando una interfaz intuitiva y fácil de usar.

## Características

- **CRUD Completo**: Permite crear, leer, actualizar y eliminar tareas.
- **Estado de Tareas**: Las tareas pueden ser marcadas como "pendiente" o "completada".
- **Interfaz Amigable**: Diseñada con Vue.js y Tailwind CSS para una experiencia de usuario fluida.
- **Uso de API REST**: Comunica el frontend y el backend a través de una API RESTful.
- **Base de Datos MySQL**: Almacena las tareas en una base de datos MySQL, garantizando persistencia de datos.

## Tecnologías Utilizadas

- **Frontend**: 
  - Vue.js 3
  - Tailwind CSS
  - Axios para solicitudes HTTP

- **Backend**:
  - PHP 8
  - MySQL
  - Uso de variables de entorno para la configuración

## Instalación

### Backend

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/gestor-tareas.git
   cd gestor-tareas/back
2. Instala las dependencias:
   ```bash
   composer install
3. Crea el archivo .env y configura tus variables de entorno.
4. Configura la base de datos MySQL utilizando el siguiente esquema:
   ```sql
   CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    estado ENUM('pendiente', 'completada') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );
5. Inicia tu servidor PHP:
   ```bash
   php -S localhost:8000
   
### Frontend

1. Navega al directorio del frontend:
   ```bash
   cd ../front
2. Instala las dependencias:
   ```bash
   npm install
3. Inicia el servidor de desarrollo:
   ```bash
   npm run serve

### Uso

1. Accede a la aplicación a través de tu navegador en http://localhost:8000 para el backend y http://localhost:8080 para el frontend.
2. Crea tareas, edítalas o elimínalas según sea necesario.

### Contribuciones

Las contribuciones son bienvenidas. Si deseas contribuir, por favor sigue los siguientes pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (git checkout -b feature/nueva-caracteristica).
3. Realiza tus cambios y haz un commit (git commit -m 'Añadir nueva característica').
4. Haz push a la rama (git push origin feature/nueva-caracteristica).
5. Abre un Pull Request.

### Licencia

Este proyecto está bajo la Licencia MIT. Para más detalles, consulta el archivo LICENSE.
