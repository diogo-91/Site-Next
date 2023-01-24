<?php include 'includes/header_interna.php'; ?>




<div id="sobre">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<div class="titulo centerV scrollReveal" style="width: 400px; color: #84b825;">
				CONHEÇA NOSSAS<br>
				<b>SOLUÇÕES EM T.I</b>
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
						SOLUÇÕES BY I.T.
					</li>
				</ul>
				<div class="descricao scrollReveal">
					<img src="<?=BASE_SITE; ?>assets/img/byit-contato-logo.png">
					<span>
						ASSISTA NOSSA<br>
						APRESENTAÇÃO E CONHEÇA<br>
						<b>TODAS NOSSAS SOLUÇÕES</b>
					</span>
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



<section id="servicos">
	<div class="limitador">
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