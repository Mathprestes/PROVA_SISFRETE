# Informações do Autor

### 👨‍💻 Autor: Matheus Gouveia Prestes

### 📅 Data do Projeto: 28/05/2025

### 🔗 LinkedIn: matheus-prestes-235833186

### 📞 Telefone: (14) 99104-9435

### ✉️ E-mail: matheus.prestes_@outlook.com

<div style="display: inline_block"> <br/>

## 📁 Descrição do Projeto

### Nesta pasta PROVA SISFRETE está contido o projeto desenvolvido em Laravel com uma API RESTful chamada ecommerce-api, conforme os requisitos da prova.

<br>

## Alem disso, acompanham o projeto dois arquivos SQL, correspondentes:
#### Questão 1 (estrutura/tabelas)
#### Questão 3 (queries solicitadas na prova).

<div style="display: inline_block"> <br/>

## Verificar se os seguintes estão instalados para inicializar o projeto

#### Apache ^2.4.58 (Win64) OpenSSL/^3.1.3 PHP/^8.2.12
#### Versão do cliente de banco de dados: libmysql - mysqlnd 8.2.12
#### Extensão do PHP: mysqli Documentação curl Documentação mbstring Documentação
#### Versão do PHP: ^8.2.12
#### Composer ^2.8.9 ou superior
#### Sanctum ^4.1 laravel/sanctum

<div style="display: inline_block"> <br/>

## Passo a passo para rodar o projeto:

### Clone o projeto
```sh
git clone https://github.com/Mathprestes/PROVA_SISFRETE.git ecommerce-api
```
```sh
cd ecommerce-api/
```

### Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME=API-RESTful-Laravel
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui
```

### Gere a key do projeto Laravel
```sh
php artisan key:generate
```

### Criar todas as tabelas automaticamente usando Migration
```sh
php artisan migrate
```

### Criar os inserts no banco automaticamente usando Seeder
```sh
php artisan db:seed
```
           
### Executar a aplicação
```sh
php artisan serve
```         

<div style="display: inline_block"> <br/>

### Obs: O projeto de API foi contruido no modelo de MVC - Model, View, Controller
### As rotas da API ficam no caminho /routes/api.php

<div style="display: inline_block"> <br/>

## Comandos usados para o desenvolvimento do Projeto API RESTful

### Criando projeto laravel chamado "ecommerce-api"
```sh
composer create-project laravel/laravel .
```

### Executando o projeto
```sh
php artisan serve
```

### Criar o arquivo de rotas para API
```sh
php artisan install:api
```

### Gerar a chave no arquivo .env
```sh
php artisan key:generate
```

### Criar arquivo de Controller
```sh
php artisan make:controller Api\ClientesController
php artisan make:controller Api\ItensController
php artisan make:controller Api\PedidosController
php artisan make:controller Api\AuthController
```

### Criar uma migration
```sh
php artisan make:migration create_tb_clientes_table
php artisan make:migration create_tb_pagamentos_table
php artisan make:migration create_tb_pedidos_table
php artisan make:migration create_tb_ped_itens_table
php artisan make:migration create_tb_itens_table
php artisan make:migration create_tb_categoria_table
php artisan make:migration create_tb_item_categoria_table
```

### Gerar uma seed
```sh
php artisan make:seeder ClientesSeeder
php artisan make:seeder PagamentosSeeder
php artisan make:seeder PedidosSeeder
php artisan make:seeder Ped_itensSeeder
php artisan make:seeder ItensSeeder
php artisan make:seeder CategoriaSeeder
php artisan make:seeder Item_categoriaSeeder
```

### Gerando um request
```sh
php artisan make:request ClientesRequest
```

### Executar as migration
```sh
php artisan migrate
```

### Limpe o cache de configuração
```sh
php artisan config:clear
```

### Instalando o sanctum para autenticação
```sh
composer require laravel/sanctum
```

Publicar
```sh
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```