<?php
require_once '../DAO/CadastrosDAO.php';


if (isset($_POST['btncadastrar'])) {

    $tipo_cad = $_POST['tipo_cad'];
    $nome = $_POST['cadastro'];

    $dao = new CadastrosDAO();
    $ret = $dao->InserirUsuario($nome, $tipo_cad);
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
                        <h2>Outros cadastros</h2> 
                        <h4>Tela para cadastro de Usuários, Departamentos, Modelos de máquinas, Fábricantes Etc...</h4>
                        <?php
                        if (isset($ret)) {
                            ExibirMsg($ret);
                        }
                        ?>


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">

                            <form role="form" method="post" action="outros_cadastros.php">
                                <div class="form-group">
                                    <label>Selecione o tipo de cadastro</label>
                                    <select  class="form-control" name="tipo_cad">
                                        <option value="">Selecione</option>
                                        <option value="1">Usuário</option>
                                        <option value="2">Departamento</option>
                                        <option value="3">Marcas / Fabricantes</option>
                                        <option value="4">Modelo</option>
                                        <option value="5">Sistema Operacional</option>
                                        <option value="6">Processador</option>
                                        <option value="7">Tipo</option>
                                    </select>



                                </div>
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="form-control" name="cadastro"/> 
                                </div>
                                <button class="btn btn-success" name="btncadastrar">Cadastrar</button>
                            </form>


                        </div>


                    </div>

                </div>

            </div>

        </div>

    </body>
</html>
