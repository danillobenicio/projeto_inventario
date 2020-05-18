<?php
require_once '../DAO/OfficeDAO.php';



if (isset($_POST['btnCadastrar'])) {
    $tipo_office = $_POST['tipo_office'];
    $versao = $_POST['versao'];
    $softwares = $_POST['softwares'];
    $licenca = $_POST['licenca'];
    $obs = $_POST['obs'];

    $objdao = new OfficeDAO();

    $ret = $objdao->InserirOffice($tipo_office, $versao, $softwares, $licenca, $obs);

  
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
                        <h2>Cadastrar Office</h2> 
                        <?php
                        if (isset($ret)) {
                            ExibirMsg($ret);
                        }
                        ?>


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="cad_office.php">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    
                                        <label>Software</label>
                                        <input class="form-control" placeholder="MS Office / Libre / Outro" name="tipo_office"/>


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Versão Office</label>
                                    <input class="form-control" placeholder="Versão do Office" name="versao"/>


                                </div>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <label>Softwares Inclusos</label>
                                <input class="form-control" placeholder="Softwares inclusos" name="softwares"/>



                        </div>

                        <div class="col-md-3">

                            <form role="form">
                                <div class="form-group">
                                    <label>Licença</label>
                                    <input class="form-control" placeholder="Número da licenças" name="licenca"/>


                                </div>



                        </div>

                    </div>

                </div>
                <div class="panel-body">
                    <div class="row">






                    </div>







                </div>

                <div class="form-group">
                    <label>Observação</label>
                    <textarea class="form-control" rows="3" placeholder="Se necessário informe algumas observações" name="obs"></textarea>
                </div>




                <button type="submit" class="btn btn-success" name="btnCadastrar">Cadastrar</button>

               
 </form>
            </div>

        </div>

    </body>
</html>
