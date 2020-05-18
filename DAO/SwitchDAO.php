<?php

require_once 'Conexao.php';

class SwitchDAO extends Conexao {

    public function InserirSwitch($host, $ip, $mac, $service_tag, $nota_fiscal, $observacao, $id_departamento, $id_fabricante, $id_modelo) {

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_switch (host, ip, mac, service_tag, nota_fiscal, status, observacao, id_departamento, id_fabricante, id_modelo)
                    values (?,?,?,?,?,?,?,?,?,?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $host);
        $sql->bindValue(2, $ip);
        $sql->bindValue(3, $mac);
        $sql->bindValue(4, $service_tag);
        $sql->bindValue(5, $nota_fiscal);
        $sql->bindValue(6, 1);
        $sql->bindValue(7, $observacao);
        $sql->bindValue(8, $id_departamento);
        $sql->bindValue(9, $id_fabricante);
        $sql->bindValue(10, $id_modelo);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarSwitch() {

        $conexao = parent::retornaConexao();

        $comando = 'select id_switch, host, fabricante, modelo, ip, departamento, mac, service_tag, nota_fiscal, status, observacao from tb_switch
        inner join tb_fabricante_marca
        on tb_fabricante_marca.id_fabricante = tb_switch.id_fabricante
        inner join tb_modelo
        on tb_modelo.id_modelo = tb_switch.id_modelo
        inner join tb_departamento
        on tb_departamento.id_departamento = tb_switch . id_departamento';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharSwitch($id_switch) {

        $conexao = parent::retornaConexao();

        $comando = 'select id_switch, host, fabricante, modelo, ip, departamento, mac, service_tag, nota_fiscal, status, observacao from tb_switch
        inner join tb_fabricante_marca
        on tb_fabricante_marca.id_fabricante = tb_switch.id_fabricante
        inner join tb_modelo
        on tb_modelo.id_modelo = tb_switch.id_modelo
        inner join tb_departamento
        on tb_departamento.id_departamento = tb_switch.id_departamento
        where id_switch = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $id_switch);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarSwitch($host, $ip, $mac, $service_tag, $nota_fiscal, $status, $departamento, $fabricante, $modelo, $id_switch) {

        $conexao = parent::retornaConexao();

        $comando = 'update tb_switch set host = ?, ip = ?, mac = ?, service_tag = ?, nota_fiscal = ?, status = ?, 
                    id_departamento = ?, id_fabricante = ?, id_modelo = ? where id_switch = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $host);
        $sql->bindValue(2, $ip);
        $sql->bindValue(3, $mac);
        $sql->bindValue(4, $service_tag);
        $sql->bindValue(5, $nota_fiscal);
        $sql->bindValue(6, $status);
        $sql->bindValue(7, $departamento);
        $sql->bindValue(8, $fabricante);
        $sql->bindValue(9, $modelo);
        $sql->bindValue(10, $id_switch);
        
        
    }

}
