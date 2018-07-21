<?php

class Usuario {

    Private $Id;
    Private $Nome;
    Private $Email;
    Private $Senha;

    Function getId() {
        return $this->Id;
    }

    Function getNome() {
        return $this->Nome;
    }

    Function getEmail() {
        return $this->Email;
    }

    Function getSenha() {
        return $this->Senha;
    }

    Function setId($Id) {
        $this->Id = $Id;
    }

    Function setNome($Nome) {
        $this->Nome = $Nome;
    }

    Function setEmail($Email) {
        $this->Email = $Email;
    }

    Function setSenha($Senha) {
        $this->Senha = md5($Senha); /// Senha Criptografada
    }

    Function __construct($Id = '', $Nome = '', $Email = '', $Senha = '') {
        $this->Id = $Id;
        $this->Nome = $Nome;
        $this->Email = $Email;
        $this->Senha = $Senha;
    }

    function __toString() {
        $Retorno = "Classe Nao Pode Ser Convertida em String";
        return $Retorno;
    }

    function __destruct() {
        $this->handle = NULL;
    }

    Public Function Get_DadosUsuario_id() {
        try {
            $Conexao = new Conexao();
            $Conexao->beginTransaction();
            $SQL = 'SELECT * FROM tbusuario a WHERE a.id = :id';
            $Verifica = $Conexao->prepare($SQL);
            $Verifica->bindvalue(':id', $this->getid());
            $Verifica->execute();
            $Conexao->commit();
        } catch (Exception $exc) {
            $Conexao->rollBack();
            echo $exc->getTraceAsString();
        }
    }

    Public Function Listar_Usuarios() {
        $Conexao = new Conexao();
        $SQL = 'SELECT * FROM  tbusuario';
        $Verifica = $Conexao->prepare($SQL);
        $Verifica->execute();
        if ($Verifica->rowCount() > 0) {
            $i = 0;
            $qtdUsuarios = $Verifica->rowCount();
            while ($i < $qtdUsuarios) {
                $Dados = $Verifica->fetch(PDO::FETCH_OBJ);
                $Retorno[$i] = $Dados;
                $i++;
            }
        }
        return $Retorno;
    }

    Public Function Listar_Usuario_id($id) {
        $Conexao = new Conexao();
        $SQL = 'SELECT * FROM  tbusuario where id = :id';
        $Verifica = $Conexao->prepare($SQL);
        $Verifica->bindValue(':id', $id);
        $Verifica->execute();
        if ($Verifica->rowCount() > 0) {
            $Dados = $Verifica->fetch(PDO::FETCH_OBJ);
        }
        return $Dados;
    }

    Public Function Inserir_Usuario() {
        $Conexao = new Conexao();
        $SQL = 'INSERT INTO tbusuario (nome,email,senha) VALUES (:no,:em,:se)';
        $Verifica = $Conexao->prepare($SQL);
        $Verifica->bindValue(':no', $this->getnome());
        $Verifica->bindValue(':em', $this->getemail());
        $Verifica->bindValue(':se', $this->getsenha());
        $Verifica->execute();
        if ($Verifica->rowCount() > 0) {
            return True;
        } else {
            return False;
        }
    }

    Public Function Alterar_Usuario($id) {
        $Conexao = new Conexao();
        $SQL = 'UPDATE  tbusuario a SET a.nome = :no,a.email = :em,a.senha = :se WHERE a.id = :id';
        $Verifica = $Conexao->prepare($SQL);
        $Verifica->bindValue(':id', $id);
        $Verifica->bindValue(':no', $this->getnome());
        $Verifica->bindValue(':em', $this->getemail());
        $Verifica->bindValue(':se', $this->getsenha());
        $Verifica->execute();
        if ($Verifica->rowCount() > 0) {
            return True;
        } else {
            return False;
        }
    }

    Public Function Delete_Usuario($id) {
        $Conexao = new Conexao();
        $SQL = 'DELETE FROM tbusuario  WHERE id = :id';
        $Verifica = $Conexao->prepare($SQL);
        $Verifica->bindvalue(':id', $id);
        $Verifica->execute();
        if ($Verifica->rowCount() > 0) {
            return True;
        } else {
            return False;
        }
    }

}
