<?php

    require_once '../DAO/ImpressoraDAO.php';
    
    $objdao = new ImpressoraDAO();
    
    $impressoras = $objdao->ConsultarImpressora();

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
                        <h2>Consultar Impressoras</h2>   


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <!-- Button trigger modal -->


                <!-- Modal -->


                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Marca</label>
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
                                <label>Propietário</label>
                                <select class="form-control">
                                    <option value="0" selected></option>
                                    <option value="1"></option>
                                    <option value="2"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                   
                <br>
                    <center><button type="button" class="btn btn-primary">Pesquisar</button></center>
                   
                </div>

                <hr/>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Impressoras</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Número de Série</th>
                                        <th>IP</th>
                                        <th>Departamento</th>
                                        <th>Proprietário</th>
                                        <th>Código Patrimonial</th>
                                        <th>Nota Fiscal</th>
                                        <th>Observação</th>             
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i <count($impressoras); $i++) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $impressoras[$i]['fabricante']?></td>
                                        <td><?= $impressoras[$i]['modelo']?></td>
                                        <td><?= $impressoras[$i]['num_serie']?></td>
                                        <td><?= $impressoras[$i]['ip']?></td>
                                        <td><?= $impressoras[$i]['departamento']?></td>
                                        <td><?= $impressoras[$i]['proprietario'] == 1 ? 'Granjeiro' : 'Top Toner'?></td>
                                        <td><?= $impressoras[$i]['cod_patrimonial']?></td>
                                        <td><?= $impressoras[$i]['nota_fiscal']?></td>
                                        <td><?= $impressoras[$i]['observacao']?></td>
                                        <td><a href="alterar_impressora.php?cod=<?= $impressoras[$i] ['id_impressora']?>"class="btn btn-warning btn-xs">Alterar</a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



                </body>
                </html>
