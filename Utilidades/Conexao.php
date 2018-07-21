<?php

class Conexao extends PDO {

    public $dsn = 'mysql:dbname=bdapi;host=localhost';
    public $user = 'seuusuario';
    public $password = 'suasenha';
    public $handle = null;

    function __construct() {
        try {
            if ($this->handle == null) {
                $dbh = parent::__construct($this->dsn, $this->user, $this->password);
                $this->handle = $dbh;
                return $this->handle;
            }
        } catch (PDOException $Erro) {
            $Status = $Erro->getCode();
            switch ($Status) {
                case 1044:
                    $Retorno = 'Nome do Usuario do Banco de dados Informado Incorreto';
                    break;
                case 1045:
                    $Retorno = 'Senha Informada Para Conexao Nao Equivale a Senha do Banco de Dados';
                    break;
                case 1049:
                    $Retorno = 'Nome do Banco de dados Informado Incorreto';
                    break;
                case 2002:
                    $Retorno = 'Host Informado Incorreto';
                    break;
                default:
                    $Retorno = $Status;
                    break;
            }
        }

        function __destruct() {
            $this->handle = NULL;
        }

        function __toString() {
            $Retorno = 'Classe Não Pode Ser Convertida em String';
            return $Retorno;
        }

    }

}
