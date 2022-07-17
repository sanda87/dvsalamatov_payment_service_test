## Запуск сборки

- `git clone git@github.com:dvsalamatov/payment_service_test.git`
- `cd payment_service_test`
- `cp .env.dist .env`
- `docker-compose up -d --build`
- `docker exec -it api_php composer install`

Сайт доступен по адресу: http://localhost:8180/app.php

## Задание

Тестовый проект реализует простейший платежный сервис. Нужно немного расширить существующий функционал.

1. Возможность делать платежи не только с использованием Card, но и c Qiwi (используется номер телефона вместо кредитной карты)
