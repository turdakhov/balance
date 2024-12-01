## Внимание!
Для корректной работы аутентификации Sanctum необходимо корректно указать URL проекта в .env файле.

## Тестирование
Для быстрого старта созданы сидеры. 
```bash
$ php artisan migrate
$ php artisan db:seed
```
либо
```bash
$ php artisan migrate:fresh --seed
```

## Развертка в Laravel Sail (Docker)
В файле .env.example2 включены настройки для развертывания проекта в Laravel Sail.

- [Laravel Sail](https://laravel.com/docs/11.x/sail).

