Instalação

Criar banco de dados, e apontar a aplicação para ele através do arquivo de configuração .env

Executar os seguintes comandos:

php artisan migrate

php artisan db:seed BancoSeeder

php artisan serve

*obs: com o comando php artisan db:seed BancoSeeder, será criado um registro inicial com os seguintes parametros:
conta:12345
saldo:25.00


Requisições

-Saldo:
GET: http://localhost:8000/api/saldo/12345

-Depositar
PUT: http://localhost:8000/api/depositar
Parâmetros:
{
    "conta":"12345",
    "valor":"30"
}

-Sacar
PUT: http://localhost:8000/api/sacar
Parâmetros
{
    "conta":"12345",
    "valor":"10.00"
}