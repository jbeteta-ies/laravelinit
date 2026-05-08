# LaravelInit – Entorno Docker para Desarrollo Web

Este proyecto proporciona un **entorno de desarrollo web con Docker** preparado para trabajar durante todo el curso con:

* PHP (PHP-FPM)
* Nginx
* MySQL
* Xdebug (depuración con Visual Studio Code)

El objetivo principal es que **todos los alumnos trabajen con el mismo entorno**, independientemente de su sistema operativo (Windows, Linux o macOS), y que comprendan cómo se construye y utiliza.

---

## ⚠️ Aviso importante (lectura obligatoria)

Este repositorio **NO es el punto de partida del aprendizaje**.

Durante el curso:

* El alumnado **debe crear el entorno paso a paso**, siguiendo los apuntes.
* **No se empieza clonando este repositorio**.

Este repositorio se proporciona **solo como apoyo** en los siguientes casos:

* Si el entorno no funciona tras seguir todos los pasos.
* Si se quiere crear rápidamente un entorno funcional para continuar el curso.
* Como referencia completa del entorno final.

---


## Requisitos previos

Antes de utilizar este proyecto debes tener instalado:

* **Docker Desktop**

  * Windows / macOS: [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)
  * Linux: [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/)
* **Visual Studio Code**

  * [https://code.visualstudio.com/](https://code.visualstudio.com/)
* Extensión de VSCode:

  * **PHP Debug** (autor: Xdebug)

No es necesario instalar PHP ni MySQL en el sistema anfitrión.

---

## Servicios Docker

El entorno se compone de **tres servicios**, cuyos nombres son fijos:

| Servicio | Descripción        |
| -------- | ------------------ |
| `php`    | PHP-FPM con Xdebug |
| `nginx`  | Servidor web       |
| `mysql`  | Base de datos      |

Estos nombres se utilizan para:

* Conexiones internas entre contenedores
* Acceso mediante `docker compose exec`

---

## Puertos utilizados

| Servicio | Puerto                                         |
| -------- | ---------------------------------------------- |
| Nginx    | [http://localhost:8080](http://localhost:8080) |
| MySQL    | localhost:3307                                 |
| Xdebug   | 9003                                           |

---

## Credenciales de MySQL

* **Usuario root**

  * Usuario: `root`
  * Contraseña: `administrador`

* **Usuario alumno**

  * Usuario: `alumno`
  * Contraseña: `alumno`
  * Base de datos inicial: `test`
  * Permisos: **administrador global** (puede crear bases de datos)

⚠️ Estos permisos **no son adecuados para producción**, pero son correctos para un entorno educativo.

---

## Estructura del proyecto

```
laravelinit/
├── docker/
│   ├── nginx/
│   │   └── default.conf
│   ├── php/
│   │   ├── Dockerfile
│   │   └── xdebug.ini
│   └── mysql/
│       └── init/
│           └── 01-grants.sql
├── src/
│   └── public/
│       └── index.php
├── scripts/
├── docker-compose.yml
└── README.md
```

---

## Puesta en marcha rápida (uso del repositorio como apoyo)

⚠️ **Solo usar este apartado si ya has seguido los apuntes o necesitas un entorno funcional inmediato**.

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/jbeteta-ies/laravelinit.git
cd laravelinit
```

---

### 2️⃣ Arranque limpio del entorno

```bash
docker compose down -v
docker compose up -d --build
```

Este comando:

* Elimina contenedores y volúmenes
* Reconstruye las imágenes
* Inicializa MySQL desde cero

---

### 3️⃣ Acceso a la aplicación

Abre en el navegador:

```
http://localhost:8080
```

Debe mostrarse una página con información de PHP (`phpinfo()`).

---

## Acceso a los contenedores

### Contenedor PHP

```bash
docker compose exec php bash
```

### Contenedor MySQL (usuario alumno)

```bash
docker compose exec mysql mysql -ualumno -palumno
```

### Contenedor MySQL (root)

```bash
docker compose exec mysql mysql -uroot -padministrador
```

---

## Carpeta scripts

La carpeta `scripts/` se utiliza para intercambiar archivos `.sql` con MySQL.

### Importar una base de datos

```bash
docker compose exec mysql mysql -uroot -padministrador test < /scripts/backup.sql
```

### Exportar una base de datos

```bash
docker compose exec mysql mysqldump -uroot -padministrador test > /scripts/backup.sql
```

---

## Depuración con Xdebug

Xdebug está **siempre activo** en este entorno.

Para depurar:

1. Configura el archivo `.vscode/launch.json` (según los apuntes).
2. Inicia la depuración en VSCode (**Listen for Xdebug**).
3. Accede a `http://localhost:8080`.
4. El breakpoint debe detener la ejecución.

---

## Comprobaciones finales

Antes de dar el entorno por válido, comprueba:

* `docker compose ps` muestra los tres servicios activos
* La web carga en `http://localhost:8080`
* Puedes entrar a los contenedores `php` y `mysql`
* El usuario `alumno` puede crear bases de datos
* Un breakpoint en PHP funciona correctamente

---

## Reinicio completo del entorno

Si algo no funciona correctamente:

```bash
docker compose down -v
docker compose up -d --build
```

## Instalación de Laravel 12 a partir de la rama `entorno-inicial`

Para instalar **Laravel 12** en este entorno Docker, sigue estos pasos:

### 1️⃣ Cambiar a la rama `entorno-inicial`

Primero, asegúrate de estar en la rama `entorno-inicial` para garantizar que el entorno esté configurado correctamente antes de instalar Laravel.

```bash
git fetch --all
git checkout entorno-inicial
```

### 2️⃣ Modificar la configuración de Nginx

Abre el archivo de configuración de **Nginx** (`docker/nginx/default.conf`) y cambia el siguiente bloque de configuración:

```nginx
root /var/www/html/public;
index index.php index.html index.htm;

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
```

Esto asegura que **Nginx sirva correctamente Laravel** desde el directorio `public`.

### 3️⃣ Arrancar los contenedores con Docker Compose

Una vez configurado Nginx, levanta los contenedores con Docker Compose:

```bash
docker compose up -d 
```

Este comando construye los contenedores y los levanta en segundo plano.

### 4️⃣ Vaciar la carpeta `src`

A continuación, **vacía la carpeta `src/`** (la carpeta donde se instalará Laravel) para asegurarte de que no hay archivos previos:

```bash
rm -rf src/*
```

Este comando elimina todos los archivos dentro de `src/` (pero **no elimina la carpeta**).

### 5️⃣ Entrar al contenedor PHP

Ahora, accede al contenedor **PHP** para ejecutar los comandos de Composer dentro del contenedor:

```bash
docker compose exec php bash
```

### 6️⃣ Instalar Laravel con Composer

Dentro del contenedor PHP, ejecuta el siguiente comando para instalar Laravel 12 en la carpeta `src/`:

```bash
composer create-project laravel/laravel:^12.0 .
```

Este comando descargará y instalará **Laravel 12** en el directorio `src/` del proyecto.

### 7️⃣ Reiniciar Docker para que el `entrypoint.sh` actúe

Después de que Laravel se haya instalado, es posible que debas reiniciar los contenedores para que el **`entrypoint.sh`** se ejecute y configure las carpetas necesarias como `storage` y `bootstrap/cache`:

```bash
docker compose down
docker compose up -d 
```

### 8️⃣ Verificar en el navegador

Verificar que la base de dotos (sqlite aún no hemos cambiado a mysql) se ha creado correctamente y contiene las migraciones de Laravel:

Finalmente, accede a **[http://localhost:8080](http://localhost:8080)** en tu navegador.

Deberías ver la **página de bienvenida de Laravel 12**. Si todo está configurado correctamente, el entorno de Laravel debería cargarse sin problemas.

---

Con estos pasos, **Laravel 12** debería instalarse correctamente en tu entorno Docker.x 

## Conclusión

Este repositorio representa **el entorno final del curso**.

El objetivo principal no es usarlo directamente, sino **comprender cómo se ha construido** para poder trabajar con frameworks como Laravel en un entorno profesional, reproducible y estable.
