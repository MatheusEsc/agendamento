<?php

function enviarEmail($email,$protocolo,$nome,$categoria,$dataAg,$horario){

    include('../model/conexao.php');

    $resultado = mysqli_query($connect, "SELECT * FROM tipo_atendimento WHERE TA_NOME = '$categoria'");

    $info = mysqli_fetch_assoc($resultado);

    $to = $email;

    $subject = 'Agendamento de Atendimento';

    $headers = "From: Agendamento <email@email.com.br>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    $message = '
    <html xmlns="https://www.mailee.me/pt">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <style>

             @import url(https://fonts.googleapis.com/css?family=Roboto:300); /*Calling our web font*/

            /* Some resets and issue fixes */
            #outlook a { padding:0; }
            body{ width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; }     
            .ReadMsgBody { width: 100%; }
            .ExternalClass {width:100%;} 
            .backgroundTable {margin:0 auto; padding:0; width:100%;!important;} 
            table td {border-collapse: collapse;}
            .ExternalClass * {line-height: 115%;}                        
                                            
            }
                
            
        </style>
        
       

    <style type="text/css">

    </style>

    <style type="text/css">

    </style>
    </head>


    <div style="background:#ffffff;">

    </div><body style="padding:0; margin:0" bgcolor="#ffffff">

    <table border="0" cellpadding="0" cellspacing="0" style="margin: 0; padding: 0" width="100%">
        <tr>
            <td align="center" valign="top">
            
                <table width="640" border="0" cellspacing="0" cellpadding="0" class="hide">
                    <tr>
                        <td height="20"></td>
                    </tr>
                </table>
                
                <table width="640" cellspacing="0" cellpadding="0" bgcolor="#" class="100p">
                    <tr>
                        <td bgcolor="#3b464e" width="640" valign="top" class="100p">
                            
                                    <div>
                                        <table width="640" border="0" cellspacing="0" cellpadding="20" class="100p">
                                            <tr>
                                                <td valign="top">
                                                    <table border="0" cellspacing="0" cellpadding="0" width="600" class="100p">
                                                        
                                                    </table>
                                                    <table border="0" cellspacing="0" cellpadding="0" width="600" class="100p">
                                                        <tr>
                                                            <td height="35"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="color:#FFFFFF; font-size:24px;">
                                                                <font face="Roboto, Arial, sans-serif">
                                                                    
                                                                    <span style="font-size:30px; margin-top: -20px; font-weight: bold; margin-right: 20px;">Agendamento de Atendimento</span>
                                                                    <img src="http://clsystems.com.br/agendamento/view/img/logo.png" width="90" height="90" style="margin-bottom: -30px;" /> 

                                                                </font>
                                                                    
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="35"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                        </td>
                    </tr>
                </table>
                <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#2a8e9d" class="100p">
                    <tr>
                        <td align="center" style="font-size:24px; color:#FFFFFF;"><font face="Roboto, Arial, sans-serif">Seus dados</font></td>
                    </tr>
                </table>
                <table width="640" border="0" cellspacing="0" cellpadding="0" bgcolor="#b2d6db" class="100p" height="1">
                    <tr>
                        <td width="20" bgcolor="#FFFFFF"></td>
                        <td align="center" height="1" style="line-height:0px; font-size:1px;">&nbsp;</td>
                        <td width="20" bgcolor="#ffffff"></td>
                    </tr>
                </table>
                <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#ffffff" class="100p">
                    <tr>
                        <td style="font-size:16px; color:#848484;">
                            <font face="Roboto, Arial, sans-serif">
                                <span style="color:#000000; font-size:20px;">
                                    <strong>Protocolo:</strong>
                                    <strong>'.$protocolo.'</strong>
                                </span><br />
                                <span style="color:#000000; font-size:20px;">
                                    <strong>Nome:</strong>
                                    <label>'.utf8_encode($nome).'</label>
                                </span><br />
                                <span style="color:#000000; font-size:20px;">
                                    <strong>Categoria:</strong>
                                    <label>'.utf8_encode($categoria).'</label>
                                </span><br />
                                <span style="color:#000000; font-size:20px;">
                                    <strong>Data Agendada:</strong>
                                    <label>'.date("d/m/Y", strtotime($dataAg)).'</label>
                                </span><br />
                                <span style="color:#000000; font-size:20px;">
                                    <strong>Horário Agendado:</strong>
                                    <label>'.$horario.'</label>
                                </span><br />
                                <br />
                                <span style="color: red; font-size:15px; font-weight: bold; font-style: italic;">
                                    <p>Atenção: Chegar com 10 minutos de antecedência.</p>
                                </span>
                            </font>
                        </td>
                    </tr>
                </table>
                <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#2a8e9d" class="100p">
                    <tr>
                        <td align="center" style="font-size:24px; color:#FFFFFF;"><font face="Roboto, Arial, sans-serif">Instruções</font></td>
                    </tr>
                </table>
                <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#ffffff" class="100p">
                    <tr>
                        <td style="font-size:16px; color:#848484;">
                            <font face="Roboto, Arial, sans-serif">
                                <span style="color:#000000; font-size:15px;">

                                    <p>'.utf8_encode($info["TA_TEXTO"]).'</p>

                                </span>
                            </font>
                        </td>
                    </tr>
                </table>
                <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#2a8e9d" class="100p">
                    <tr>
                        <td align="center" style="font-size:16px; color:#ffffff;">
                            <font face="Roboto, Arial, sans-serif">&copy; Cartão Legal</font>
                        </td>
                    </tr>
                </table>            
                <table width="640" class="100p" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="50">
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
        
    </body>
    </html>';


    mail($to, $subject, $message, $headers);

}


?>