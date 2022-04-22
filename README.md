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

email:    contato@devcheles.com.br
password: 123456
```


----

## OBSERVAÇÃO

Com o uso do PHP8, uma imcompatibilidade porderá ser apresentada na instalação da dependencia: tymon/jwt-auth.
Neste caso execute o comando:
    
  #  composer require tymon/jwt-auth:dev-develop --prefer-source