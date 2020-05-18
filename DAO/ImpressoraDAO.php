<?php

require_once 'Conexao.php';

class ImpressoraDAO extends Conexao {

    public function InserirImpressora($num_serie, $ip, $cod_patrimonial, $nota_fiscal, $observacao, $proprietario, $id_fabricante, $id_modelo, $id_departamento) {

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_impressora (num_serie, ip, cod_patrimonial, nota_fiscal, observacao, proprietario, id_fabricante, id_modelo, id_departamento)
                values (?,?,?,?,?,?,?,?,?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $num_serie);
        $sql->bindValue(2, $ip);
        $sql->bindValue(3, $cod_patrimonial);
        $sql->bindValue(4, $nota_fiscal);
        $sql->bindValue(5, $observacao);
        $sql->bindValue(6, $proprietario);
        $sql->bindValue(7, $id_fabricante);
        $sql->bindValue(8, $id_modelo);
        $sql->bindValue(9, $id_departamento);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarImpressora() {

        $conexao = parent::retornaConexao();

        $comando = 'select id_impressora, fabricante, modelo, num_serie, ip, departamento, proprietario, cod_patrimonial, nota_fiscal, observacao from tb_impressora
        inner join tb_fabricante_marca
        on tb_fabricante_marca.id_fabricante = tb_impressora.id_fabricante
        inner join tb_modelo
        on tb_modelo.id_modelo = tb_impressora.id_modelo
        inner join tb_departamento
        on tb_departamento.id_departamento = tb_impressora . id_departamento';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function DetalharImpressora($id_impressora) {
        
        $conexao = parent::retornaConexao();

        $comando = 'select id_impressora, tb_fabricante_marca.id_fabricante, fabricante, tb_modelo.id_modelo, modelo, num_serie, ip, tb_departamento.id_departamento, departamento, proprietario, cod_patrimonial, nota_fiscal, observacao from tb_impressora
        inner join tb_fabricante_marca
        on tb_fabricante_marca.id_fabricante = tb_impressora.id_fabricante
        inner join tb_modelo
        on tb_modelo.id_modelo = tb_impressora.id_modelo
        inner join tb_departamento
        on tb_departamento.id_departamento = tb_impressora.id_departamento
        where id_impressora = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id_impressora);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
        
    }
    
    public function AlterarImpressora($fabricante, $modelo, $num_serie, $ip, $departamento, $proprietario, $cod_patrimonial, $nf, $obs, $id_impressora) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'update tb_impressora set id_fabricante = ?, id_modelo = ?, num_serie = ?, ip = ?, id_departamento = ?,
                    proprietario = ?, cod_patrimonial = ?, nota_fiscal = ?, observacao = ? where id_impressora = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $fabricante);
        $sql->bindValue(2, $modelo);
        $sql->bindValue(3, $num_serie);
        $sql->bindValue(4, $ip);
        $sql->bindValue(5, $proprietario);
        $sql->bindValue(6, $departamento);
        $sql->bindValue(7, $cod_patrimonial);
        $sql->bindValue(8, $nf);
        $sql->bindValue(9, $obs);
        $sql->bindValue(10, $id_impressora);
        
        try {
            $sql->execute();
                return - 7;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
        
        
                
        
    }

}
