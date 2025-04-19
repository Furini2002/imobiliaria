# Projeto Laravel Dockerizado

Este projeto é uma API desenvolvida com **Laravel**, configurada para rodar em um ambiente totalmente dockerizado, facilitando a instalação, testes e portabilidade.

---

## ✅ Tecnologias Utilizadas

- **Laravel** (Backend PHP)
- **MySQL** (Banco de dados relacional)
- **Nginx** (Servidor web)
- **Docker** e **Docker Compose** (Gerenciamento de ambiente)

---

## 🚀 Como rodar o projeto localmente

> Requisitos: [Docker Desktop](https://www.docker.com/products/docker-desktop) instalado.

## Passos:

### 1. Clone o repositório:

```bash
git clone https://github.com/Furini2002/imobiliaria.git
````

### 2. Suba os containers:

```bash
docker-compose up -d --build
````

### 3. Acesse o sistema no navegador:

```bash
http://localhost:8000
```

### 4. (Opcional) Execute as migrations:

```bash
docker exec -it laravel-app bash
php artisan migrate
```

### 🔗 Endpoints disponíveis
GET /api/v1/cities – Lista todas as cidades
POST /api/v1/cities – Cria uma nova cidade
GET /api/v1/cities/{id} – Retorna uma cidade específica
PUT /api/v1/cities/{id} – Atualiza uma cidade
DELETE /api/v1/cities/{id} – Deleta uma cidade

## 🧠 Considerações Técnicas
O projeto foi dockerizado com foco em padronização de ambiente. Ao utilizar Docker, o ambiente fica isolado e replicável, sem depender de configurações locais do sistema operacional.

O Nginx está configurado para servir os arquivos do Laravel a partir de /var/www/public.

O PHP-FPM roda Laravel na porta 9000.

O MySQL está exposto na porta 3306 com o banco imobiliaria_db.

## 📁 Estrutura dos containers

| Serviço | Função          | Porta |
|:--------|:-----------------|-------|
| app     | PHP + Laravel    | 9000  |
| nginx   | Servidor Web     | 8000  |
| mysql   | Banco de Dados   | 3306  |


