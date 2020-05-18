<?php

require_once 'Conexao.php';

require_once 'UtilDAO.php';

class OfficeDAO extends Conexao {

    public function InserirOffice($tipo_office, $versao, $softwares, $licenca, $obs) {

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_office (tipo_office, versao, softwares, licenca, observacao, status) values (?,?,?,?,?,?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $tipo_office);
        $sql->bindValue(2, $versao);
        $sql->bindValue(3, $softwares);
        $sql->bindValue(4, $licenca);
        $sql->bindValue(5, $obs);
        $sql->bindValue(6, 1);
        
        try {
            $sql->execute();
                return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    
    
    public function ConsultarOffice() {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'select id_office, tipo_office, versao, softwares, licenca, status, observacao from tb_office';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
    }
    
    public function DetalharOffice($id_office) {
        
         $conexao = parent::retornaConexao();
        
        $comando = 'select id_office, tipo_office, versao, softwares, licenca, status, observacao from tb_office where id_office = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->BindValue(1, $id_office);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
    }
    
    public function AlterarOffice($tipo_office, $versao, $softwares, $licenca, $status, $observacao, $id_office) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'update tb_office set tipo_office = ?, versao = ?, softwares = ?, licenca = ?, status = ?, observacao = ? where id_office = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $tipo_office);
        $sql->bindValue(2, $versao);
        $sql->bindValue(3, $softwares);
        $sql->bindValue(4, $licenca);
        $sql->bindValue(5, $status);
        $sql->bindValue(6, $observacao);
        $sql->bindValue(7, $id_office);
        
        try {
            $sql->execute();
                return 7;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }   
    
    public function ExcluirOffice($id_office) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'delete from tb_office where id_office = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id_office);
        
        try {
            $sql->execute();
                return 8;
        } catch (Exception $ex) {
            echo $ex->getMessage();
                return -1;
        }
        
    }
}
