# Setup de Rentflix

## Instalación de Dependencias

### 1. Instalar DomPDF (para generar PDFs de facturas)

Ejecuta:

```bash
composer require barryvdh/laravel-dompdf --ignore-platform-req=ext-iconv
```

**Si tienes problemas de conflictos de versiones**, limpia el lock file primero:

```bash
rm composer.lock
composer require barryvdh/laravel-dompdf --ignore-platform-req=ext-iconv
```

### 2. (Opcional) Habilitar extensión iconv en PHP

Si quieres evitar usar `--ignore-platform-req` en el futuro, edita `/etc/php/php.ini`:

Busca y descomenta:
```ini
extension=iconv
```

Luego reinicia PHP.

### 3. Verificar que todo funciona

```bash
php artisan serve
```

Intenta descargar una factura en la URL:
```
http://localhost:8000/bills/download/1
```

Debería descargar un PDF llamado `factura_id:1.pdf`
