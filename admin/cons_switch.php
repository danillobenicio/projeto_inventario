<?php
require_once '../DAO/SwitchDAO.php';

$objdao = new SwitchDAO();

$switchs = $objdao->ConsultarSwitch();
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
                        <h2>Consultar Switch</h2>   


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
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Modelo</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>
                                                <option value="1">Ativos</option>
                                                <option value="2">Inativos</option>
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
                        Switch
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>IP</th>
                                        <th>Departamento</th>
                                        <th>Mac</th>
                                        <th>Service Tag</th>
                                        <th>Nota Fiscal</th>
                                        <th>Status</th>
                                        <th>Observação</th>
                                        <th>Ação</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   <?php for ($i = 0; $i < count($switchs); $i++) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $switchs[$i]['host']?></td>
                                        <td><?= $switchs[$i]['fabricante']?></td>
                                        <td><?= $switchs[$i]['modelo']?></td>
                                        <td><?= $switchs[$i]['ip']?></td>
                                        <td><?= $switchs[$i]['departamento']?></td>
                                        <td><?= $switchs[$i]['mac']?></td>
                                        <td><?= $switchs[$i]['service_tag']?></td>
                                        <td><?= $switchs[$i]['nota_fiscal']?></td>
                                        <td><?= $switchs[$i]['status'] == 1 ? 'Ativo' : 'Inativo'?></td>
                                        <td><?= $switchs[$i]['observacao']?></td>
                                        <td><a href="alterar_switch.php?cod=<?= $switchs[$i] ['id_switch'] ?>" class="btn btn-warning btn-xs">Alterar</a></td>
                                    </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



                </body>
                </html>

