## Запуск сборки

Для запуска сборки необходимо установить: docker и docker-compose.

Склонируйте репозиторий и из корня проекта выполните следующие команды:

- `git clone git@github.com:dvsalamatov/payment_service_test.git`
- `cd payment_service_test`
- `cp .env.dist .env`
- `docker-compose up -d --build`
- `docker exec -it api_php composer install`
- `docker exec -it api_php php yii migrate`

Сайт доступен по адресу: http://localhost:8180

PhpMyAdmin доступен по адресу: http://localhost:8081

## Задание

Тестовый проект реализует простейший платежный сервис. Нужно немного расширить существующий функционал.

1. Возможность делать платежи не только с использованием Card, но и c Qiwi (используется номер телефона вместо кредитной карты)
