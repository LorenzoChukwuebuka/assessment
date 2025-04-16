#!/bin/sh

# wait for mysql
echo "Waiting for MySQL..."
if command -v nc >/dev/null 2>&1; then
  while ! nc -z db 3306; do
    sleep 1
  done
else
  while ! netcat -z db 3306; do
    sleep 1
  done
fi

echo "MySQL is up - ensuring database exists"
# Use Laravel's DB facade to create the database
php -r "try { \
  \$pdo = new PDO('mysql:host=db;port=3306', 'root', 'root'); \
  \$pdo->exec('CREATE DATABASE IF NOT EXISTS assessment'); \
  echo \"Database created successfully\n\"; \
} catch (PDOException \$e) { \
  echo \"DB ERROR: {\$e->getMessage()}\n\"; \
}"

echo "Running migrations"
php artisan migrate --seed

# Start Laravel's main process 
php-fpm