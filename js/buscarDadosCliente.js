var formulario = document.querySelector("#consultar_cancelar");
  
  var botao = document.querySelector("#buscar");
  botao.addEventListener("click", function(event){
    event.preventDefault();

    document.getElementById('dadosAgendamento').style.display = 'none';
    document.getElementById('cancelado').style.display = 'none';
    document.getElementById('info').style.display = 'none';

    var cpf = formulario.cpf.value;
    // var dataNasc = formulario.dataNascimento.value;
    // var dataAg = formulario.dataAgendada.value;

    $('#protocolo').html('');
    $('#atendimento').html('');
    $('#nome').html('');
    $('#dataNasc').html('');
    $('#mae').html('');
    $('#pai').html('');
    $('#dataAg').html('');
    $('#horario').html('');

    $.ajax({
      url : '../controller/getDadosCliente.php',
      data: {cpf : cpf},
      type : 'post',
      dataType : 'json',
      error: function() {

      	document.getElementById('info').style.display = 'block';
        
      },
      success : function(dados){

        for(var i=0;dados.length>i;i++){

          if(dados[i].AG_STATUS=='CANCELADO'){

            document.getElementById('cancelado').style.display = 'block';

          } else {

            document.getElementById('dadosAgendamento').style.display = 'block';

            document.getElementById('id').value = dados[i].AG_ID;
            $('#protocolo').append(dados[i].AG_ID);
            $('#atendimento').append(dados[i].AG_CATEGORIA);
            $('#nome').append(dados[i].AG_CLIENTE);
            $('#dataNasc').append(dados[i].AG_DATA_NASC);
            $('#mae').append(dados[i].AG_MAE);
            $('#pai').append(dados[i].AG_PAI);
            $('#dataAg').append(dados[i].AG_DATA_AGENDADA);
            $('#horario').append(dados[i].AG_HORARIO);

          }

        }

      },
    });

  })