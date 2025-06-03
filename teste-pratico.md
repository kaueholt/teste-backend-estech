# cria o arquivo de variáveis de ambiente com base no exemplo
cp .env.example .env

# build e up
docker-compose build
docker-compose up

# gerar chave da aplicação Laravel
docker-compose exec app php artisan key:generate

# roda as migrations e seeders
docker-compose exec app php artisan migrate:fresh --seed

# rodar os testes
docker-compose exec app php artisan test --env=testing

# importação do csv (automaticamente feito pelo supervisor)
docker-compose exec app php artisan app:import-temperature example.csv
docker-compose exec app php artisan queue:work