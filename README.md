## Тестовое задание (Vasterra) 

## Backend
Laravel 11, Inertia

## Frontend
Vue 3, Vuetify

## Установка зависимостей
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

## Запуск проекта
```shell
sail up 
```
```shell
sail artisan migrate 
```

## Google API
Для работы с API необходимо создать сервисный аккаунт https://console.cloud.google.com/apis/ 
и так же необходимо создать документ в Google и открыть доступ редактора для сервисного аккаунта
```
GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION={PATH_TO_CREDENTIALS_JSON}
POST_SPREADSHEET_ID={CREATED_SPREADSHEET_ID}
```

