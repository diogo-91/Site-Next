<?php

    //# Inicia Sessão ##
    session_start();

    //# OB ##
    ob_start();

    //# Configuracoes ##
    include dirname(__FILE__).'/config.php';

    //# Classes ##
    require_once 'class/Functions.class.php';
    require_once 'includes/database.inc.php';
    require_once 'class/Consultas.class.php';

    //# Objetos ##
    $f = new Functions(BASE_SITE);
    $c = new Consultas($db);

    //# Segurança ##
    $_GET = $f->_antiSqlInjection($_GET);
    $_POST = $f->_antiSqlInjection($_POST);

    //# URL Amigável ##
    if (isset($_GET['url'])):
        $get2 = $_GET['url'];
        $get = explode('/', $get2);
    endif;

    //# Gera todos os $_GET de uma url absoluta ##
    @$f->gets($f->getUrl());
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <base href="<?=BASE_SITE; ?>" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    
    <title><?= $TITLE.NOME_SITE; ?></title>

    <?php include 'includes/seo.inc.php'; ?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TCCLH5X');</script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/hover-min.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/_reset.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/main.css?v.1.0.4">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/fonts.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/lightbox.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/css/whats-css.css">

    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/owl-carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=BASE_SITE; ?>assets/owl-carousel2/assets/owl.theme.default.min.css">

    <!-- xzoom plugin here -->
    <script type="text/javascript" src="<?=BASE_SITE;?>assets/js/xzoom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=BASE_SITE;?>assets/css/xzoom.min.css" media="all" /> 

    <script src="<?=BASE_SITE; ?>assets/js/scrollReveal.js"></script>
    <!-- <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script> --> <!-- LIGHTBOX PAGSEGURO -->
    <script src="<?=BASE_SITE; ?>assets/js/lightbox.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-B9BoFFAuBaCfqw6lxWBZrhg/z4NkwqdBci+E+Sc2XlK/Rz25RYn8Fetb+Aw5irxa" crossorigin="anonymous"> <!-- FONT AWESOME ICONS -->

    <script src="<?=BASE_SITE; ?>assets/js/jquery-1.11.0.min.js"></script>

   

    <script src="<?=BASE_SITE; ?>assets/owl-carousel2/owl.carousel.js"></script>

    <link rel="icon" type="image/png" href="<?=BASE_SITE; ?>assets/img/favicon/16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?=BASE_SITE; ?>assets/img/favicon/32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?=BASE_SITE; ?>assets/img/favicon/48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="<?=BASE_SITE; ?>assets/img/favicon/64.png" sizes="64x64">
    <link rel="icon" type="image/png" href="<?=BASE_SITE; ?>assets/img/favicon/128.png" sizes="128x128">

</head>
<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCCLH5X"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <!-- ############################ -->
    <!-- ## INÍCIO MENU RESPONSIVO ## -->
    <!-- ############################ -->
    <div id="hamburguer" class="hamburguer _tr">
        <span class="line _tr"></span>
        <span class="line _tr"></span>
        <span class="line _tr"></span>
    </div>
    <div class="overlay-mobile"></div>
    <div class="menu-responsive _tr">
        <ul>
            <li>
                <a href="<?=BASE_SITE; ?>sobre">CONHEÇA A BYIT</a>
            </li>
            <li>
                <a href="<?=BASE_SITE; ?>produtos">PRODUTOS</a>
            </li>
            <li>
                <a href="<?=BASE_SITE; ?>servicos">SOLUÇÕES</a>
            </li>
            <li>
                <a href="<?=BASE_SITE; ?>noticias">BLOG</a>
            </li>
            <li>
                <a href="<?=BASE_SITE; ?>contato">CONTATO</a>
            </li>
            <li>
                <a href="#">
                    <div class="btn btn-azul scrollReveal">PORTAL DO CLIENTE <i class="fa fa-caret-down"></i></div>
                </a>
            </li>
            <li>
                <a class="abrirModalOrcamento">
                    <div class="btn btn-laranja scrollReveal">SOLICITE UM ORÇAMENTO</div>
                </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <script>
        $(document).ready(function(){
            $(".hamburguer").on("click",function(){
                if($(this).hasClass('hamburguerAtivo')){
                    $(this).removeClass("hamburguerAtivo");
                    $(".menu-responsive").css("right","100%");
                    $(".overlay-mobile").fadeOut("fast");
                }else{
                    $(this).addClass("hamburguerAtivo");
                    $(".menu-responsive").css("right","75px");
                    $(".overlay-mobile").fadeIn("fast");
                }
            });
            $(".overlay-mobile").on("click",function(){
                $(".hamburguer").removeClass("hamburguerAtivo");
                $(".menu-responsive").css("right","100%");
                $(".overlay-mobile").fadeOut("fast");
            });
            $(".menu-responsive a").on("click",function(){
                $(".hamburguer").removeClass("hamburguerAtivo");
                $(".menu-responsive").css("right","100%");
                $(".overlay-mobile").fadeOut("fast");
            });
        });
    </script>
    <!-- ######################### -->
    <!-- ## FIM MENU RESPONSIVO ## -->
    <!-- ######################### -->




    <div class="overlay-orcamento"></div>
    <div class="modal-orcamento centerAll">
        <div class="fechar"><i class="fa fa-times"></i></div>
        <div class="conteudo">
            <div class="orcamento _bc" style="background: url(<?=BASE_SITE; ?>assets/images/bg_form.jpg) no-repeat center center;">
                <form name="orcamento" method="POST" action="">
                    <div class="lado1">
                        <h3 class="">
                            <b>SOLICITE UM</b>
                            ORÇAMENTO
                        </h3>
                    </div>
                    <div class="lado2">
                        <div class="form-group">
                            <label>NOME</label>
                            <input type="text" name="nome" placeholder="DIGITE SEU NOME" required>
                        </div>
                        <div class="form-group">
                            <label>TELEFONE</label>
                            <input type="tel" name="telefone" placeholder="PODE SER O CELULAR OU WHATSAPP" required>
                        </div>
                        <div class="form-group">
                            <label>OBSERVAÇÃO</label>
                            <textarea name="observacao" placeholder="TEM ALGUMA OBSERVAÇÃO?" required></textarea>
                        </div>
                    </div>
                    <div class="lado3">
                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" name="email" placeholder="DIGITE SEU EMAIL" required>
                        </div>
                        <div class="form-group">
                            <label>EMPRESA</label>
                            <input type="text" name="empresa" placeholder="QUAL O NOME DA SUA EMPRESA?" required>
                        </div>
                        <div class="form-group">
                            <div class="form-title">COMO GOSTARIA DE RECEBER NOSSO RETORNO?</div>
                            <label class="checkbox">
                                <input type="checkbox" name="retorno" value="Ligação">
                                <span>Ligação</span>
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="retorno" value="Email">
                                <span>Email</span>
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="retorno" value="Whatsapp">
                                <span>Whatsapp</span>
                            </label>
                        </div>
                        <?php if ($get[0] == 'produto'): ?>
                            <?php
                                $id_produto = $get[1];
                                $produto = $c->getResult('produtos', "WHERE id = '$id_produto'");
                            ?>
                            <input type="hidden" name="produto" value="<b>ID:</b> <?=$produto['id']; ?><br><b>NOME:</b> <?=$produto['nome1']; ?> <?=$produto['nome2']; ?>">
                        <?php endif; ?>
                        <button type="submit" name="orcamento" class="btn btn-azul">SOLICITAR ORÇAMENTO</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(".modal-orcamento input, .modal-orcamento select, .modal-orcamento textarea").on("click",function(){
            var campo = $(this).attr("name");
            dataLayer.push({
                'event': 'event',
                'eventCategory': 'by-it:site',
                'eventAction': 'click',
                'eventLabel': 'orcamento-flutuante[['+campo+']]'
            });
        });
    </script>



	<?php

        if (isset($_POST['newsletter'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $data = date('Y-m-d');
            $ip = $f->getIp();
            $insert = $db->prepare("INSERT INTO newsletter SET nome='$nome',email='$email',data='$data',ip='$ip'");
            $insert->execute(); ?>
            <script>
                dataLayer.push({
                    'event': 'event',
                    'eventCategory': 'by-it:site',
                    'eventAction': 'sucesso',
                    'eventLabel': 'assine-email-mkt'
                });
            </script>
            <?php
            echo '<script>alert("E-mail cadastrado com sucesso!");</script>';
            echo '<script>window.location="'.BASE_SITE.'"</script>';
        }

        //# E-mail Orçamento ##
        if (isset($_POST['orcamento'])):
            $mail_nome = $_POST['nome'];
            $mail_email = $_POST['email'];
            $mail_assunto = '[Orçamento via Site]';
            $mail_nome_to = NOME_SITE;
            $mail_email_to = EMAIL_SITE;
            $mail_remove_campos = ['orcamento'];
            $logotipo = BASE_SITE.'assets/images/logo.png';
            include 'functions/enviar-email.php';

            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $observacao = $_POST['observacao'];
            $email = $_POST['email'];
            $empresa = $_POST['empresa'];
            $retorno = $_POST['retorno'];
            $produto = (isset($_POST['produto']) ? $_POST['produto'] : '');

            ?>
                <script>
                    dataLayer.push({
                        'event': 'event',
                        'eventCategory': 'by-it:site',
                        'eventAction': 'sucesso',
                        'eventLabel': 'orcamento:envio-contato'
                    });
                </script>
            <?php

            $insert = $db->prepare("
                INSERT INTO emails_orcamentos SET
                    nome='$nome',
                    telefone='$telefone',
                    observacao='$observacao',
                    email='$email',
                    empresa='$empresa',
                    retorno='$retorno',
                    produto='$produto'
            ");
            $insert->execute();

        endif;

        //# E-mail Contato ##
        if (isset($_POST['contato'])):
            $mail_nome = $_POST['nome'];
            $mail_email = $_POST['email'];
            $mail_assunto = '[Contato via Site]';
            $mail_nome_to = NOME_SITE;
            $mail_email_to = EMAIL_SITE;
            $mail_remove_campos = ['contato'];
            $logotipo = BASE_SITE.'assets/images/logo.png';
            ?>
                <script>
                    dataLayer.push({
                        'event': 'event',
                        'eventCategory': 'by-it:site',
                        'eventAction': 'sucesso',
                        'eventLabel': 'envio-contato'
                    });
                </script>
            <?php
            include 'functions/enviar-email.php';
        endif;

        //# Páginas ##
        if (isset($get[0])) {
            switch ($get[0]):
                default:
                    $arquivo = 'pages/'.$get[0].'.php';
            if (file_exists($arquivo)):
                        include $arquivo; else:
                        if (file_exists('includes/404.php')):
                            include 'includes/404.php'; else:
                            echo '<h1>Página não encontrada.</h1><h2>Erro 404</h2>';
            endif;
            endif;
            break;
            endswitch;
        } else {
            include 'pages/home.php';
        }
    ?>



    <!-- Scripts -->
    <script type="text/javascript">var BASE_SITE = "<?=BASE_SITE; ?>";</script>
    <!-- <script src="<?=BASE_SITE; ?>assets/js/wow.min.js"></script> -->
    <script src="<?=BASE_SITE; ?>assets/js/main.js"></script>
    <script src="<?=BASE_SITE; ?>assets/js/setup.js"></script>
</body>
</html>
<?php
    ob_end_flush();
?>