<?php
    require_once '../DAO/CadastrosDAO.php';
    
    require_once '../DAO/RelPontoDAO.php';    
            
        $objdaofabri = new CadastrosDAO();
            $fabricantes = $objdaofabri->ConsultarFabricante();
            
        $objdaodepart = new CadastrosDAO();
            $departamentos = $objdaodepart->ConsultarDepartmento();
            
        $objdaomodelo = new CadastrosDAO();
            $modelos = $objdaomodelo->ConsultarModelo();
            
        if(isset($_POST['btnCadastrar'])) {
            
            $id_departamento = $_POST['departamento'];
            $id_fabricante = $_POST['fabricante'];
            $id_modelo = $_POST['modelo'];
            $num_serie = $_POST['num_serie'];
            $ip = $_POST['ip'];
            $chaversa = $_POST['chaversa'];
            $cod_patrimonial = $_POST['cod_patrimonial'];
           
            
            $objdao = new RelPontoDAO();
                $ret = $objdao->InserirRelPonto($num_serie, $ip, $chaversa, $cod_patrimonial, $id_departamento, $id_fabricante, $id_modelo);
            
            
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
                        <h2>Cadastrar Relógio Ponto</h2> 



                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php
                if(isset($ret)) {
                    ExibirMsg($ret);
                }
                
                ?>
                <form method="post" action="cad_relogio_ponto.php">
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

                           
                                <div class="form-group">
                                    <label>Número de Série</label>
                                    <input class="form-control" placeholder="Número de Série" name="num_serie"/>


                                </div>



                        </div>

                    </div>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">

                            
                                <div class="form-group">
                                    <label>IP</label>
                                    <input class="form-control" placeholder="IP" name="ip"/>


                                </div>



                        </div>

                        <div class="col-md-3">

                            
                                <div class="form-group">
                                    <label>Chave RSA</label>
                                    <input class="form-control" placeholder="Chave RSA" name="chaversa"/>


                                </div>



                        </div>

                        <div class="col-md-3">

                            
                                <div class="form-group">
                                    <label>Patrimonial</label>
                                    <input class="form-control" placeholder="Código Patrimonial" name="cod_patrimonial"/>


                                </div>



                        </div>

                        


                    </div>

                </div>


             

                    <button class="btn btn-success" name="btnCadastrar">Cadastrar</button>

        </form>
                </body>
                </html>



