<?php

require_once 'Conexao.php';

require_once 'UtilDAO.php';

class CadastrosDAO extends Conexao {

    public function InserirUsuario($nome, $tipo_cad) {


        $conexao = parent::retornaConexao();


        switch ($tipo_cad) {
            case 1:
                $comando = 'insert into tb_usuario (usuario) values (?)';
                break;

            case 2:
                $comando = 'insert into tb_departamento (departamento) values (?)';
                break;

            case 3:
                $comando = 'insert into tb_fabricante_marca (fabricante) values (?)';
                break;

            case 4:
                $comando = 'insert into tb_modelo (modelo) values (?)';
                break;

            case 5:
                $comando = 'insert into tb_so (so) values (?)';
                break;

            case 6:
                $comando = 'insert into tb_processador (processador) values (?)';
                break;

            case 7:
                $comando = 'insert into tb_tipo (tipo) values (?)';
                break;

           
        }



        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $nome);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
    
    public function ConsultarUsuario() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_usuario, usuario from tb_usuario order by usuario';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
        
    }
    
    public function ConsultarDepartmento() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_departamento, departamento from tb_departamento';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
    }
    
    public function ConsultarTipo() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_tipo, tipo from tb_tipo';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
    }
    
    public function ConsultarFabricante() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_fabricante, fabricante from tb_fabricante_marca';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
    }
    
     public function ConsultarModelo() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_modelo, modelo from tb_modelo';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
    }
    
      public function ConsultarSO() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_so, so from tb_so';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
    }
    
      public function ConsultarProcessador() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_processador, processador from tb_processador';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchall();
    }
    
    public function ConsultarOffice() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_office, versao, licenca from tb_office';
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
        
        
    }

}
