<?php
require_once '../DAO/CadastrosDAO.php';
require_once '../DAO/SwitchDAO.php';
$objdaofabri = new CadastrosDAO();
$fabricantes = $objdaofabri->ConsultarFabricante();

$objdaomodelo = new CadastrosDAO();
$modelos = $objdaomodelo->ConsultarModelo();

$objdaodepart = new CadastrosDAO();
$departamentos = $objdaodepart->ConsultarDepartmento();

if(isset($_POST['btnCadastrar'])) {
    
    $host = $_POST['host'];
    $id_fabricante = $_POST['fabricante'];
    $id_modelo= $_POST['modelo'];
    $ip = $_POST['ip'];
    $id_departamento = $_POST['departamento'];
    $mac = $_POST['mac'];
    $service_tag = $_POST['service_tag'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $observacao = $_POST['observacao'];
    
    $objdao = new SwitchDAO();
        $ret = $objdao->InserirSwitch($host, $ip, $mac, $service_tag, $nota_fiscal, $observacao, $id_departamento, $id_fabricante, $id_modelo);
    
    
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
                        <h2>Cadastrar Switch</h2> 



                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php
                if (isset($ret)) {
                    ExibirMsg($ret);
                }
                ?>
                <form method="post" action="cad_switch.php">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Host</label>
                                        <input class="form-control" placeholder="Nome do Switch" name="host"/>


                                    </div>



                            </div>

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
                                        <label>IP</label>
                                        <input class="form-control" placeholder="Endereço IP" name="ip"/>


                                    </div>



                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


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
                                        <label>Mac</label>
                                        <input class="form-control" placeholder="Endereço MAC" name="mac"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Service Tag</label>
                                        <input class="form-control" placeholder="Service Tag" name="service_tag"/>


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
                        <textarea class="form-control" rows="3" placeholder="Informe se necessário" name="observacao"></textarea>
                    </div>

                    <button class="btn btn-success" name="btnCadastrar">Cadastrar</button>
                </form>

                </body>
                </html>


