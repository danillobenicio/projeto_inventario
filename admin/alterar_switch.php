<?php
require_once '../DAO/SwitchDAO.php';
require_once '../DAO/CadastrosDAO.php';

$objdaofabri = new CadastrosDAO();
$fabricantes = $objdaofabri->ConsultarFabricante();

$objdaomodelo = new CadastrosDAO();
$modelos = $objdaomodelo->ConsultarModelo();

$objdaodepart = new CadastrosDAO();
$departamentos = $objdaodepart->ConsultarDepartmento();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $objdao = new SwitchDAO();
    $dados = $objdao->DetalharSwitch($_GET['cod']);
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
                        <h2>Alterar Switch</h2> 



                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_switch.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_switch'] ?>" />
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control" placeholder="Nome do Switch" value="<?= $dados[0]['host'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Fabricante</label>
                                    <select class="form-control" name="fabricante">
                                        <option><?php echo $dados[0]['fabricante']; ?></option>
<?php for ($i = 0; $i < count($fabricantes); $i++) { ?>
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

                                            <option><?php echo $dados[0]['modelo']; ?></option>
<?php for ($i = 0; $i < count($modelos); $i++) { ?>
                                                <option value="<?= $modelos[$i]['id_modelo'] ?>"><?= $modelos[$i]['modelo'] ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>



                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>IP</label>
                                    <input class="form-control" placeholder="Endereço IP" value="<?= $dados[0]['ip'] ?>"/>


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

                                        <option><?php echo $dados[0]['departamento']; ?></option>
<?php for ($i = 0; $i < count($departamentos); $i++) { ?>
                                            <option value="<?= $departamentos[$i]['id_departamento'] ?>"><?= $departamentos[$i]['departamento'] ?></option>
                                        <?php } ?>
                                    </select>


                                </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Mac</label>
                                        <input class="form-control" placeholder="Endereço MAC" value="<?= $dados[0]['mac'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Service Tag</label>
                                        <input class="form-control" placeholder="Service Tag" value="<?= $dados[0]['service_tag'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Nota Fiscal</label>
                                        <input class="form-control" placeholder="Nota Fiscal" value="<?= $dados[0]['nota_fiscal'] ?>"/>


                                    </div>



                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" <?= $dados[0]['status'] == 1 ? 'selected' : '' ?>>Ativo</option>
                                        <option value="2" <?= $dados[0]['status'] == 2 ? 'selected' : '' ?>>Inativo</option>

                                    </select>


                                </div>



                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Informe se necessário"></textarea>
                    </div>

                    <button class="btn btn-success" onclick="return ValidarTela(1)" name="btnSalvar">Salvar Alterações</button>
                    <button class="btn btn-danger" onclick="return ValidarTela(1)" name="btnExcluir">Excluir registro</button>

                </form>
                </body>
                </html>


