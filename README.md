### memo

docker compose up -d --build

docker-compose restart

docker exec -it OME-KABU-WEB-app bash
docker exec -it OME-KABU-WEB-nginx sh
docker exec -it OME-KABU-WEB-DB mysql -u root -p

docker rm -f $(docker ps -aq)
docker-compose down -v

php artisan db:seed --class=UserSeederphp artisan db:seed --class=UserSeeder

php artisan migrate:fresh
