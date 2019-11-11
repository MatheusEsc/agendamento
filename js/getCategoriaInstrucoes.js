function exibir_categoria(){

    $("#instrucoes").html﻿('');

      document.querySelector("#erro_data").style.display = "none";

      var categoria = document.getElementById("categoria").value;

      document.getElementById("dataAg").value = "";

      document.querySelector("#horario").style.display = "none";

      document.querySelector("#agendamento").style.display = "none";

          $.ajax({
            data: {categoria : categoria},
            type:'post',  //Definimos o método HTTP usado
            dataType: 'json', //Definimos o tipo de retorno
            url: '../controller/getCategoriaInstrucoes.php', //Definindo o arquivo onde serão buscados os dados
            success: function(dados){

              document.querySelector("#agendamento").style.display = "block";

              for(var i=0;dados.length>i;i++){

                $("#instrucoes").append(dados[i].TA_TEXTO);

              }
              
            },

          });
  }