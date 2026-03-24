# 🎬 RENTFLIX - Guía de Instalación

## Requisitos Previos

- PHP 8.x instalado
- Composer instalado
- MySQL/MariaDB con phpMyAdmin

---

## Paso 0: Iniciar XAMPP

Abra el panel de control de **XAMPP** e inicie los siguientes servicios:

- ✅ **Apache**
- ✅ **MySQL** (MariaDB)

> Asegúrese de que ambos servicios muestren el estado "Running" antes de continuar.

---

## Paso 1: Instalar Dependencias

Desde la carpeta del proyecto, ejecute:

```bash
composer install
```

### ⚠️ Si hay problemas instalando DomPDF

DomPDF requiere la extensión `iconv` de PHP. Si `composer install` falla por este motivo, use el flag para ignorar ese requisito:

```bash
composer install --ignore-platform-req=ext-iconv
```

**Si persisten los conflictos de versiones**, limpie el lock file primero:

```bash
rm composer.lock
composer install --ignore-platform-req=ext-iconv
```

#### (Opcional) Solución permanente — habilitar iconv en PHP

Si quiere evitar usar `--ignore-platform-req` en el futuro, edite su `php.ini`:

Busque y descomente la siguiente línea:
```ini
extension=iconv
```

Luego reinicie Apache desde el panel de XAMPP.

---

## Paso 2: Crear la Base de Datos

Acceda a **phpMyAdmin** y cree una nueva base de datos llamada `rentflix`.

> **Nota:** Si prefiere usar otro nombre, recuerde modificar `DB_DATABASE` en el paso 3.

---

## Paso 3: Configurar el Archivo `.env`

Abra el archivo `.env` en la raíz del proyecto y modifique la configuración de base de datos.

### Configuración por defecto (ANTES):
```env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=
# DB_USERNAME=
# DB_PASSWORD=
```

### Configuración requerida (DESPUÉS):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rentflix
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

**Donde:**
| Variable | Descripción |
|----------|-------------|
| `DB_DATABASE` | Nombre de la base de datos creada en el paso 2 |
| `DB_USERNAME` | Usuario de MySQL (el que usa para acceder a phpMyAdmin) |
| `DB_PASSWORD` | Contraseña del usuario de MySQL |

---

## Paso 4: Ejecutar las Migraciones

Desde la carpeta del proyecto, ejecute:

```bash
php artisan migrate
```

Este comando creará todas las tablas necesarias en la base de datos.

---

## Paso 5: Verificar la Estructura

En phpMyAdmin, confirme que las tablas se hayan creado correctamente dentro de la base de datos `rentflix`.

---

## Paso 6: Crear el Enlace de Almacenamiento

Ejecute el siguiente comando para crear un enlace simbólico desde `public/storage` a `storage/app/public`:

```bash
php artisan storage:link
```

Este paso es necesario para que la aplicación pueda acceder correctamente a los archivos almacenados (imágenes).

### ℹ️ Si se proporciona contenido de la carpeta storage

Si ha recibido los archivos de la carpeta `storage/` para acelerar la evaluación, copie el contenido proporcionado en la carpeta `storage/app/public` del proyecto. Esto incluye imágenes y otros archivos necesarios para la aplicación.

---

## Paso 7: Importar Base de Datos (si aplica)

Si recibió un archivo `.sql` exportado con datos de prueba, impórtelo en phpMyAdmin:

1. Abra **phpMyAdmin** y seleccione la base de datos `rentflix`.
2. Haga clic en la pestaña **Importar**.
3. Seleccione el archivo `.sql` proporcionado.
4. Haga clic en **Continuar** y espere a que finalice.

> **Nota:** Si ya ejecutó `php artisan migrate` en el paso anterior, omita ese comando o use `php artisan migrate:fresh` antes de importar para evitar conflictos con tablas existentes.

---

## Paso 8: Iniciar el Servidor

Inicie el servidor de desarrollo con:

```bash
php artisan serve
```

---

## Paso 9: Acceder a la Aplicación

Abra su navegador y visite:

👉 **http://127.0.0.1:8000**

---

## ✅ ¡Listo!

Ya puede explorar la aplicación **Rentflix**.
