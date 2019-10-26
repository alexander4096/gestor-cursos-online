# Programa de Gestion de Curso en Linea

**Version:** 1.0.0

**Creado para**:  el curso Premium de Laravel 5.8 desde cero

**Hecho en Framewrok:** Laravel 5.8

Se requiere instalarlo en un servidor apache con MySQL  5.7 y PHP 7.1

## Pasos para la instalación en local para desarrollador.

1.  Tipear desde la consola de comando donde en la ruta raíz donde se instalara:

```php
git clone https://github.com/alexander4096/gestor-cursos-online.git
```

2.   Al descargar git el programa subimos al directorio de: gestor-curso-online y tipeamos:
 - [ ] Desde el Terminal tipear:
 
       composer update
       
       composer run-script post-autoload-dump
       
       composer run-script post-root-package-install
       
       composer run-script post-create-project-cmd

**3.  Cambiar el codigo del archive Image.php**

Localizar el archivo: Imagen.php ubicado en la ruta:
 
**vendor\fzaninotto\faker\Provider\Image.php**

Editar y cambiar el contenido
```php
    $baseUrl = "https://lorempixel.com/";
```
Por este otro
```php
    $baseUrl = "http://lorempixel.com/";
```
Tambien hay que cambiar del archivo $filepath para quedar :
```php
    $filepath = $dir . DIRECTORY_SEPARATOR . $filename;
```
Por este otro:
```php
    $filepath = $dir . '' . $filename;
```
**4.  Usar el PHPMyAdmin y crear un base de datos con el nombre de:**

Nombre: cursos

Collation: **utf8mb4_unicode_ci**

**5. Abrir el archivo .env  ubicado en la ruta raíz y cambiar el contenido de este bloque por:**

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cursos
    DB_USERNAME=root
    DB_PASSWORD=

**6. Desde la consola de commandos ejecutar el commando artisan**

    php artisan migrate --step --seed

**7. Probar:**

**Primera**:

Ejecutando el servidor web, desde el navegador tipear la ruta:

[http://localhost/gestor-cursos-online/public/](http://localhost/gestor-cursos-online/public/)

**Segunda:**

Corriendo la consola y ejecutando el servidor web se debe tipear el siguiente comando:

php artisan serve

Ir a la ruta: [http://127.0.0.1:8000](http://127.0.0.1:8000)

(Esta forma nos ahorra la ruta en caso de no configurar un virtual host)


