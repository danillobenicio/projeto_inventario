<?php 

    require_once '../DAO/OfficeDAO.php';
    
    if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
        
        $objdao = new OfficeDAO();
            $dados = $objdao->DetalharOffice($_GET['cod']);
            
       
        
        
    } else if(isset($_POST['btnSalvar'])) {
        
        $id_office = $_POST['cod'];
        $tipo_office = $_POST['tipo_office'];
        $versao = $_POST['versao'];
        $softwares = $_POST['softwares'];
        $licenca = $_POST['licenca'];
        $status = $_POST['status'];
        $observacao = $_POST['obs'];
        
        $objdao = new OfficeDAO();
            $ret = $objdao->AlterarOffice($tipo_office, $versao, $softwares, $licenca, $status, $observacao, $id_office);
            
            header('location: alterar_office.php?cod=' . $id_office . '&ret=' . $ret);
        
    } elseif (isset ($_POST['btnExcluir'])) {
        
        $id_office = $_POST['cod'];
        
        $objdao = new OfficeDAO();
        
        $ret = $objdao->ExcluirOffice($id_office);
        
        header('location: cons_office.php?ret=' . $ret);
    } else {
        header('location: cons_office.php');
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
                        <h2>Alterar Office</h2> 
                        <?php
                        
                            if(isset($_GET['ret'])) {
                                
                                ExibirMsg($_GET['ret']);
                            }
                        
                        ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_office.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_office']?>" />
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Software</label>
                                    <input class="form-control" placeholder="MS Office / Libre / Outro" name="tipo_office" value="<?= $dados[0]['tipo_office'] ?>"/>


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Versão Office</label>
                                    <input class="form-control" placeholder="Versão do Office"value="<?= $dados[0]['versao'] ?>" name="versao"/>


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <label>Softwares Inclusos</label>
                                <input class="form-control" placeholder="Softwares inclusos" value="<?= $dados[0]['softwares'] ?>" name="softwares"/>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Licença</label>
                                    <input class="form-control" placeholder="Número da licenças" value="<?= $dados[0]['licenca'] ?>" name="licenca"/>


                                </div>



                        </div>

                    </div>

                </div>

                <div class="panel-body">
                    <div class="row">


                        <div class="col-md-3">

                            <form role="form">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?= $dados[0]['status'] == 1 ? 'selected' : '' ?> >Ativo</option>
                                    <option value="0" <?= $dados[0]['status'] == 0 ? 'selected' : '' ?> >Inativo</option>

                                </select>
                        </div>



                    </div>







                </div>
               
                <div class="form-group">
                    <label>Observação</label>
                    <textarea class="form-control" rows="3" placeholder="Se necessário informe algumas observações" name="obs"><?php echo $dados[0]['observacao'] ?></textarea>
                </div>




                <button class="btn btn-success" onclick="return ValidarTela(1)" name="btnSalvar">Salvar Alterações</button>
                <button class="btn btn-danger" onclick="return ValidarTela(1)" name="btnExcluir">Excluir registro</button>

        </form>
                </body>
                </html>
