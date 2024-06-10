# Projeto Laravel com Vue.js

Este é um projeto desenvolvido com Laravel e Vue.js, utilizando Laravel Mix para a compilação dos assets front-end. O projeto também faz uso do Laravel Sanctum para autenticação de APIs.

## Requisitos

- PHP >= 8.2
- Composer
- Node.js e npm
- Banco de Dados (MySQL)

## Instalação

### 1. Clonar o Repositório

```bash
git clone https://github.com/GiovaneVinicius/acessorias.git

cd acessorias

```

### 2. Instalar Dependências do PHP

```bash
composer install
```

### 3. Instalar Dependências do Node

```bash
npm install
```

### 4. Configurar o Ambiente

Copie o arquivo .env.example para .env e configure as variáveis de ambiente, especialmente as configurações de banco de dados.

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Migrar e Popular o Banco de Dados

```bash
php artisan migrate --seed
```

### 6. Executar o Laravel Mix

```bash
npm run dev
```

### 7. Iniciar o Servidor de Desenvolvimento

```bash
php artisan serve
```

Agora você pode acessar o aplicativo em http://localhost:8000.

## Autenticação com Laravel Sanctum
O Laravel Sanctum oferece um sistema simples de autenticação de token para SPAs (Aplicações de Página Única), aplicativos mobile e APIs simples. Ele é fácil de configurar e usar, proporcionando uma camada adicional de segurança para suas APIs.

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### Vantagens do Laravel Sanctum
- Simplicidade: Fácil de configurar e usar.
- Flexibilidade: Suporta tanto SPAs quanto APIs simples.
- Segurança: Protege suas APIs de forma eficaz.

## Compilação de Assets com Laravel Mix
O Laravel Mix simplifica a compilação de arquivos CSS e JavaScript para seus aplicativos Laravel. Ele fornece uma API limpa e fluente para definir etapas de construção para sua aplicação usando a Webpack.

### Vantagens do Laravel Mix
- Simplicidade: Configuração mínima necessária.
- Flexibilidade: Suporte para pré-processadores CSS como Sass e Less.
- Integração: Fácil integração com Vue.js e React.

## Estrutura de Services
Em vez de usar o padrão MVC tradicional, este projeto utiliza uma estrutura de serviços para separar a lógica de negócios das camadas de controle e modelo. Isso melhora a organização do código e facilita a manutenção e testes.

### Vantagens da Estrutura de Services
- Separação de Preocupações: A lógica de negócios é separada da camada de controle.
- Reusabilidade: Serviços podem ser reutilizados em diferentes partes da aplicação.
- Testabilidade: Facilita a escrita de testes unitários e de integração.
## Documentação da API

Você pode checar a documentaçào completa abaixo:

[![API Documentation](https://img.shields.io/badge/Ver-Documentação-blue)](https://documenter.getpostman.com/view/19769352/2sA3XLEj6q)


| Método        | URI                   | Ação                        |
| ------------- | --------------------- | --------------------------- |
| GET/HEAD      | api/carts             | Retorna todos os carrinhos  |
| POST          | api/carts             | Adiciona um novo carrinho   |
| GET/HEAD      | api/carts/{cart}      | Retorna um carrinho         |
| PUT/PATCH     | api/carts/{cart}      | Atualiza um carrinho        |
| DELETE        | api/carts/{cart}      | Remove um carrinho          |
| POST          | api/login             | Faz login                   |
| GET/HEAD      | api/orders            | Retorna todos os pedidos    |
| POST          | api/orders            | Adiciona um novo pedido     |
| GET/HEAD      | api/orders/{order}    | Retorna um pedido           |
| PUT/PATCH     | api/orders/{order}    | Atualiza um pedido          |
| DELETE        | api/orders/{order}    | Remove um pedido            |
| GET/HEAD      | api/products          | Retorna todos os produtos   |
| POST          | api/products          | Adiciona um novo produto    |
| GET/HEAD      | api/products/{product}| Retorna um produto          |
| PUT/PATCH     | api/products/{product}| Atualiza um produto         |
| DELETE        | api/products/{product}| Remove um produto           |
| POST          | api/register          | Faz registro                |
