Symfony docker boilerplate
==========================

Steps to follow

1. Run ```bash docker-compose up -d ```
2. Run ```bash docker-compose exec php composer install ```
3. Set ```bash <docker_machine_ip_address> symfonyemailer.dev ``` this in yout ```bash /etc/hosts``` file
4. Browse http://symfonyemailer.dev:8080/app_dev.php/


Testing API
An api key will be displayed on user's profile page. Set that in the header as

```bash
X-EMAILER-API-KEY: <api_key>
```

Url: http://symfonyemailer.dev:8080/app_dev.php/api/send
