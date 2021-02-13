
vendor/bin/ecs check --fix; vendor/bin/psalm --show-info=false; ./vendor/bin/phpstan analyse; php artisan l5-swagger:generate
