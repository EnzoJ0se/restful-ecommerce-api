# restful-ecommerce-api
Um projeto para a matéria de Objetos Distribuídos e Serviços Web do curso de Ciência da Computação da UNESC - Universidade do Extremo Sul Catarinense.

Necessário:
- PHP 8.1;
- composer V2;
- MySQL;

Após clonar execute:
- installe as depêndencias:

```install
    composer install
```

- Crie o arquivo `.env` igual o `.env.example`  e atualize os attributos do banco de dados
```copie-env
    cp .env.example .env 
```
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```

- execute os comandos:
```
    php artisan key:generate
```
```generate-cache
    php artisan config:cache
```
```setup-datablase
    php artisan migrate:fresh
```
```serve
    php artisan serve
```
