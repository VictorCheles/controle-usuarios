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

## Login
O usuário de teste é:
```
email:    contato@devcheles.com.br
password: 123456
```

## Configuração - Frontend
``` bash
# Atualizar dependências
npm install

# Rodar em ambiente local localhost:8080
npm run dev

# Rodar em ambiente de produção
npm run build
```

## Iniciar o servidor web

php artisan serve