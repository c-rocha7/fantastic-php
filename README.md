# Fantastic PHP 🐘

Um ambiente de desenvolvimento PHP completo usando Docker com Nginx, PHP-FPM, MySQL, PostgreSQL, Redis e ferramentas de administração.

## 📋 Visão Geral

Este projeto fornece um stack completo de desenvolvimento PHP em containers Docker, incluindo:

- **Nginx** - Servidor web (porta 8000)
- **PHP 8.2-FPM** - Interpretador PHP com extensões essenciais
- **MySQL 8.0** - Banco de dados relacional (porta 3306)
- **PostgreSQL 15** - Banco de dados relacional alternativo (porta 5432)
- **Redis** - Cache/banco de dados em memória
- **Adminer** - Interface web para gerenciamento de bancos de dados (porta 8080)
- **Redis Commander** - Interface web para gerenciamento do Redis (porta 8081)

## 🚀 Início Rápido

### Pré-requisitos

- Docker
- Docker Compose

### Instalação e Execução

1. **Clone o repositório**
   ```bash
   git clone <url-do-repositorio>
   cd fantastic-php
   ```

2. **Configure as variáveis de ambiente (opcional)**
   
   Você pode personalizar as configurações criando um arquivo `.env`:
   ```bash
   # Portas dos serviços
   NGINX_PORT=8000
   MYSQL_PORT=3306
   POSGRES_PORT=5432
   ADMINER_PORT=8080
   REDIS_COMMANDER_PORT=8081
   
   # Configurações MySQL
   MYSQL_ROOT_PASSWORD=root
   MYSQL_DATABASE=db_mysql
   MYSQL_USER=user
   MYSQL_PASSWORD=password
   
   # Configurações PostgreSQL
   POSTGRES_DATABASE=db_postgres
   POSTGRES_USER=user
   POSTGRES_PASSWORD=password
   
   # Configurações de usuário (Linux)
   PUID=1000
   PGID=1000
   ```

3. **Execute o ambiente**
   ```bash
   docker-compose up -d
   ```

4. **Acesse a aplicação**
   
   Abra seu navegador e acesse: http://localhost:8000

## 🛠️ Estrutura do Projeto

```
fantastic-php/
├── docker-compose.yml     # Configuração dos serviços Docker
├── nginx/
│   └── default.conf      # Configuração do Nginx
├── php/
│   └── Dockerfile        # Imagem customizada do PHP
├── src/
│   └── index.php         # Aplicação PHP de exemplo
├── LICENSE               # Licença MIT
└── README.md            # Este arquivo
```

## 🔗 Acesso aos Serviços

| Serviço | URL | Descrição |
|---------|-----|-----------|
| Aplicação PHP | http://localhost:8000 | Página principal com status das conexões |
| Adminer | http://localhost:8080 | Interface para gerenciar MySQL/PostgreSQL |
| Redis Commander | http://localhost:8081 | Interface para gerenciar Redis |

## 🗄️ Configuração dos Bancos de Dados

### MySQL
- **Host:** mysql (dentro dos containers) / localhost:3306 (do host)
- **Usuário:** user
- **Senha:** password
- **Database:** db_mysql

### PostgreSQL
- **Host:** postgres (dentro dos containers) / localhost:5432 (do host)
- **Usuário:** user
- **Senha:** password
- **Database:** db_postgres

### Redis
- **Host:** redis (dentro dos containers)
- **Porta:** 6379

## 🐘 Extensões PHP Incluídas

- **PDO MySQL** - Conexão com MySQL
- **PDO PostgreSQL** - Conexão com PostgreSQL
- **Redis** - Conexão com Redis
- Todas as extensões padrão do PHP 8.2

## 📊 Monitoramento de Recursos

O projeto inclui limites de recursos para cada container:

- **Nginx:** 0.25 CPU, 128MB RAM
- **PHP-FPM:** 0.50 CPU, 256MB RAM
- **MySQL:** 0.50 CPU, 512MB RAM (256MB reservado)
- **PostgreSQL:** 0.50 CPU, 512MB RAM (256MB reservado)
- **Redis:** 0.25 CPU, 256MB RAM (128MB reservado)
- **Adminer:** 0.25 CPU, 128MB RAM
- **Redis Commander:** 0.25 CPU, 128MB RAM

## 🔧 Comandos Úteis

```bash
# Iniciar os serviços
docker-compose up -d

# Parar os serviços
docker-compose down

# Ver logs dos serviços
docker-compose logs -f

# Executar comandos no container PHP
docker-compose exec php bash

# Reiniciar um serviço específico
docker-compose restart php

# Reconstruir as imagens
docker-compose build --no-cache
```

## 🧪 Testando as Conexões

A página inicial (http://localhost:8000) mostra o status das conexões com:
- ✅ MySQL
- ✅ PostgreSQL  
- ✅ Redis

Cada conexão exibe se foi bem-sucedida ou se há algum erro.

## 📁 Volumes Persistentes

Os dados são armazenados em volumes Docker nomeados:
- `db-data` - Dados do MySQL
- `postgres-data` - Dados do PostgreSQL
- `redis-data` - Dados do Redis

## 🤝 Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para detalhes.

## 👨‍💻 Autor

**Cauã R. Pereira**

---

⭐ Se este projeto foi útil para você, considere dar uma estrela!
