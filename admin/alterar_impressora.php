<?php
require_once '../DAO/ImpressoraDAO.php';
require_once '../DAO/CadastrosDAO.php';

$objdaofabri = new CadastrosDAO();
$fabricantes = $objdaofabri->ConsultarFabricante();

$objdaomodelo = new CadastrosDAO();
$modelos = $objdaomodelo->ConsultarModelo();

$objdaodepart = new CadastrosDAO();
$departamentos = $objdaodepart->ConsultarDepartmento();


if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $objdao = new ImpressoraDAO();
    $dados = $objdao->DetalharImpressora($_GET['cod']);
    if (count($dados) == 0) {
        header('location: cons_impressora.php');
    }
} else if (isset($_POST['btnSalvar'])) {

    $id_impressora = $_POST['cod'];
    $fabricante = $_POST['fabricante'];
    $modelo = $_POST['modelo'];
    $num_serie = $_POST['num_serie'];
    $ip = $_POST['ip'];
    $departamento = $_POST['departamento'];
    $proprietario = $_POST['proprietario'];
    $cod_patrimonial = $_POST['cod_patrimonial'];
    $nf = $_POST['nf'];
    $obs = $_POST['obs'];

    $objdao = new ImpressoraDAO();
    $ret = $objdao->AlterarImpressora($fabricante, $modelo, $num_serie, $ip, $departamento, $proprietario, $cod_patrimonial, $nf, $obs, $id_impressora);
    header('location: alterar_impressora.php?cod=' . $id_impressora . '&ret=' . $ret);
    
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
                        <h2>Alterar Impressora</h2> 
                        <?php
                        if (isset($_GET['ret'])) {
                            ExibirMsg($_GET['ret']);
                        }
                        ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_impressora.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_impressora'] ?>" />
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Fabricante</label>
                                    <select class="form-control" name="fabricante">

                                        <option value="<?= $dados[0]['id_fabricante'] ?>"><?php echo $dados[0]['fabricante']; ?></option>
                                        <?php for ($i = 0; $i < count($fabricantes); $i++) { ?>
                                            <option value="<?= $fabricantes[$i]['id_fabricante'] ?>"><?= $fabricantes[$i]['fabricante'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Modelo</label>
                                    <select class="form-control" name="modelo">

                                        <option value="<?= $dados[0]['id_modelo'] ?>"><?php echo $dados[0]['modelo']; ?></option>
                                        <?php for ($i = 0; $i < count($modelos); $i++) { ?>
                                            <option value="<?= $modelos[$i]['id_modelo'] ?>"><?= $modelos[$i]['modelo'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                            </div>

                            <div class="col-md-3">

                              
                                    <div class="form-group">
                                        <label>Número de série</label>
                                        <input class="form-control" placeholder="Número de série da impressora" value="<?= $dados[0]['num_serie'] ?>" name="num_serie"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                               
                                    <div class="form-group">
                                        <label>Endereço IP</label>
                                        <input class="form-control" placeholder="Ip da impressora" value="<?= $dados[0]['ip'] ?>" name="ip"/>


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

                                        <option value="<?= $dados[0]['id_departamento'] ?>"><?php echo $dados[0]['departamento']; ?></option>
                                        <?php for ($i = 0; $i < count($departamentos); $i++) { ?>
                                            <option value="<?= $departamentos[$i]['id_departamento'] ?>"><?= $departamentos[$i]['departamento'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                            </div>

                            <div class="col-md-3">

                              
                                    <div class="form-group">
                                        <label>Proprietário</label>
                                        <select class="form-control" name="proprietario">
                                            <option value="1" <?= $dados[0]['proprietario'] == 1 ? 'selected' : '' ?>>Granjeiro</option>
                                            <option value="2" <?= $dados[0]['proprietario'] == 2 ? 'selected' : '' ?>>Top Toner</option>

                                        </select>


                                    </div>



                            </div>

                            <div class="col-md-3">

                              
                                    <div class="form-group">
                                        <label>Código Patrimonial</label>
                                        <input class="form-control" placeholder="Código patrimonial" value="<?= $dados[0]['cod_patrimonial'] ?>" name="cod_patrimonial"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                              
                                    <div class="form-group">
                                        <label>Nota Fiscal</label>
                                        <input class="form-control" placeholder="Nota Fiscal" value="<?= $dados[0]['nota_fiscal'] ?>" name="nf"/>


                                    </div>



                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Informe observações se necessário" name="obs"><?= $dados[0]['observacao'] ?></textarea>
                    </div>

                    <button class="btn btn-success" onclick="return ValidarTela(1)" name="btnSalvar">Salvar Alterações</button>
                    <button class="btn btn-danger" onclick="return ValidarTela(1)" name="btnExcluir">Excluir registro</button>

                </form>
                </body>
                </html>

