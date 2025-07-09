# Catálogo de Produtos PHP

Um sistema simples de catálogo de produtos com PHP, permitindo visualizar produtos, favoritar itens e realizar pesquisas.

## Funcionalidades

- Exibição de catálogo de produtos com imagens, descrições e preços
- Sistema de favoritos (adicionar/remover)
- Busca por nome ou descrição de produtos
- Layout responsivo e amigável
- Estilização simples e moderna

## Requisitos

- PHP 7.4 ou superior
- MySQL/MariaDB
- Composer

## Instalação

Siga estes passos para configurar o projeto em sua máquina local:

### 1. Clone o repositório

```bash
git clone https://github.com/PauloEduDomingues/php-product-catalog.git
cd php-product-catalog
```

### 2. Instale as dependências

Execute o Composer para instalar todas as dependências necessárias:

```bash
composer install
```

### 3. Configure o banco de dados

1. Crie um banco de dados MySQL:

```sql
CREATE DATABASE product_catalog;
```

2. Crie uma cópia do arquivo `.env.example` e renomeie para `.env`:

```bash
cp .env.example .env
```

3. Configure suas credenciais de banco de dados no arquivo `.env`:

```
DB_HOST=localhost
DB_DATABASE=product_catalog
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
DB_CHARSET=utf8mb4
```

4. Execute o script SQL para criar as tabelas necessárias:

```bash
mysql -u seu_usuario -p product_catalog < src/migrations/create_favorites_table.sql
```

Ou você pode abrir o arquivo `src/migrations/create_favorites_table.sql` e executá-lo diretamente em seu gerenciador de banco de dados preferido (como phpMyAdmin, MySQL Workbench, etc).

## Como executar

### Usando o servidor embutido do PHP

Você pode iniciar facilmente o servidor de desenvolvimento do PHP:

```bash
cd src
php -S localhost:8000
```

Após isso, acesse `http://localhost:8000` em seu navegador.

### Usando um servidor web (Apache/Nginx)

Se estiver usando Apache ou Nginx, configure seu servidor para apontar para a pasta `src` como raiz do projeto.

## Estrutura do projeto

- `src/` - Código fonte principal
  - `index.php` - Página principal do catálogo
  - `styles.css` - Estilos CSS do projeto
  - `api/` - Códigos relacionados à API de produtos
  - `controllers/` - Controladores de lógica de negócios
  - `migrations/` - Scripts SQL para criação de tabelas
  - `repository/` - Camada de acesso a dados
  - `views/` - Templates e componentes visuais
- `vendor/` - Dependências gerenciadas pelo Composer

## Personalização

Para personalizar o visual do site, você pode editar o arquivo `src/styles.css`, que contém todos os estilos aplicados à aplicação.

## Problemas comuns

### Erro de conexão com o banco de dados

Verifique se suas credenciais no arquivo `.env` estão corretas e se o serviço MySQL está em execução.

### Imagens não aparecem

Certifique-se de que a API de produtos está acessível e que as URLs das imagens estão corretas.