<?php

require_once 'Conexao.php';

class RelPontoDAO extends Conexao {

    public function InserirRelPonto($num_serie, $ip, $chaversa, $cod_patrimonial, $id_departamento, $id_fabricante, $id_modelo) {

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_rel_ponto (num_serie, ip, chaversa, cod_patrimonial, status, id_departamento, id_fabricante, id_modelo)
                    values (?,?,?,?,?,?,?,?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $num_serie);
        $sql->bindValue(2, $ip);
        $sql->bindValue(3, $chaversa);
        $sql->bindValue(4, $cod_patrimonial);
        $sql->bindValue(5, 1);
        $sql->bindValue(6, $id_departamento);
        $sql->bindValue(7, $id_fabricante);
        $sql->bindValue(8, $id_modelo);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarRelPonto() {

        $conexao = parent::retornaConexao();

        $comando = 'select id_relponto, departamento, fabricante, modelo, num_serie, ip, chaversa, cod_patrimonial, status  from tb_rel_ponto
                    inner join tb_departamento
                        on tb_departamento.id_departamento = tb_rel_ponto.id_departamento
                    inner join tb_fabricante_marca
                        on tb_fabricante_marca.id_fabricante = tb_rel_ponto.id_fabricante
                    inner join tb_modelo
                        on tb_modelo.id_modelo = tb_rel_ponto.id_modelo';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
    
    public function DetalharRelPonto($id_relponto) {
        
        $conexao = parent::retornaConexao();

        $comando = 'select id_relponto, departamento, fabricante, modelo, num_serie, ip, chaversa, cod_patrimonial, status  from tb_rel_ponto
                    inner join tb_departamento
                        on tb_departamento.id_departamento = tb_rel_ponto.id_departamento
                    inner join tb_fabricante_marca
                        on tb_fabricante_marca.id_fabricante = tb_rel_ponto.id_fabricante
                    inner join tb_modelo
                        on tb_modelo.id_modelo = tb_rel_ponto.id_modelo
                        where id_relponto = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id_relponto);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
        
    }

}
