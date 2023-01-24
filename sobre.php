<?php include 'includes/header_interna.php'; ?>

<?php
    $sobre = $c->getResult('sobre', "WHERE id = '1'");
?>

<div id="sobre">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<div class="titulo centerV scrollReveal">
				CONHEÇA A BY I.T.
			</div>
			<div class="descricao centerV scrollReveal">
			Somos especialistas em Soluções de Sustentação para Infraestrutura de TI, atuamos com serviços de Suporte Multivendor com cobertura nacional.
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
						CONHEÇA A BY I.T.
					</li>
				</ul>
				<div class="descricao scrollReveal">
					<img src="<?=BASE_SITE; ?>assets/img/byit-contato-logo.png">
					<span>
						CONHEÇA A<br>
						BY I.T. E TODAS<br>
						<b>NOSSAS SOLUÇÕES</b>
					</span>
				</div>
			</div>
			
		</div>
		<div class="lado2 _bc" style="background: url(<?=BASE_SITE; ?>assets/images/bg_contato.jpg) no-repeat center center;">
			<div class="limitador_meio_left scrollReveal">
				<div class="play _tr">
					<img src="<?=BASE_SITE; ?>assets/img/icon-play2.png" class="_tr">
				</div>
			</div>
		</div>
	</div>


	<section id="solucoes">
		<div class="limitador">
			<div class="limitador2">
				<div class="topo">
					<div class="lado1 scrollReveal">
						<b>BY I.T.</b><br>
						SOLUÇÕES<br>
						CORPORATIVAS<br>
						EM TECNOLOGIA<br>
						DA INFORMAÇÃO
					</div>
					<div class="lado2 scrollReveal">
						<span>
							Somos especialistas em Soluções de Sustentação para Infraestrutura de TI, atuamos com serviços multiplataforma e multimarca em todo território nacional.
						</span>
						<a href="#">
							<div class="btn btn-azul scrollReveal">FALE COM A BY I.T.</div>
						</a>
					</div>
				</div>
				<div class="baixo">
					<h2 class="scrollReveal">Uma história de sucesso e foco no core business</h2>
					<div class="descricao scrollReveal">
						<?=$sobre['historia']; ?>
					</div>	
					<div class="valores">
						<div class="cada scrollReveal">
							<div class="icone">
								<img src="<?=BASE_SITE; ?>assets/images/icon-sobre1.png" class="centerV">
							</div>
							<h3>MISSÃO</h3>
							<div class="texto">
								<?=$sobre['missao']; ?>
							</div>
						</div>
						<div class="cada scrollReveal">
							<div class="icone">
								<img src="<?=BASE_SITE; ?>assets/images/icon-sobre2.png" class="centerV">
							</div>
							<h3>VISÃO</h3>
							<div class="texto">
								<?=$sobre['visao']; ?>
							</div>
						</div>
						<div class="cada scrollReveal">
							<div class="icone">
								<img src="<?=BASE_SITE; ?>assets/images/icon-sobre3.png" class="centerV">
							</div>
							<h3>VALORES</h3>
							<div class="texto">
								<?=$sobre['valores']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php include 'includes/solucoes_e_suporte.php'; ?>


</div>


<?php include 'includes/footer.php'; ?>