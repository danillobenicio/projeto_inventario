<?php
require_once '../DAO/NobreakDAO.php';

$objdao = new NobreakDAO();
$nobreaks = $objdao->ConsultarNobreak();
?>
<!DOCTYPE html>
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
                        <h2>Consultar Nobreak</h2>   


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Filtros
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filtros</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Marca</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>KVA</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr/>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nobreak
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Número de Série</th>
                                        <th>KVA</th>
                                        <th>Local</th>
                                        <th>IP</th>
                                        <th>Data Compra</th>
                                        <th>Data Instalação</th>
                                        <th>Data Última Manutenção</th>
                                        <th>Nota Fiscal</th>
                                        <th>Observação</th>
                                        <th>Ação</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($nobreaks); $i++) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $nobreaks[$i]['fabricante'] ?></td>
                                            <td><?= $nobreaks[$i]['modelo'] ?></td>
                                            <td><?= $nobreaks[$i]['num_serie'] ?></td>
                                            <td><?= $nobreaks[$i]['kva'] ?></td>
                                            <td><?= $nobreaks[$i]['departamento'] ?></td>
                                            <td><?= $nobreaks[$i]['ip'] ?></td>
                                            <td><?= $nobreaks[$i]['dt_compra'] ?></td>
                                            <td><?= $nobreaks[$i]['dt_instalacao'] ?></td>
                                            <td><?= $nobreaks[$i]['dt_manutencao'] ?></td>
                                            <td><?= $nobreaks[$i]['nota_fiscal'] ?></td>
                                            <td><?= $nobreaks[$i]['observacao'] ?></td>
                                            <td><a href="alterar_nobreak.php?cod=<?= $nobreaks[$i] ['id_nobreak'] ?>" class="btn btn-warning btn-xs">Alterar</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



                </body>
                </html>


