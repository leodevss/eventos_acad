# Sistema de Gestão de Eventos Acadêmicos

Este é um sistema de gestão de eventos acadêmicos, onde os usuários podem se inscrever em eventos e os administradores podem gerenciar os eventos e os participantes.

## Tecnologias Utilizadas

*   PHP 8.2
*   Laravel 11
*   MySQL
*   Tailwind CSS

## Primeiros Passos

Siga as instruções abaixo para configurar o ambiente de desenvolvimento local.

### Pré-requisitos

*   PHP 8.2 ou superior
*   Composer
*   Node.js e NPM

### Instalação

1.  Clone o repositório:
    ```bash
    git clone https://github.com/leodevss/eventos_acad
    ```
2.  Navegue até o diretório do projeto:
    ```bash
    cd eventos_acad
    ```
3.  Instale as dependências do PHP:
    ```bash
    composer install
    ```
4.  Instale as dependências do Node.js:
    ```bash
    npm install
    ```
5.  Copie o arquivo de ambiente:
    ```bash
    cp .env.example .env
    ```
6.  Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```
7.  Crie o arquivo do banco de dados SQLite:
    ```bash
    touch database/database.sqlite
    ```
8.  Execute as migrações do banco de dados:
    ```bash
    php artisan migrate --seed
    ```
9.  Compile os assets:
    ```bash
    npm run dev
    ```

## Uso

Para iniciar o servidor de desenvolvimento, execute o seguinte comando:

```bash
php artisan serve
```

Acesse a aplicação em [http://localhost:8000](http://localhost:8000).

## Acesso de Administrador

Para acessar a área administrativa, você pode usar o seguinte usuário:

*   **E-mail:** `admin@ifc.edu.br`
*   **Senha:** `senha123`

Este usuário é criado pelo seeder `AdminUserSeeder`.
