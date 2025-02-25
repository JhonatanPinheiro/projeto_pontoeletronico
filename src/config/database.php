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

        return $conn;
    }
    #Fazendo a consulta no banco de dados
    public static function getResultFromQuery($sql)
    {
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    public static function executeSQL($sql)
    {
        $conn = self::getConnection();
        if (!mysqli_query($conn, $sql)) {
            throw new Exception(mysqli_error($conn));
        }

        $id = $conn->insert_id;
        $conn->close();
        return $id;
    }
}
