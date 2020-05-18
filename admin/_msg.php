<?php

function ExibirMsg($ret) {

    switch ($ret) {
        case -1:
            echo '<div class = "alert alert-danger">
                    Ocorreu um erro na operação. 
                 </div>';
            break;

        case -2:
            echo '<div class = "alert alert-danger">
                    Não foi possivel exluir o registro.
                 </div>';
            break;
        
         case -3:
            echo '<div class = "alert alert-danger">
                    Não foi encontrado nenhum usuário.
                 </div>';
            break;

        case 0:
            echo '<div class = "alert alert-warning">
                    Preencher o(s) campo(s) obrigatório(s).
                 </div>';

            break;

        case 1:
            echo '<div class = "alert alert-success">
                    Cadastrado com sucesso.
                 </div>';
            break;

        case 2:
            echo '<div class = "alert alert-danger">
                    Senha deve ter no mínimo 6 caracteres.
                 </div>';
        case 3:
            echo '<div class = "alert alert-danger">
                    Senhas não conferem.
                 </div>';
            break;


        case 4:
            echo '<div class = "alert alert-success">
                    Excluido com sucesso.
                 </div>';
            break;
        
        case 5:
            echo '<div class = "alert alert-danger">
                    Não é possível excluir contas ativas.
                 </div>';
            break;
        
         case 6:
            echo '<div class = "alert alert-danger">
                    Gravado com sucesso
                 </div>';
            break;
        
        case 7:
            echo '<div class = "alert alert-success">
                    Alterado com sucesso.
                 </div>';
            break;
        case 8:
            echo '<div class = "alert alert-success">
                    Excluido com sucesso.
                 </div>';
            break;
        
        
    }
}
