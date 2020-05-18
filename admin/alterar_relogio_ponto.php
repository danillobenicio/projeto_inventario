<?php
    require_once '../DAO/RelPontoDAO.php';
    
    if(isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    
    $objdao = new RelPontoDAO();
        $dados = $objdao->DetalharRelPonto($_GET['cod']);
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
                        <h2>Alterar Relógio Ponto</h2> 



                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />  
                <form method="post" action="alterar_relogio_ponto.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_relponto']?>" />
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <input class="form-control" placeholder="Departamento" value="<?= $dados[0]['departamento']?>" />


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input class="form-control" placeholder="Marca" value="<?= $dados[0]['fabricante']?>" />


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <input class="form-control" placeholder="Modelo" value="<?= $dados[0]['modelo']?>" />


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Número de Série</label>
                                    <input class="form-control" placeholder="Número de Série" value="<?= $dados[0]['num_serie']?>" />


                                </div>



                        </div>

                    </div>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>IP</label>
                                    <input class="form-control" placeholder="IP" value="<?= $dados[0]['ip']?>" />


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Chave RSA</label>
                                    <input class="form-control" placeholder="Chave RSA" value="<?= $dados[0]['chaversa']?>" />


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Patrimonial</label>
                                    <input class="form-control" placeholder="Código Patrimonial" value="<?= $dados[0]['cod_patrimonial']?>" />


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control">
                                        <option value="1" value="<?= $dados[0]['status'] == 1 ? 'selected' : '' ?>">Ativo</option>
                                        <option value="2" value="<?= $dados[0]['status'] == 2 ? 'selected' : '' ?>">Inativo</option>

                                    </select>


                                </div>



                        </div>


                    </div>

                </div>



                <button class="btn btn-success" onclick="return ValidarTela(1)">Salvar Alterações</button>
                    <button class="btn btn-danger" onclick="return ValidarTela(1)">Excluir registro</button>

        </form>
                </body>
                </html>



