<?php

    // Configurações
    date_default_timezone_set('America/Sao_Paulo');

    // Site
    define('NOME_SITE', 'By I.T.');
    define('BASE_SITE', 'https://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1));
    define('EMAIL_SITE', 'ariane.silva10@gmail.com'); //ariane.silva@byit.com.br //ariane.silva10@gmail.com
    define('BASE_CORE', './');

    // Banco de Dados
    define('DB_HOST_2', 'localhost');
    define('DB_USER_2', 'byitcomb_musca');
    // define("DB_PASS_2","bYitcomb@muscrewra");
    define('DB_PASS_2', 'bYitcomb@musca');
    define('DB_NAME_2', 'byitcomb_musca');

    // Quem fez o site?
    define('AUTOR_SITE', 'Anderson Silveira e Agência Musca.org');

    // Ativa todos os debugs de erros
    $erros = false;

    if ($erros) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
    } else {
        error_reporting(0);
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
    }
