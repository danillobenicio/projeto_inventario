<?php

require_once 'Conexao.php';

class NobreakDAO extends Conexao {

    public function InserirNobreak($num_serie, $kva, $ip, $dt_compra, $dt_instalacao, $dt_manutencao, $nota_fiscal, $observacao, $id_fabricante, $id_departamento, $id_modelo) {

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_nobreak (num_serie, kva, ip, dt_compra, dt_instalacao, dt_manutencao, nota_fiscal, observacao, id_fabricante, id_departamento, id_modelo)
                    values (?,?,?,?,?,?,?,?,?,?,?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $num_serie);
        $sql->bindValue(2, $kva);
        $sql->bindValue(3, $ip);
        $sql->bindValue(4, $dt_compra);
        $sql->bindValue(5, $dt_instalacao);
        $sql->bindValue(6, $dt_manutencao);
        $sql->bindValue(7, $nota_fiscal);
        $sql->bindValue(8, $observacao);
        $sql->bindValue(9, $id_fabricante);
        $sql->bindValue(10, $id_departamento);
        $sql->bindValue(11, $id_modelo);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarNobreak() {

        $conexao = parent::retornaConexao();

        $comando = 'select id_nobreak, fabricante, modelo, num_serie, kva, departamento, ip, dt_compra, dt_instalacao, dt_manutencao, nota_fiscal, observacao from tb_nobreak
                 inner join tb_fabricante_marca
                    on tb_fabricante_marca.id_fabricante = tb_nobreak.id_fabricante
                inner join tb_modelo
                    on tb_modelo.id_modelo = tb_nobreak.id_modelo
                inner join tb_departamento
                    on tb_departamento.id_departamento = tb_nobreak.id_nobreak';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
        
    }
    
    public function DetalharNobreak($id_nobreak) {
        
        $conexao = parent::retornaConexao();

        $comando = 'select id_nobreak, fabricante, modelo, num_serie, kva, departamento, ip, dt_compra, dt_instalacao, dt_manutencao, nota_fiscal, observacao from tb_nobreak
                 inner join tb_fabricante_marca
                    on tb_fabricante_marca.id_fabricante = tb_nobreak.id_fabricante
                inner join tb_modelo
                    on tb_modelo.id_modelo = tb_nobreak.id_modelo
                inner join tb_departamento
                    on tb_departamento.id_departamento = tb_nobreak.id_nobreak
                    where id_nobreak = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id_nobreak);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
    }

}
