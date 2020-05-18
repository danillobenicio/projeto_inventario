<?php
require_once '../DAO/CadastrosDAO.php';

require_once '../DAO/NobreakDAO.php';

$objdaofabri = new CadastrosDAO();
$fabricantes = $objdaofabri->ConsultarFabricante();

$objdaomodelo = new CadastrosDAO();
$modelos = $objdaomodelo->ConsultarModelo();

$objdaodepart = new CadastrosDAO();
$departamentos = $objdaodepart->ConsultarDepartmento();

if(isset($_POST['btnCadastrar'])) {
    
    $id_fabricante = $_POST['fabricante'];
    $id_modelo = $_POST['modelo'];
    $num_serie = $_POST['num_serie'];
    $kva = $_POST['kva'];
    $id_departamento = $_POST['departamento'];
    $ip = $_POST['ip'];
    $dt_compra = $_POST['dt_compra'];
    $dt_instalacao = $_POST['dt_instalacao'];
    $dt_manutencao = $_POST['dt_manutencao'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $observacao = $_POST['obs'];
    
    $objdao = new NobreakDAO();
        $ret = $objdao->InserirNobreak($num_serie, $kva, $ip, $dt_compra, $dt_instalacao, $dt_manutencao, $nota_fiscal, $observacao, $id_fabricante, $id_departamento, $id_modelo);
    
    
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
                        <h2>Cadastrar Nobreak</h2> 


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php
                    if(isset($ret)) {
                        ExibirMsg($ret);
                    }
                ?>
                <form method="post" action="cad_nobreak.php">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">

                            
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


                            <div class="form-group">
                                <label>Número de Série</label>
                                <input class="form-control" placeholder="Número de série" name="num_serie"/>


                            </div>



                        </div>

                        <div class="col-md-3">


                            <div class="form-group">
                                <label>KVA</label>
                                <input class="form-control" placeholder="KVA" name="kva"/>


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


                            <div class="form-group">
                                <label>IP</label>
                                <input class="form-control" placeholder="Endereço IP" name="ip"/>


                            </div>



                        </div>

                        <div class="col-md-3">


                            <div class="form-group">
                                <label>DT Compra</label>
                                <input class="form-control" type="date" name="dt_compra"/>


                            </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>DT Instalação</label>
                                    <input class="form-control" type="date" name="dt_instalacao"/>


                                </div>



                        </div>

                        <div class="col-md-3">


                            <div class="form-group">
                                <label>DT Última Manutenção</label>
                                <input class="form-control" type="date" name="dt_manutencao"/>


                            </div>



                        </div>

                        <div class="col-md-3">


                            <div class="form-group">
                                <label>Nota Fiscal</label>
                                <input class="form-control" placeholder="Número da NF" name="nota_fiscal"/>


                            </div>



                        </div>


                    </div>

                </div>


                <div class="form-group">
                    <label>Observação</label>
                    <textarea class="form-control" rows="3" placeholder="Informe se necessário" name="obs"></textarea>
                </div>

                <button class="btn btn-success" name="btnCadastrar">Cadastrar</button>
                </form>

                </body>
                </html>



