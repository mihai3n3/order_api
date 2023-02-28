Start the app
- docker compose pull --include-deps
- docker compose up -d 
- symfony serve -d
- php bin/console doctrine:migrations:migrate
- php bin/console hautelook:fixtures:load