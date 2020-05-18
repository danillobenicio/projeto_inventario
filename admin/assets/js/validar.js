function ValidarTela(numero_tela) {
    
    var ret = true;
    
    switch (numero_tela) {
        
        case 1: // Tela de cadastro inventário geral.
            if($("#valida_usuario").val().trim() == "") {
                $("#val_usuario").show().html("Informe o nome do(a) usuário(a).")
                ret = false;
            } else {
                $("#val_usuario").hide();
            }
            break;
    }
    
    
}
