// Testando a validação usando jQuery
$(function(){

    // ## EXEMPLO 2
    // Aciona a validação ao sair do input
    $('.cpf_cnpj').blur(function(){
    
        // O CPF ou CNPJ
        var input = $(this);
        var cpf_cnpj = $(this).val();

        input.removeClass('valido');
        input.removeClass('invalido');
        
        // Testa a validação
        if ( valida_cpf_cnpj( cpf_cnpj ) ) {
            input.addClass('valido');
            $("#spanValido").text("Documento válido!");
            $("#spanInvalido").text("");
            document.getElementById('cpf').style.border = '1px solid green';
        } else {
            input.addClass('invalido');
            $("#spanInvalido").text("Número de CPF inválido!");
            $("#spanValido").text("");
            document.getElementById('cpf').style.border = '1px solid red';
            document.getElementById('cpf').value = '';
        }
        
    });
    
});
