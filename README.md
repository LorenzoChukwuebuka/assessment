# Laravel Dockerized App

This project sets up a Laravel application with Docker, including Nginx, MySQL, and PHP. It uses Docker Compose to manage multiple services.

## 🧱 Project Structure

- **app**: Laravel application
- **nginx**: Nginx configuration
- **mysql**: MySQL database with custom configuration
- **docker-compose.yml**: Compose file to manage the containers
- **Dockerfile**: PHP environment for Laravel
- **nginx.conf**: Nginx server config

## 🚀 Getting Started

### Prerequisites

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

### Setup

1. **Clone the repository:**

```bash
git https://github.com/LorenzoChukwuebuka/assessment.git
cp .env.example .env
``` 

2. **Setup up the project:**

```bash
$ php artisan key:gen
```
this will generate the app key

4. **Setup the .env variables**

🐬 MySQL
```bash 
Host: db
Port: 3306
Database: assessment
User: root
Password: root
```

5. **SWAGGER** 
on the .env file 
```bash 
L5_SWAGGER_CONST_HOST=http://localhost:8005
```

6. **Run the container** 
docker-compose up -d --build
 

7. Open your browser and go to:
👉 http://localhost:8005/documentation
to view the swagger docs
