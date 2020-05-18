<?php

require_once 'Conexao.php';

class ComputadorDAO extends Conexao {

    public function InserirComputador($usuario, $departamento, $tipo, $fabricante, $modelo, $so, $memoria, $processador, $meio_armaz, $tamanho_armaz, $chave_windows, $office, $ip, $host, $servicetag, $nf, $id, $tag_patrimonial, $observacao) {

        $conexao = parent::retornaConexao();

        $comando = 'insert into tb_computador (memoria, meio_armazenamento, tamanho_armazenamento, chave_windows, ip, host, service_tag, nota_fiscal, id_maquina, tag_patrimonial, observacao, id_departamento, id_tipo, id_office, id_modelo, id_processador, id_so, id_fabricante, id_usuario)
                    values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $memoria);
        $sql->bindValue(2, $meio_armaz);
        $sql->bindValue(3, $tamanho_armaz);
        $sql->bindValue(4, $chave_windows);
        $sql->bindValue(5, $ip);
        $sql->bindValue(6, $host);
        $sql->bindValue(7, $servicetag);
        $sql->bindValue(8, $nf);
        $sql->bindValue(9, $id);
        $sql->bindValue(10, $tag_patrimonial);
        $sql->bindValue(11, $observacao);
        $sql->bindValue(12, $departamento);
        $sql->bindValue(13, $tipo);
        $sql->bindValue(14, $office);
        $sql->bindValue(15, $modelo);
        $sql->bindValue(16, $processador);
        $sql->bindValue(17, $so);
        $sql->bindValue(18, $fabricante);
        $sql->bindValue(19, $usuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarComputador() {

        $conexao = parent::retornaConexao();

        $comando = 'select id_computador, usuario, departamento, tipo, fabricante, modelo, so, memoria, processador, meio_armazenamento, tamanho_armazenamento, chave_windows, versao, ip, host, service_tag, nota_fiscal, id_maquina, tag_patrimonial, tb_computador.observacao from tb_computador
        inner join tb_usuario
        on tb_usuario.id_usuario = tb_computador.id_usuario
        inner join tb_fabricante_marca
        on tb_fabricante_marca.id_fabricante = tb_computador.id_fabricante
        inner join tb_modelo
        on tb_modelo.id_modelo = tb_computador.id_modelo
        inner join tb_departamento
        on tb_departamento.id_departamento = tb_computador.id_departamento
        inner join tb_tipo
        on tb_tipo.id_tipo = tb_computador.id_tipo
        inner join tb_so
        on tb_so.id_so = tb_computador.id_so
        inner join tb_processador
        on tb_processador.id_processador = tb_computador.id_processador
        inner join tb_office
        on tb_office.id_office = tb_computador.id_office
        order by departamento';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharComputador($id_computador) {

        $conexao = parent::retornaConexao();

        $comando = 'select id_computador, tb_usuario.id_usuario, usuario, tb_departamento.id_departamento, departamento, tb_tipo.id_tipo, tipo, tb_fabricante_marca.id_fabricante, fabricante, tb_modelo.id_modelo, modelo, tb_so.id_so, so, memoria, tb_processador.id_processador, processador, meio_armazenamento, tamanho_armazenamento, chave_windows, tb_office.id_office, versao, ip, host, service_tag, nota_fiscal, id_maquina, tag_patrimonial, tb_computador.observacao from tb_computador
        inner join tb_usuario
        on tb_usuario.id_usuario = tb_computador.id_usuario
        inner join tb_fabricante_marca
        on tb_fabricante_marca.id_fabricante = tb_computador.id_fabricante
        inner join tb_modelo
        on tb_modelo.id_modelo = tb_computador.id_modelo
        inner join tb_departamento
        on tb_departamento.id_departamento = tb_computador.id_departamento
        inner join tb_tipo
        on tb_tipo.id_tipo = tb_computador.id_tipo
        inner join tb_so
        on tb_so.id_so = tb_computador.id_so
        inner join tb_processador
        on tb_processador.id_processador = tb_computador.id_processador
        inner join tb_office
        on tb_office.id_office = tb_computador.id_office
        where id_computador = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $id_computador);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarComputador($usuario, $departamento, $tipo, $fabricante, $modelo, $so, $memoria, $processador, $meio_armazenamento, 
                               $tamanho_armazenamento, $chave_windows, $versao, $ip, $host, $service_tag, $nf, $id, $tagpatrimonial, $observacao, $id_computador) {

        $conexao = parent::retornaConexao();

        $comando = 'update tb_computador set id_usuario = ?, id_departamento = ?, id_tipo = ?, id_fabricante = ?, id_modelo = ?,
                   id_so = ?, memoria = ?, id_processador = ?, meio_armazenamento = ?, tamanho_armazenamento = ?, chave_windows = ?, id_office = ?,
                   ip = ?, host = ?, service_tag = ?, nota_fiscal = ?, id_maquina = ?, tag_patrimonial = ?, observacao = ?
                  
                   where id_computador = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $usuario);
        $sql->bindValue(2, $departamento);
        $sql->bindValue(3, $tipo);
        $sql->bindValue(4, $fabricante);
        $sql->bindValue(5, $modelo);
        $sql->bindValue(6, $so);
        $sql->bindValue(7, $memoria);
        $sql->bindValue(8, $processador);
        $sql->bindValue(9, $meio_armazenamento);
        $sql->bindValue(10, $tamanho_armazenamento);
        $sql->bindValue(11, $chave_windows);
        $sql->bindValue(12, $versao);
        $sql->bindValue(13, $ip);
        $sql->bindValue(14, $host);
        $sql->bindValue(15, $service_tag);
        $sql->bindValue(16, $nf);
        $sql->bindValue(17, $id);
        $sql->bindValue(18, $tagpatrimonial);
        $sql->bindValue(19, $observacao);
        $sql->bindValue(20, $id_computador);
        
        try {
            $sql->execute();
                return 7;
        } catch (Exception $ex) {
            echo $ex->getMessage();
                return -1;
        }
        
        
    }

    public function ExcluirComputador($id_computador) {
        
        $conexao = parent::retornaConexao();
        
        $comando = 'delete from tb_computador where id_computador = ?';
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $id_computador);
        
        try {
            $sql->execute();
                return 8;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
        
    }
}
