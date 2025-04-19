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

### 📚 Endpoints Disponíveis

---

#### 🏙️ Cidades (`/api/v1/cities`)

| Método     | Endpoint                      | Descrição                       |
|------------|-------------------------------|----------------------------------|
| GET        | /api/v1/cities                | Listar todas as cidades         |
| POST       | /api/v1/cities                | Criar nova cidade               |
| GET        | /api/v1/cities/{city}         | Ver detalhes de uma cidade      |
| PUT/PATCH  | /api/v1/cities/{city}         | Atualizar cidade                |
| DELETE     | /api/v1/cities/{city}         | Deletar cidade                  |

---

#### 🏠 Propriedades (`/api/v1/properties`)

| Método     | Endpoint                          | Descrição                          |
|------------|-----------------------------------|-------------------------------------|
| GET        | /api/v1/properties                | Listar propriedades                 |
| POST       | /api/v1/properties                | Criar nova propriedade              |
| GET        | /api/v1/properties/{property}     | Ver detalhes da propriedade         |
| PUT/PATCH  | /api/v1/properties/{property}     | Atualizar propriedade               |
| DELETE     | /api/v1/properties/{property}     | Deletar propriedade                 |

---

#### 🖼️ Imagens de Propriedades (`/api/v1/property-images`)

| Método     | Endpoint                                                           | Descrição                         |
|------------|--------------------------------------------------------------------|------------------------------------|
| GET        | /api/v1/property-images                                            | Listar imagens                     |
| POST       | /api/v1/property-images                                            | Enviar imagem                      |
| GET        | /api/v1/property-images/images-by-property/{propertyId}           | Imagens por propriedade            |
| GET        | /api/v1/property-images/{property_image}                          | Ver imagem específica              |
| PUT/PATCH  | /api/v1/property-images/{property_image}                          | Atualizar imagem                   |
| DELETE     | /api/v1/property-images/{property_image}                          | Deletar imagem                     |

---

#### 🏷️ Tipos de Propriedade (`/api/v1/property-types`)

| Método     | Endpoint                              | Descrição                        |
|------------|---------------------------------------|-----------------------------------|
| GET        | /api/v1/property-types                | Listar tipos de propriedade       |
| POST       | /api/v1/property-types                | Criar tipo de propriedade         |
| GET        | /api/v1/property-types/{property_type}| Ver tipo de propriedade           |
| PUT/PATCH  | /api/v1/property-types/{property_type}| Atualizar tipo de propriedade     |
| DELETE     | /api/v1/property-types/{property_type}| Deletar tipo de propriedade       |

---

#### 📊 Logs de Simulação (`/api/v1/simulation-logs`)

| Método     | Endpoint                                 | Descrição                     |
|------------|------------------------------------------|--------------------------------|
| GET        | /api/v1/simulation-logs                  | Listar logs de simulação      |
| POST       | /api/v1/simulation-logs                  | Criar log de simulação        |
| GET        | /api/v1/simulation-logs/{simulation_log} | Ver log de simulação          |
| PUT/PATCH  | /api/v1/simulation-logs/{simulation_log} | Atualizar log de simulação    |
| DELETE     | /api/v1/simulation-logs/{simulation_log} | Deletar log de simulação      |

---

#### 📈 Estatísticas do Site (`/api/v1/site-statistics`)

| Método     | Endpoint                                      | Descrição                   |
|------------|-----------------------------------------------|------------------------------|
| GET        | /api/v1/site-statistics                       | Listar estatísticas do site |
| POST       | /api/v1/site-statistics                       | Criar estatística           |
| GET        | /api/v1/site-statistics/{site_statistic}      | Ver estatística             |
| PUT/PATCH  | /api/v1/site-statistics/{site_statistic}      | Atualizar estatística       |
| DELETE     | /api/v1/site-statistics/{site_statistic}      | Deletar estatística         |

---

#### 🟢 Status (`/api/v1/statuses`)

| Método     | Endpoint                      | Descrição         |
|------------|-------------------------------|--------------------|
| GET        | /api/v1/statuses              | Listar status      |
| POST       | /api/v1/statuses              | Criar status       |
| GET        | /api/v1/statuses/{status}     | Ver status         |
| PUT/PATCH  | /api/v1/statuses/{status}     | Atualizar status   |
| DELETE     | /api/v1/statuses/{status}     | Deletar status     |

---

#### 💬 Depoimentos (`/api/v1/testimonials`)

| Método     | Endpoint                             | Descrição            |
|------------|--------------------------------------|-----------------------|
| GET        | /api/v1/testimonials                 | Listar depoimentos    |
| POST       | /api/v1/testimonials                 | Criar depoimento      |
| GET        | /api/v1/testimonials/{testimonial}   | Ver depoimento        |
| PUT/PATCH  | /api/v1/testimonials/{testimonial}   | Atualizar depoimento  |
| DELETE     | /api/v1/testimonials/{testimonial}   | Deletar depoimento    |

---

> ⚠️ **Observação:** Alguns endpoints estão definidos, mas **não foram implementados propositalmente**, pois **não fazem sentido dentro das regras de negócio atuais**. Eles podem ser ativados no futuro, conforme a evolução do projeto.


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


