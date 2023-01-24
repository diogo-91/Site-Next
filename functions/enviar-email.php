<?php

    require_once 'class/sendgrid-php/sendgrid-php.php';

    if (!empty($_POST)):
        foreach ($_POST as $nome_campo => $valor):
            $comando = '$'.$nome_campo."='".$valor."';";
            eval($comando);
            $complemento .= '&'.$nome_campo.'='.$valor;
        endforeach;
    endif;

    $mensagemHTML = '<html>
    <body style="padding:0; margin:0; height:100%;" bgcolor="#353f47">
        <center><img src="'.$logotipo.'" border="0" style="margin-top:20px;"></center>
        <br>
        <table style="border:1px solid #272f56; background-color:#fff;-moz-border-radius:7px; -webkit-border-radius:7px; width:600px; border:1px solid #E2E0E0; margin-top:20px;" align="center">
            <tr>
                <td style="padding:20px;">
                    <table width="100%" style="font:12px Arial, Helvetica, sans-serif; border-collapse:collapse;">';
                        foreach ($_POST as $nome_campo => $valor):
                            if (!in_array($nome_campo, $mail_remove_campos)):
                                $comando = '$'.$nome_campo."='".$valor."';";
                                eval($comando);
                                $complemento .= '&'.$nome_campo.'='.$valor;
                                if ($valor != ''):
                                    $mensagemHTML .= '
                                        <tr>
                                            <td style="padding:3px; border-bottom:1px solid #c9d1d5; color:#1f4a7d;">'.ucwords(strtolower(str_replace('_', ' ', $nome_campo))).':</td>
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

    //$mail_email_to = 'contato@noot.com.br'; //, 'biianca.muniiz@gmail.com', 'contato@byit.com.br', 'wellington@gerar.me'];

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($mail_email, $_POST['nome']);
    $email->setSubject($mail_assunto);
    $email->addTo($mail_email_to, 'Email Byit');
    $email->addContent(
        'text/html', $mensagemHTML
    );
    $sendgrid = new \SendGrid('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');

    $urlAntiga = $f->getUrl();

    try {
        $response = $sendgrid->send($email);
        echo '<script type="text/javascript">alert("Seu email foi enviado com sucesso."); location.href="'.$urlAntiga.'"</script>';
    } catch (Exception $e) {
        echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="'.$urlAntiga.'"</script>';
    }
