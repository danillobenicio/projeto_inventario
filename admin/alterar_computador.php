<?php
require_once '../DAO/ComputadorDAO.php';

require_once '../DAO/OfficeDAO.php';

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

$objdaooffice = new OfficeDAO();
    $offices = $objdaooffice->ConsultarOffice();
    
    $objdao = new ComputadorDAO();
     $computadores = $objdao->ConsultarComputador();
    
     

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $objdao = new ComputadorDAO();
    $dados = $objdao->DetalharComputador($_GET['cod']); // Não retornando 
    if (count($dados) == 0) {
        header('location: cons_computador.php');
    }

   

    
} else if (isset($_POST['btnSalvar'])) {

    $id_computador = $_POST['cod'];
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];
    $tipo = $_POST['tipo'];
    $fabricante = $_POST['fabricante'];
    $modelo = $_POST['modelo'];
    $so = $_POST['so'];
    $memoria = $_POST['memoria'];
    $processador = $_POST['processador'];
    $meio_armazenamento = $_POST['meio_armaz'];
    $tamanho_armazenamento = $_POST['tamanho_armaz'];
    $chave_windows = $_POST['chave_windows'];
    $versao = $_POST['versao'];
    $ip = $_POST['ip'];
    $host = $_POST['host'];
    $service_tag = $_POST['service_tag'];
    $nf = $_POST['nf'];
    $id = $_POST['id'];
    $tag_patrimonial = $_POST['tag_patrimonial'];
    $observacao = $_POST['observacao'];

    $objdao = new ComputadorDAO();
    $ret = $objdao->AlterarComputador($usuario, $departamento, $tipo, $fabricante, $modelo, $so, $memoria, $processador, $meio_armazenamento, $tamanho_armazenamento, $chave_windows, $versao, $ip, $host, $service_tag, $nf, $id, $tag_patrimonial, $observacao, $id_computador);
    
    header('location: alterar_computador.php?cod=' . $id_computador . '&ret=' . $ret); // Duvidas aqui 
    
} elseif (isset ($_POST['btnExcluir'])) {
    $id_computador = $_POST['cod'];
    
    $objdao = new ComputadorDAO();
        $ret = $objdao->ExcluirComputador($id_computador);
        header('location: cons_computador.php?ret=' . $ret);
} else {
    header('location: cons_computador.php');
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
                        <h2>Alterar dados cadastrados</h2>
                        <?php
                        if (isset($_GET['ret'])) {
                            ExibirMsg($_GET['ret']);
                        }
                        ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form method="post" action="alterar_computador.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_computador'] ?>" />
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Usuário</label>
                                    <select class="form-control" name="usuario">

                                        <option value="<?= $dados[0]['id_usuario'] ?>"><?php echo $dados[0]['usuario']; ?></option>
                                        <?php for ($i = 0; $i < count($usuarios); $i++) { ?>
                                            <option value="<?= $usuarios[$i]['id_usuario'] ?>"><?= $usuarios[$i]['usuario'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

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
                                    <label>Tipo Máquina</label>
                                    <select class="form-control" name="tipo">

                                        <option value="<?= $dados[0]['id_tipo'] ?>"><?php echo $dados[0]['tipo']; ?></option>
                                        <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                                            <option value="<?= $tipos[$i]['id_tipo'] ?>"><?= $tipos[$i]['tipo'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

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

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
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
                                    <label>Sistema Operacional</label>
                                    <select class="form-control" name="so">

                                        <option value="<?= $dados[0]['id_so'] ?>"><?php echo $dados[0]['so']; ?></option>
                                        <?php for ($i = 0; $i < count($sos); $i++) { ?>
                                            <option value="<?= $sos[$i]['id_so'] ?>"><?= $sos[$i]['so'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Memória Ram</label>
                                    <select class="form-control" name="memoria">
                                        <option value="1" <?= $dados[0]['memoria'] == 1 ? 'selected' : '' ?> >1 GB</option>
                                        <option value="2" <?= $dados[0]['memoria'] == 2 ? 'selected' : '' ?> >2 GB</option>
                                        <option value="3" <?= $dados[0]['memoria'] == 3 ? 'selected' : '' ?> >3 GB</option>
                                        <option value="4" <?= $dados[0]['memoria'] == 4 ? 'selected' : '' ?> >4 GB</option>
                                        <option value="5" <?= $dados[0]['memoria'] == 5 ? 'selected' : '' ?> >5 GB</option>
                                        <option value="6" <?= $dados[0]['memoria'] == 6 ? 'selected' : '' ?> >6 GB</option>
                                        <option value="7" <?= $dados[0]['memoria'] == 7 ? 'selected' : '' ?> >8 GB</option> 
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Processador</label>
                                    <select class="form-control" name="processador">

                                        <option value="<?= $dados[0]['id_so'] ?>"><?php echo $dados[0]['processador']; ?></option>
                                        <?php for ($i = 0; $i < count($processadores); $i++) { ?>
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
                                        <option value="1" <?= $dados[0] ['meio_armazenamento'] == 1 ? 'selected' : '' ?> >SSD</option>
                                        <option value="2" <?= $dados[0] ['meio_armazenamento'] == 2 ? 'selected' : '' ?> >HD</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Tamanho Armazenamento</label>
                                    <select class="form-control" name="tamanho_armaz">
                                        <option value="1" <?= $dados[0] ['tamanho_armazenamento'] == 1 ? 'selected' : '' ?>>120 GB</option>
                                        <option value="2" <?= $dados[0] ['tamanho_armazenamento'] == 2 ? 'selected' : '' ?>>240 GB</option>
                                        <option value="3" <?= $dados[0] ['tamanho_armazenamento'] == 3 ? 'selected' : '' ?>>480 GB</option>
                                        <option value="4" <?= $dados[0] ['tamanho_armazenamento'] == 4 ? 'selected' : '' ?>>500 GB</option>
                                        <option value="5" <?= $dados[0] ['tamanho_armazenamento'] == 5 ? 'selected' : '' ?>>1 TB</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Chave do Windows</label>
                                    <input class="form-control" placeholder="Chave do windows" value="<?= $dados[0]['chave_windows'] ?>" name="chave_windows"/>

                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Office Instalado</label>
                                    <select class="form-control" name="versao">

                                        <option value="<?= $dados[0]['id_office'] ?>"><?php echo $dados[0]['versao']; ?></option>
                                        <?php for ($i = 0; $i < count($offices); $i++) { ?>
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
                                    <input class="form-control" placeholder="Endereço IP da máquina" value="<?= $dados[0]['ip'] ?>" name="ip"/>

                                </div>

                            </div>
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Host</label>
                                    <input class="form-control" placeholder="Nome da máquina" value="<?= $dados[0]['host'] ?>" name="host"/>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Service Tag</label>
                                        <input class="form-control" placeholder="Service tag" value="<?= $dados[0]['service_tag'] ?>" name="service_tag"/>

                                    </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Nota Fiscal</label>
                                    <input class="form-control" placeholder="Nota fiscal" value="<?= $dados[0]['nota_fiscal'] ?>" name="nf"/>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>ID da máquina</label>
                                    <input autofocus="" type="text" class="form-control" placeholder="ID da máquina" value="<?= $dados[0]['id_maquina'] ?>" name="id"/>
                                </div>

                            </div>

                            <div class="col-md-3">


                                <div class="form-group">
                                    <label>Tag patrimonial</label>
                                    <input autofocus="" type="text" class="form-control" placeholder="Tag patrimonial" value="<?= $dados[0]['tag_patrimonial'] ?>" name="tag_patrimonial"/>
                                </div>

                            </div>

                        </div>



                    </div>

                    <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Se necessário informe algumas observações" name="observacao">0</textarea>
                    </div>

                    <button class="btn btn-success" onclick="return ValidarTela(1)" name="btnSalvar">Salvar Alterações</button>
                    <button class="btn btn-danger" onclick="return ValidarTela(1)" name="btnExcluir">Excluir registro</button>
                </form>
                </body>

                </html>