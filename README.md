# Glofy

### Levantar el contenedor:

```bash
docker-compose up -d
```

### Instalar las librerías con composer dentro del contenedor:

```bash
docker-compose exec server bash
composer install
cp phpunit.xml.dist phpunit.xml
```

### Ejecutar los tests con PHPUnit dentro del contenedor:

```bash
vendor/bin/phpunit
```

### Ingresar desde el navegador:

[http://localhost:80](http://localhost:80)