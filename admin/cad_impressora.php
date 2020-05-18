<?php
require_once '../DAO/CadastrosDAO.php';
require_once '../DAO/ImpressoraDAO.php';

$objdaofabri = new CadastrosDAO();
$fabricantes = $objdaofabri->ConsultarFabricante();

$objdaomodelo = new CadastrosDAO();
$modelos = $objdaomodelo->ConsultarModelo();

$objdaodepart = new CadastrosDAO();
$departamentos = $objdaodepart->ConsultarDepartmento();

if (isset($_POST['btnCadastrar'])) {
    
    $id_fabricante = $_POST['fabricante'];
    $id_modelo = $_POST['modelo'];
    $num_serie = $_POST['num_serie'];
    $ip = $_POST['ip'];
    $id_departamento = $_POST['departamento'];
    $proprietario = $_POST['proprietario'];
    $cod_patrimonial = $_POST['cod_patrimonial'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $observacao = $_POST['observacao'];
    
    $objdao = new ImpressoraDAO();
        $ret = $objdao->InserirImpressora($num_serie, $ip, $cod_patrimonial, $nota_fiscal, $observacao, $proprietario, $id_fabricante, $id_modelo, $id_departamento);
}
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
                        <h2>Cadastrar Impressora</h2> 



                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                  <?php
                if (isset($ret)) {
                    ExibirMsg($ret);
                }
                ?>
                <form id="ValidaImpressora" method="post" action="cad_impressora.php">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Marca / Fabricante</label>
                                        <select class="form-control" name="fabricante">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($fabricantes); $i ++) { ?>
                                                <option value="<?= $fabricantes[$i]['id_fabricante'] ?>"><?= $fabricantes[$i]['fabricante'] ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Modelo</label>
                                        <select class="form-control" name="modelo">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($modelos); $i ++) { ?>
                                                <option value="<?= $modelos[$i]['id_modelo'] ?>"><?= $modelos[$i]['modelo'] ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Número de série</label>
                                        <input class="form-control" placeholder="Número de série da impressora" name="num_serie"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Endereço IP</label>
                                        <input class="form-control" placeholder="Ip da impressora" name="ip"/>


                                    </div>



                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <select class="form-control" name="departamento">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($departamentos); $i ++) { ?>
                                                <option value="<?= $departamentos[$i]['id_departamento'] ?>"><?= $departamentos[$i]['departamento'] ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Proprietário</label>
                                        <select class="form-control" name="proprietario">
                                            <option value="1">Granjeiro</option>
                                            <option value="2">Top Toner</option>

                                        </select>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Código Patrimonial</label>
                                        <input class="form-control" placeholder="Código patrimonial" name="cod_patrimonial"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Nota Fiscal</label>
                                        <input class="form-control" placeholder="Nota Fiscal" name="nota_fiscal"/>


                                    </div>



                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Informe observações se necessário" name="observacao"></textarea>
                    </div>


                    <button class="btn btn-success" name="btnCadastrar">Cadastrar</button>

                </form> 
                </body>
                </html>
