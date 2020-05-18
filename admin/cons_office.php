<?php
    require_once '../DAO/OfficeDAO.php';
    
    $objdao = new OfficeDAO();
        $offices = $objdao->ConsultarOffice();
    
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
                        <h2>Consultar Office</h2>   


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
                                            <label>Tipo</label>
                                            <select class="form-control">
                                                <option value="0" selected>Todos</option>
                                                <option value="1">Ativo</option>
                                                <option value="2">Inativo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control">
                                                <option value="0" selected>Todos</option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Versão do Office</label>
                                            <select class="form-control">
                                                <option value="0" selected>Todos</option>
                                                <option value="1"></option>
                                                <option value="2"></option>
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
                        Offices
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Software</th>
                                        <th>Versão do Office</th>
                                        <th>Softwares inclusos</th>
                                        <th>Número da licença</th>
                                        <th>Status</th>
                                        <th>Observação</th>
                                        <th>Ação</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i <count($offices); $i++) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $offices[$i]['tipo_office'] ?></td>
                                        <td><?= $offices[$i]['versao'] ?></td>
                                        <td><?= $offices[$i]['softwares'] ?></td>
                                        <td><?= $offices[$i]['licenca'] ?></td>
                                        <td><?= $offices[$i]['status'] == 1 ? 'Ativo' : 'Inativo' ?></td>
                                        <td><?= $offices[$i]['observacao'] ?></td>
                                      


                                        <td><a href="alterar_office.php?cod=<?= $offices[$i] ['id_office']?>" class="btn btn-warning btn-xs">Alterar</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



                </body>
                </html>

