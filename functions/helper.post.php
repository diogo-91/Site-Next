<?php
    ## Inicia Sessão ##
    session_start();

    ## OB ##
    ob_start();

    ## Configuracoes ##
    include("../config.php");
    
    ## Classes ##
    require_once("../class/Functions.class.php");
    require_once("../includes/database.inc.php");
    require_once("../class/Consultas.class.php");

    ## Objetos ##
    $f = new Functions(BASE_SITE);
    $c = new Consultas($db);

    ## Segurança ##
    $_GET = $f->_antiSqlInjection($_GET);
    $_POST = $f->_antiSqlInjection($_POST);


	if(isset($_POST['acao'])):
        switch($_POST['acao']):
    
            case 'getVideoServico':
                   
                $video = $_POST['video'];
                $iframe = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$video.'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                echo $iframe;

            break;

        endswitch;
	endif;
?>