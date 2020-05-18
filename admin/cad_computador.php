<?php
require_once '../DAO/ComputadorDAO.php';

require_once '../DAO/CadastrosDAO.php';
$objdaousuario = new CadastrosDAO();
$usuarios = $objdaousuario->ConsultarUsuario();

$objdaodepart = new CadastrosDAO();
$departamentos = $objdaodepart->ConsultarDepartmento();

$objdaotipo = new CadastrosDAO();
$tipos = $objdaotipo->ConsultarTipo();

$objdaofabri = new CadastrosDAO();
$fabricantes = $objdaofabri->ConsultarFabricante();

$objdaomodelo = new CadastrosDAO();
$modelos = $objdaomodelo->ConsultarModelo();

$objdaoso = new CadastrosDAO();
$sos = $objdaoso->ConsultarSO();

$objdaoproce = new CadastrosDAO();
$processadores = $objdaoproce->ConsultarProcessador();

$objdaooffice = new CadastrosDAO();
$offices = $objdaooffice->ConsultarOffice();


if (isset($_POST['btnCadastrar'])) {
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];
    $tipo = $_POST['tipo'];
    $fabricante = $_POST['fabricante'];
    $modelo = $_POST['modelo'];
    $so = $_POST['so'];
    $memoria = $_POST['memoria'];
    $processador = $_POST['processador'];
    $meio_armaz = $_POST['meio_armaz'];
    $tamanho_armaz = $_POST['tamanho_armaz'];
    $chave_windows = $_POST['chave_windows'];
    $office = $_POST['office'];
    $ip = $_POST['ip'];
    $host = $_POST['host'];
    $servicetag = $_POST['servicetag'];
    $nf = $_POST['nf'];
    $id = $_POST['id'];
    $tagpatrimonial = $_POST['tagpatrimonial'];
    $observacao = $_POST['observacao'];

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
    $objdao = new ComputadorDAO();

    $ret = $objdao->InserirComputador($usuario, $departamento, $tipo, $fabricante, $modelo, $so, $memoria, $processador, $meio_armaz, $tamanho_armaz, $chave_windows, $office, $ip, $host, $servicetag, $nf, $id, $tagpatrimonial, $observacao);
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
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Cadastrar Computador</h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php
                if (isset($ret)) {
                    ExibirMsg($ret);
                }
                ?>
                <form method="post" action="cad_computador.php">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Usuário</label>
                                    <select class="form-control" name="usuario">
                                        <option value="">Selecione</option>
                                        <?php for ($i = 0; $i < count($usuarios); $i ++) { ?>
                                            <option value="<?= $usuarios[$i]['id_usuario'] ?>"><?= $usuarios[$i]['usuario'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

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
                                    <label>Tipo máquina</label>
                                    <br>
                                        <select class="form-control" name="tipo">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($tipos); $i ++) { ?>
                                                <option value="<?= $tipos[$i]['id_tipo'] ?>"><?= $tipos[$i]['tipo'] ?></option>
                                            <?php } ?>
                                        </select>
                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Fabricante</label>
                                    <select class="form-control" name="fabricante">
                                        <option value="">Selecione</option>
                                        <?php for ($i = 0; $i < count($fabricantes); $i ++) { ?>
                                            <option value="<?= $fabricantes[$i]['id_fabricante'] ?>"><?= $fabricantes[$i]['fabricante'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
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
                                    <label>Sistema Operacional</label>
                                    <select class="form-control" name="so">
                                        <option value="">Selecione</option>
                                        <?php for ($i = 0; $i < count($sos); $i ++) { ?>
                                            <option value="<?= $sos[$i]['id_so'] ?>"><?= $sos[$i]['so'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Memória Ram</label>
                                    <select class="form-control" name="memoria">
                                        <option value="1">1 GB</option>
                                        <option value="2">2 GB</option>
                                        <option value="3">3 GB</option>
                                        <option value="4">4 GB</option>
                                        <option value="5">5 GB</option>
                                        <option value="6">6 GB</option>
                                        <option value="7">8 GB</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Processador</label>
                                    <select class="form-control" name="processador">
                                        <option value="">Selecione</option>
                                        <?php for ($i = 0; $i < count($processadores); $i ++) { ?>
                                            <option value="<?= $processadores[$i]['id_processador'] ?>"><?= $processadores[$i]['processador'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


                                <div class="form-group">

                                    <label>Meio de Armazenamento</label>
                                    <select class="form-control" name="meio_armaz">
                                        <option value="1">SSD</option>
                                        <option value="2">HD</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Tamanho Armazenamento</label>
                                    <select class="form-control" name="tamanho_armaz">
                                        <option value="1">120 GB</option>
                                        <option value="2">240 GB</option>
                                        <option value="3">480 GB</option>
                                        <option value="4">500 GB</option>
                                        <option value="5">1 TB</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Chave do Windows</label>
                                    <input class="form-control" placeholder="Chave do windows" name="chave_windows"/>

                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Office instalado</label>
                                    <select class="form-control" name="office">
                                        <option value="">Selecione</option>
                                        <?php for ($i = 0; $i < count($offices); $i ++) { ?>
                                            <option value="<?= $offices[$i]['id_office'] ?>"><?= $offices[$i]['versao'] ?> / <?= $offices[$i]['licenca'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>IP da máquina</label>
                                    <input class="form-control" placeholder="Endereço IP da máquina" name="ip"/>

                                </div>

                            </div>
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Host</label>
                                    <input class="form-control" placeholder="Nome da máquina" name="host"/>

                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Service Tag</label>
                                    <input class="form-control" placeholder="Service tag" name="servicetag"/>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Nota Fiscal</label>
                                        <input class="form-control" placeholder="Nota fiscal" name="nf"/>

                                    </div>

                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>ID da máquina</label>
                                    <input autofocus="" type="text" class="form-control" placeholder="ID da máquina" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label id="val_usuario" class="validar-campos"></label>
                                </div>
                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Tag patrimonial</label>
                                    <input autofocus="" type="text" class="form-control" placeholder="Tag patrimonial" name="tagpatrimonial"/>
                                </div>
                                <div class="form-group">
                                    <label id="val_usuario" class="validar-campos"></label>
                                </div>
                            </div>

                        </div>



                    </div>

                    <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Se necessário informe algumas observações" name="observacao"></textarea>
                    </div>

                    <button class="btn btn-success" onclick="return ValidarTela(1)" name="btnCadastrar">Cadastrar</button>




                </form>
                </body>
                </html>