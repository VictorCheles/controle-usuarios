<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Projeto Prático de Laravel + JWT + Vue JS + Axios + Vuex + VueRouter

>Laravel com Vue JS

## Baixar o projeto
Primeiro passo, clonar o projeto:
``` bash
# Clonar
git clone https://github.com/VictorCheles/controle-usuarios.git

# Acessar
cd controle-usuarios
```

## Configuração - Banco de Dados

``` bash
# Criar DATABASE como o nome: 
controle_usuarios

#Usuario e Senha do MySql
Por padrão:
    DB_PORT=3306
    DB_DATABASE=controle_usuarios
    DB_USERNAME=root
    DB_PASSWORD=

Para configuração personalizada, acesseo arquivo: .env na raiz do projeto
```

## Configuração - Backend

``` bash
# Instalar dependências do projeto
composer install
    # Correção de incompatibilidade com PHP 8, que será apresentada no terminal da seguinte forma:
        Problem 1
            - lcobucci/jwt is locked to version 4.0 and an update of this package was not requested.
            - lcobucci/jwt 4.0 requires php ^5.6 || ^7.0 -> your php version (8.1.2) does not satisfy that requirement.
        Problem 2
            - tymon/jwt-auth is locked to version 1.0.2 and an update of this package was not requested.
            - tymon/jwt-auth 1.0.2 requires lcobucci/jwt <3.4 -> found lcobucci/jwt[4.0] but it does not match the constraint.
        
        # Correção:
           - composer require tymon/jwt-auth --with-all-dependencies

# Configurar variáveis de ambiente
cp .env.example .env

php artisan key:generate

# Configuração do JWT
php artisan jwt:secret

# Criar migrations (tabelas e Seeders)
php artisan migrate --seed

# Criar link simbólico storage/app/public para public/storage/
php artisan storage:link
```

## Configuração - Frontend
``` bash
# Atualizar dependências
npm install

## Iniciar o servidor web
php artisan serve --port=8000


## Login
O usuário de teste é:

EMAIL: contato@devcheles.com.br
SENHA: 123456
```