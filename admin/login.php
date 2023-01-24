<?php
    require 'editar/configuracoes.inc.php';

    $tema="preto"; // "branco" ou "preto"


    if($tema=="preto"){
    	$css="css/main.css";
    }elseif($tema=="branco"){
    	$css="css/main2.css";
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Painel de controle - Musca.org</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="<?=$css;?>">
</head>
<body class="login">
	<div class="form">
		<form method="post" action="valida.php">
			<?php
			if(file_exists($logotipo)){
				echo '
					<a href="<?php echo $url_painel; ?>">
						<img src="'.$logotipo.'" alt="" style="max-width:320px; max-height:100px; margin:10px auto; display:block;" />
					</a>
				';
			}else{
				?>
				<h4><?=NOME_SITE;?></h4>
				<h5>Painel de controle</h5>
				<?php
			}
			?>
			
			<input type="text" name="usuario" maxlength="50" placeholder="Digite seu Login"/>
			<input type="password" name="senha" maxlength="50" placeholder="Digite sua Senha"/>
			<input type="submit" value="Entrar" />
		</form>

		<div class="copy">
			Desenvolvido por <a href="http://musca.org" target="_blank">Musca.org</a>
		</div>
	</div>

	
	
</body>
</html>