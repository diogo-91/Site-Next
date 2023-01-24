<?php 

    if(!empty($_POST)):
        foreach($_POST as $nome_campo => $valor):
            $comando = "\$".$nome_campo."='".$valor."';";
            eval($comando);
            $complemento .= "&".$nome_campo."=".$valor;
        endforeach;
    endif;


    /* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
    if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
            $emailsender = EMAIL_SITE;
    } else {
            $emailsender = "contato@" . $_SERVER[HTTP_HOST];
            //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
            // você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
    }
     
    /* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
    if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
    elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
    else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
     
    // Passando os dados obtidos pelo formulário para as variáveis abaixo
    // $nomeremetente     = $_POST['nomeremetente'];
    // $emailremetente    = trim($_POST['emailremetente']);
    // $emaildestinatario = trim($_POST['emaildestinatario']);
    // $comcopia          = trim($_POST['comcopia']);
    // $comcopiaoculta    = trim($_POST['comcopiaoculta']);
    // $assunto           = $_POST['assunto'];

    $mensagemHTML = '
    <html>
    <body style="padding:0; margin:0; height:100%;" bgcolor="#353f47">
        <center><img src="'.BASE_SITE.'assets/images/css/logo.png" border="0" style="margin-top:20px;"></center>
        <table style="border:1px solid #272f56; background-color:#fff;-moz-border-radius:7px; -webkit-border-radius:7px; width:600px; border:1px solid #E2E0E0; margin-top:20px;" align="center">
            <tr>
                <td style="padding:20px;">
                    <table width="100%" style="font:12px Arial, Helvetica, sans-serif; border-collapse:collapse;">';
                        foreach($_POST as $nome_campo => $valor):
                            if(!in_array($nome_campo,$mail_remove_campos)):
                                $comando = "\$".$nome_campo."='".$valor."';";
                                eval($comando);
                                $complemento .= "&".$nome_campo."=".$valor;
                                if($valor <> ''):
                                    $mensagemHTML .= '
                                        <tr>
                                            <td style="padding:3px; border-bottom:1px solid #c9d1d5; color:#1f4a7d;">'.ucwords(strtolower(str_replace("_"," ",$nome_campo))).':</td>
                                            <td style="padding:3px; border-bottom:1px solid #c9d1d5; color:#666666;">'.$valor.'</td>
                                        </tr>
                                    ';
                                endif;
                            endif;
                        endforeach;
    $mensagemHTML .= '
                    </table>
                </td>
            </tr>
            <tr>
                <td style="font:10px Arial, Helvetica, sans-serif; text-align:center; padding:10px; color:#697a84;">E-mail enviado às '.date('H:i:s (d/m/Y)').'</td>
            </tr>
        </table>
    </body>
    </html>';
     
     
    /* Montando o cabeçalho da mensagem */
    $headers = "MIME-Version: 1.1".$quebra_linha;
    $headers .= "Content-type: text/html; charset=utf-8".$quebra_linha;
    // Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
    $headers .= "From: ".$emailsender.$quebra_linha;
    $headers .= "Return-Path: " . $emailsender . $quebra_linha;
    // Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
    // Se não houver um valor, o item não deverá ser especificado.
    // $headers .= "Cc: pablo@tooc.ag".$quebra_linha;
    $headers .= "Reply-To: ".$emailremetente.$quebra_linha;
    // Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
     
    /* Enviando a mensagem */
    $mail = mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);

    if($mail){
        echo '<script type="text/javascript">alert("Seu e-mail foi enviado com sucesso."); location.href="'.BASE_SITE.'"</script>';
    }else{
        echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="'.BASE_SITE.'"</script>';
    }
?>