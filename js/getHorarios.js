function exibir_horarios(){

    $("#lista_horarios").html﻿('');

    document.querySelector("#erro_data").style.display = "none";

    document.querySelector("#lista_horarios").style.display = "none";

    document.querySelector("#horario").style.display = "none";

      var categoria = document.getElementById("categoria").value;
      var dataAg = document.getElementById("dataAg").value;

          $.ajax({
            data: {categoria : categoria, dataAg : dataAg},
            type:'post',  //Definimos o método HTTP usado
            dataType: 'json', //Definimos o tipo de retorno
            url: '../controller/getHorarios.php', //Definindo o arquivo onde serão buscados os dados
            error: function() {   

              document.querySelector("#erro_data").style.display = "block";

            },
            success: function(dados){

              document.querySelector("#lista_horarios").style.display = "block";

              document.querySelector("#horario").style.display = "block";

              for(var i=0;dados.length>i;i++){

                if(dados[i].QTD_HORA==dados[i].QTD_AG){

                  //Adicionando registros retornados
                  $('#lista_horarios').append('<button type="button" class="btn btn-outline-primary" style="padding-right: 25px; margin: 5px;" disabled>'+dados[i].HR_HORA+'</button>');


                } else {

                  var hora = "'"+dados[i].HR_HORA+"'";
                  
                  //Adicionando registros retornados 
                  $('#lista_horarios').append('<label class="btn btn-primary" style="margin: 5px;">'+dados[i].HR_HORA+'<input type="radio" name="horario" value="'+dados[i].HR_HORA+'" onclick="horario_selecionado('+hora+');"><span class="checkmark"></span></label>');
                
                }


              }
              
            },

      });
  }