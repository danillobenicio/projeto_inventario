<?php
require_once '../DAO/ComputadorDAO.php';

$objdao = new ComputadorDAO();
$computadores = $objdao->ConsultarComputador();
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
                        <h2>Consultar Computador</h2>
                    </div>
                    
                </div>
                
                <?php
                            if (isset($_GET['ret'])) {
                                ExibirMsg($_GET['ret']);
                            }
                            ?>
                <!-- /. ROW  -->
                <hr />
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Filtros
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filtros</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">   
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Versão do Windows</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Máquina</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Processador</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Memória</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Máquina</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Máquina</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Máquina</label>
                                            <select class="form-control">
                                                <option value="0" selected></option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal -->
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Computadores
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Usuário</th>
                                        <th>Departamento</th>
                                        <th>Tipo</th>
                                        <th>Fabricante</th>
                                        <th>Modelo</th>
                                        <th>Sistema Operacional</th>                                     
                                        <th>Office Instalado</th>
                                        <th>Ip da máquina</th>                                     
                                        <th>Mais Detalhes</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($computadores); $i++) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $computadores[$i]['usuario'] ?></td>
                                            <td><?= $computadores[$i]['departamento'] ?></td>
                                            <td><?= $computadores[$i]['tipo'] ?></td>
                                            <td><?= $computadores[$i]['fabricante'] ?></td>
                                            <td><?= $computadores[$i]['modelo'] ?></td>
                                            <td><?= $computadores[$i]['so'] ?></td>                                              
                                            <td><?= $computadores[$i]['versao'] ?></td>
                                            <td><?= $computadores[$i]['ip'] ?></td>                                      
                                            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $computadores[$i] ['id_computador']; ?>">Detalhar</button></td>
                                            <td><a href="alterar_computador.php?cod=<?= $computadores[$i] ['id_computador'] ?>" class="btn btn-warning btn-xs">Editar</a></td>
                                        </tr>


                                        <!-- Início Modal -->

                                        <div class="modal fade" id="myModal<?php echo $computadores[$i] ['id_computador']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $computadores[$i]['host'] ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <input type="hidden" name="cod" value="<?= $dados[0]['id_computador'] ?>" />
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-3">


                                                                        <div class="form-group">
                                                                            <label>Usuário</label>
                                                                            <input autofocus="" type="text" class="form-control" placeholder="Nome do(a) Usuário(a)" disabled="" value="<?php echo $computadores[$i]['usuario'] ?>"/>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-3">


                                                                        <div class="form-group">
                                                                            <label>Departamento</label>
                                                                            <input type="tex" class="form-control" placeholder="Departamento" disabled="" value="<?php echo $computadores[$i]['departamento'] ?>"/>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-3">


                                                                        <div class="form-group">
                                                                            <label>Tipo máquina</label>
                                                                            <br>
                                                                                <input type="text" class="form-control"  disabled="" value="<?php echo $computadores[$i]['tipo'] ?>">
                                                                                    </div>

                                                                                    </div>

                                                                                    <div class="col-md-3">
                                                                                        <form role="form">
                                                                                            <div class="form-group">
                                                                                                <label>Fabricante</label>
                                                                                                <input class="form-control"  disabled="" value="<?php echo $computadores[$i]['fabricante'] ?>"/>
                                                                                            </div>
                                                                                    </div>

                                                                                    </div>

                                                                                    </div>

                                                                                    <div class="panel-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Modelo</label>
                                                                                                    <input class="form-control"  disabled="" value="<?php echo $computadores[$i]['modelo'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Sistema Operacional</label>
                                                                                                    <input class="form-control"  disabled="" value="<?php echo $computadores[$i]['so'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Memória</label>
                                                                                                    <input class="form-control"  disabled="" value="<?php
                                                                                                    if ($computadores[$i]['memoria'] == 1)
                                                                                                        echo '1 GB';
                                                                                                    elseif ($computadores[$i]['memoria'] == 2)
                                                                                                        echo '2 GB';
                                                                                                    elseif ($computadores[$i]['memoria'] == 3)
                                                                                                        echo '3 GB';
                                                                                                    elseif ($computadores[$i]['memoria'] == 4)
                                                                                                        echo '4 GB';
                                                                                                    elseif ($computadores[$i]['memoria'] == 5)
                                                                                                        echo '5 GB';
                                                                                                    elseif ($computadores[$i]['memoria'] == 6)
                                                                                                        echo '6 GB';
                                                                                                    else
                                                                                                        echo '8 GB';
                                                                                                    ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Processador</label>
                                                                                                    <input class="form-control"  disabled="" value="<?php echo $computadores[$i]['processador'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="panel-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Meio de Armazenamento</label>
                                                                                                    <input class="form-control"  disabled="" value="<?php echo $computadores[$i]['meio_armazenamento'] == 1 ? 'SSD' : 'HD' ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>tamanho Armazenamento</label>
                                                                                                    <input class="form-control"  disabled="" value="<?php
                                                                                                    if ($computadores[$i]['tamanho_armazenamento'] == 1)
                                                                                                        echo '120 GB';
                                                                                                    elseif ($computadores[$i]['tamanho_armazenamento'] == 2)
                                                                                                        echo '240 GB';
                                                                                                    elseif ($computadores[$i]['tamanho_armazenamento'] == 3)
                                                                                                        echo '480 GB';
                                                                                                    elseif ($computadores[$i]['tamanho_armazenamento'] == 4)
                                                                                                        echo '500 GB';
                                                                                                    else
                                                                                                        echo '1 TB';
                                                                                                    ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Chave do Windows</label>
                                                                                                    <input class="form-control" placeholder="Chave do windows" disabled="" value="<?php echo $computadores[$i]['chave_windows'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Office instalado</label>
                                                                                                    <input class="form-control" placeholder="Office instalado" disabled="" value="<?php echo $computadores[$i]['versao'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="panel-body">
                                                                                        <div class="row">

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>IP da máquina</label>
                                                                                                    <input class="form-control" placeholder="Endereço IP da máquina" disabled="" value="<?php echo $computadores[$i]['ip'] ?>"/>

                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Host</label>
                                                                                                    <input class="form-control" placeholder="Nome da máquina" disabled="" value="<?php echo $computadores[$i]['host'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Service Tag</label>
                                                                                                    <input class="form-control" placeholder="Service tag" disabled="" value="<?php echo $computadores[$i]['service_tag'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Nota Fiscal</label>
                                                                                                    <input class="form-control" placeholder="Nota fiscal" disabled="" value="<?php echo $computadores[$i]['nota_fiscal'] ?>"/>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="panel-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>ID da máquina</label>
                                                                                                    <input autofocus="" type="text" class="form-control" placeholder="ID da máquina" disabled="" value="<?php echo $computadores[$i]['id_maquina'] ?>"/>
                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="col-md-3">


                                                                                                <div class="form-group">
                                                                                                    <label>Tag patrimonial</label>
                                                                                                    <input autofocus="" type="text" class="form-control" placeholder="Tag patrimonial" disabled="" value="<?php echo $computadores[$i]['tag_patrimonial'] ?>"/>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>



                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label>Observação</label>
                                                                                        <textarea class="form-control" rows="3" disabled=""><?php echo $computadores[$i]['observacao'] ?></textarea>
                                                                                    </div>


                                                                                    </form>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                                                                                    </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    </div>

                                                                                    <!-- Fim Modal -->

<?php } ?>
                                                                                </tbody>
                                                                                </table>
                                                                                </div>

                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>>    
                                                                                </body>
                                                                                </html>
