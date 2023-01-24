<?php include 'includes/header_interna.php'; ?>

<style>

@media only screen and (max-width: 1200px) {
	#sobre .sec_video .lado2 {
		display: none;
	}
}

</style>


<div id="sobre">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<div class="titulo centerV scrollReveal" style="width: 400px; color: #84b825;">
				PORTAL<br>
				<b>DO CLIENTE</b>
			</div>
			<div class="descricao centerV scrollReveal">
			Contamos com uma plataforma 100% on-line que em tempo real você pode gerenciar os chamados da sua empresa de maneira fácil e rápida.
			</div>
			<a href="<?=BASE_SITE; ?>contato">
				<div class="btn btn-verde centerV scrollReveal">FALE CONOSCO</div>
			</a>
		</div>
	</div>

	<div class="sec_video">
		<div class="lado1">
			<div class="limitador_meio_right">
				<ul class="breadcumb scrollReveal">
					<li>
						<a href="<?=BASE_SITE; ?>">HOME</a>
					</li>
					<li>/</li>
					<li>
						PORTAL DO CLIENTE
					</li>
				</ul>
				<div id="portalcliente">


					<div class="formulario">
					<div class="lado1 scrollReveal">

					<div class="titulo centerV scrollReveal" style="color: #84b825; margin-top:30px; margin-bottom:20px">
				<b>DIGITE SEU LOGIN E SENHA</b>
			</div>

			<form action="https://byit.movidesk.com/Account/Authenticate" target="_blank" method="post">
				<input type="hidden" name="Token" value="265f994b-197d-450c-906c-f8303565160b">
				<div class="group group2">
				<label>Login</label>
				<input type="string" name="UserName" placeholder="Login" style="margin-bottom:20px; width: 100%; float: left; clear: both; background: #FFF; border-radius: 12px; font-size: 14px; color: #333; padding: 10px 15px; border: 2px solid transparent; outline: none; font-family: 'Antenna'; font-weight: 300;">
			</div>
			
			<div class="group group2">
			<label>Senha</label>
				<input type="string" name="Password" placeholder="Senha" style="margin-bottom:20px; width: 100%; float: left; clear: both; background: #FFF; border-radius: 12px; font-size: 14px; color: #333; padding: 10px 15px; border: 2px solid transparent; outline: none; font-family: 'Antenna'; font-weight: 300;">
			</div>	<button type="submit" id="btn" class="btn btn-verde">Entrar</button><br><br>
				</form>

				</div>
				</div>

				</div>
			</div>
			
		</div>
		<div class="lado2 _bc" style="background: url(<?=BASE_SITE; ?>assets/images/servico.jpg) no-repeat center center;">
			<div class="limitador_meio_left scrollReveal">
				<div class="play _tr">
					<img src="<?=BASE_SITE; ?>assets/images/icon-play2.png" class="_tr">
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
    $("#sobre input, #sobre select, #sobre textarea").on("click",function(){
        var campo = $(this).attr("name");
        dataLayer.push({
            'event': 'event',
            'eventCategory': 'by-it:site',
            'eventAction': 'click',
            'eventLabel': 'orcamento[['+campo+']]'
        });
    });
</script>



<section id="servicos">



	<div class="limitador">

	<div class="titulo centerV scrollReveal" style="color: #84b825; margin-top:30px">
				<b style="margin-left: 20px;">CONHEÇA NOSSAS SOLUÇÕES</b>
			</div>


		<div class="baixo">
			<div class="todos">
				<?php $servicos = $c->getResults('servicos', 'ORDER BY posicao ASC'); ?>
				<?php foreach ($servicos as $servico): ?>
					<a href="<?=BASE_SITE; ?>servico/<?=$servico['slug']; ?>">
						<div class="cada scrollReveal">
							<div class="ladoImagem">
								<div class="imagem">
									<img src="<?=BASE_SITE; ?>assets/images/<?=$servico['icone']; ?>" class="centerAll">
								</div>
							</div>
							<div class="ladoTextos">
								<div class="titulo">
									<?=$servico['titulo']; ?>
								</div>
								<div class="texto">
									<?=$servico['resumo']; ?>
								</div>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>


<?php include 'includes/contato.php'; ?>



<?php include 'includes/footer.php'; ?>