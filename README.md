Symfony docker boilerplate
==========================

Steps to follow

1. Run ``` docker-compose up -d ```
2. Run ``` docker-compose exec php composer install ```
3. Set ``` <docker_machine_ip_address> symfonyemailer.dev ``` this in your ``` /etc/hosts``` file
4. Browse http://symfonyemailer.dev:8080/app_dev.php/


Testing API
An api key will be displayed on user's profile page. Set that in the header as

```
X-EMAILER-API-KEY: <api_key>
```

Url: http://symfonyemailer.dev:8080/app_dev.php/api/send
