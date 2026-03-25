# 🎬 Rentflix - Guía de Instalación y Ejecución

Bienvenido a **Rentflix**, un proyecto desarrollado con Laravel.
Sigue estos pasos para levantar el proyecto en tu entorno local o servidor 🚀

---

# 📦 Requisitos

Antes de comenzar, asegúrate de tener instalado:

* PHP >= 8.x
* Composer
* MySQL / MariaDB
* Apache o Nginx
* Node.js y npm (opcional, para assets)

---

# ⚙️ Instalación

## 1. Clonar el repositorio

```bash
git clone <URL_DEL_REPO>
cd Rentflix
```

---

## 2. Instalar dependencias de PHP

```bash
composer install
```

---

## 3. Configurar variables de entorno

Copia el archivo `.env`:

```bash
cp .env.example .env
```

Edita `.env` con tus datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rentflix
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

---

## 4. Generar clave de la aplicación

```bash
php artisan key:generate
```

---

## 5. Configurar permisos (Linux)

```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

---

## 6. Crear enlace simbólico para almacenamiento

Esto permite guardar y acceder a imágenes:

```bash
php artisan storage:link
```

---

# 🧪 Opciones de ejecución

A continuación tienes dos formas de correr el proyecto según lo que necesites:

---

## 🟢 Opción 1: Base de datos con datos de prueba (IMPORTANDO `.sql`)

> ⚠️ **Este archivo ya contiene estructura + datos. NO ejecutar migraciones.**

### 1. Crear la base de datos

```bash
mysql -u usuario -p
```

```sql
CREATE DATABASE rentflix;
EXIT;
```

---

### 2. Importar el archivo `.sql`

```bash
mysql -u usuario -p rentflix < Rentflix.sql
```

---

## 🔵 Opción 2: Base de datos limpia (usando migraciones)

> Usa esta opción solo si NO vas a importar el `.sql`.

```bash
php artisan migrate
```

---

# 🚀 Ejecutar el servidor

```bash
php artisan serve
```

Luego abre en el navegador:

```
http://127.0.0.1:8000
```

---

# 🧹 Limpieza de caché (si algo falla)

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

# 🛠️ Comandos útiles

```bash
# Ver rutas
php artisan route:list

# Crear migraciones
php artisan make:migration

# Crear seeders
php artisan make:seeder

# Ejecutar seeders manualmente
php artisan db:seed
```

---

# ⚠️ Notas importantes

* ❗ No mezclar migraciones con el `.sql` (puede generar conflictos).
* No uses el usuario `root` en producción.
* Asegúrate de que el servicio de MySQL/MariaDB esté activo.
* Verifica permisos si Laravel no puede escribir en `storage/`.

---

# 🎉 ¡Listo!

Tu proyecto debería estar corriendo correctamente.
Si tienes problemas, revisa los logs en:

```bash
storage/logs/laravel.log

```

# Rutas principales

**- Principal Page**
http://34.28.34.65/Rentflix/public/

**- Show Movie**
http://34.28.34.65/Rentflix/public/catalog/movie/4

**- Wishlist**
http://34.28.34.65/Rentflix/public/collections/wishlist

**- Library**
http://34.28.34.65/Rentflix/public/collections/whishlist

**- CRUD Movies**
http://34.28.34.65/Rentflix/public/admin/movie
    
**- CRUD Bill**
http://34.28.34.65/Rentflix/public/admin/bill

**- Login**
http://34.28.34.65/Rentflix/auth/

---

Hecho con ❤️ usando Laravel 🚀
