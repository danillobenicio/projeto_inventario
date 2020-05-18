<?php
require_once '../DAO/NobreakDAO.php';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $objdao = new NobreakDAO();
    $dados = $objdao->DetalharNobreak($_GET['cod']);
}
?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include_once '_head.php';
    ?>
    <body>
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Alterar Nobreak</h2> 


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_nobreak.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_nobreak'] ?>" />
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <input class="form-control" placeholder="Marca" value="<?= $dados[0]['fabricante'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Modelo</label>
                                        <input class="form-control" placeholder="Modelo" value="<?= $dados[0]['modelo'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Número de Série</label>
                                        <input class="form-control" placeholder="Número de série" value="<?= $dados[0]['num_serie'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>KVA</label>
                                        <input class="form-control" placeholder="KVA" value="<?= $dados[0]['kva'] ?>"/>


                                    </div>



                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Local</label>
                                        <input class="form-control" placeholder="Local" value="<?= $dados[0]['departamento'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>IP</label>
                                        <input class="form-control" placeholder="Endereço IP" value="<?= $dados[0]['ip'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>DT Compra</label>
                                        <input class="form-control" type="date" value="<?= $dados[0]['dt_compra'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>DT Instalação</label>
                                        <input class="form-control" type="date" value="<?= $dados[0]['dt_instalacao'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>DT Última Manutenção</label>
                                        <input class="form-control" type="date" value="<?= $dados[0]['dt_manutencao'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Nota Fiscal</label>
                                        <input class="form-control" placeholder="Número da NF" value="<?= $dados[0]['nota_fiscal'] ?>"/>


                                    </div>



                            </div>


                        </div>

                    </div>


                    <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Informe se necessário"><?= $dados[0]['observacao'] ?></textarea>
                    </div>

                    <button class="btn btn-success" onclick="return ValidarTela(1)">Salvar Alterações</button>
                    <button class="btn btn-danger" onclick="return ValidarTela(1)">Excluir registro</button>

                </form>
                </body>
                </html>




