<h1>Banco api - Leandro Henrique dos Santos </h1>
<h2>Instalação</h2>

Criar banco de dados, e apontar a aplicação para ele através do arquivo de configuração .env

Executar os seguintes comandos:

```
php artisan migrate

php artisan db:seed BancoSeeder

php artisan serve
```

*obs: com o comando php artisan db:seed BancoSeeder, será criado um registro inicial com os seguintes parametros:</br>
<table>
<thead>
    <th>Conta</th>
    <th>Saldo</th>
</thead>
    <tbody>
        <td>12345</td>
        <td>25.00</td>
    </tbody>
</table>


<h2>Requisições</h2>

<li>Saldo:</li>

GET: http://localhost:8000/api/saldo/12345


<li>Depositar:</li>

PUT: http://localhost:8000/api/depositar

<br>Parâmetros:

```
{
    "conta":"12345",
    "valor":"30"
}
```

<li>Sacar:</li>

PUT: http://localhost:8000/api/sacar

</br>Parâmetros

```
{
    "conta":"12345",
    "valor":"10.00"
}
```
