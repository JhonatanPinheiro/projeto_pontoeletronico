<?php

#Criando uma classe para ter os acessos das informações de configuração do banco de dados como username,database,senha, host, etc... de forma externa ou seja irá pegar do arquivo env.ini
class Database
{
    public  static function getConnection()
    {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $conn = new mysqli(
            $env['host'],
            $env['username'],
            $env['password'],
            $env['database']
        );

        if ($conn->connect_error) {
            die("Erro:" . $conn->connect_error);
        }

        return $coon;
    }
}
