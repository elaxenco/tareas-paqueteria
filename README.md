# tareas-paqueteria
## Este proyecto se creo con la version https://api.github.com/repos/bcit-ci/CodeIgniter/zipball/3.1.11  codeigniter
## 📋 Requisitos

- PHP Version 7.4.33 o superior
- MySQL o MariaDB
- XAMPP, MAMP o cualquier servidor con Apache + PHP + MySQL
- Extensión PHP `soap` habilitada

1. Clona o copia el proyecto en tu servidor local (ej. `htdocs/tareas-paqueteria`)
2. Importa el archivo SQL para crear la base de datos:

   - Crea una base de datos llamada : paqueteria
   - Ejecuta el archivo : db/dbpaqueteria.sql

3. Configura el acceso a la base de dato en application/config/database.php

4. Oculta index.php de las URLs
    -Modifica el archivo .htaccess en la raíz del proyecto:

    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /paqueteria/ <-----cambia por el nombre del proyecto que utilices
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ index.php/$1 [L]
    </IfModule>

    -En application/config/config.php:

    $config['base_url'] = 'http://localhost/paqueteria/'; <-----cambia por el nombre del proyecto que utilices
    $config['index_page'] = '';

5. Después de instalar, accede desde: http://localhost/paqueteria/ <-----cambia por el nombre del proyecto que utilices