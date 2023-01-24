<?php include 'includes/header.php'; ?>

<section id="banners">
	<?php $banners = $c->getResults('home_banners', 'ORDER BY id DESC'); ?>

	<div class="banners owl-carousel owl-theme show-desktop hide-phone">
		<?php foreach ($banners as $banner): ?>
			<div class="cada _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$banner['imagem']; ?>) no-repeat top center;">
				<div class="limitador">
					<div class="box centerV">
						<h1 style="color:<?=$banner['titulo_cor']; ?>"><?=$banner['titulo']; ?></h1>
						<!-- <h2></h2> -->
						<h3 style="color:<?=$banner['texto_cor']; ?>"><?=$banner['texto']; ?></h3>
						<?php if ($banner['btn_link'] != ''): ?>
							<a href="<?=$banner['btn_link']; ?>" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="carrossel-home:[[<?=$banner['titulo']; ?>]]">
								<div class="btn btn-banner" style="background:<?=$banner['btn_cor']; ?>;"><?=$banner['btn_texto']; ?></div>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="banners owl-carousel owl-theme hide-desktop show-phone">
		<?php foreach ($banners as $banner): ?>
			<div class="cada _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$banner['imagem_mobile']; ?>) no-repeat top center;">
				<div class="limitador">
					<div class="box centerV">
						<h1 style="color:<?=$banner['titulo_cor']; ?>"><?=$banner['titulo']; ?></h1>
						<!-- <h2></h2> -->
						<h3 style="color:<?=$banner['texto_cor']; ?>"><?=$banner['texto']; ?></h3>
						<?php if ($banner['btn_link'] != ''): ?>
							<a href="<?=$banner['btn_link']; ?>" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="carrossel-home:[[<?=$banner['titulo']; ?>]]">
								<div class="btn btn-banner" style="background:<?=$banner['btn_cor']; ?>;"><?=$banner['btn_texto']; ?></div>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<span class="scroll"></span>
</section>

<section id="solucoes">
	<div class="limitador">
		<div class="limitador2">
			<div class="topo">
				<div class="lado1 scrollReveal">
					<strong style="display:block;padding:50px 0 5px;"><b>Reinvente</b> o ambiente de TI da sua empresa</strong>
					<span style="font-size:18px;font-weight:400;line-height: 30px;display: block;">Conte com a gestão avançada de serviços de Sustentação para Infraestrutura do seu Data Center</span>
				</div>
				<div class="lado2 scrollReveal">
					<span>
					Investir na terceirização de serviços de tecnologia e informação, reduz custos operacionais, torna o negócio mais estável e tem como resultado entregas de excelência.<br><br>
					Atuamos com serviços multiplataforma e multimarca em todo território nacional.<br><br>
					</span>
					<a href="<?=BASE_SITE; ?>sobre">
						<div class="btn btn-azul scrollReveal">CONHEÇA A BY I.T.</div>
					</a>
				</div>
			</div>
			<div class="baixo">
				<h1 class="scrollReveal">CLIQUE E CONHEÇA NOSSAS <b>SOLUÇÕES</b></h1>
				<div class="todos">
					<?php $servicos = $c->getResults('servicos', 'ORDER BY posicao ASC'); ?>
					<?php foreach ($servicos as $servico): ?>
						<a href="<?=BASE_SITE; ?>servico/<?=$servico['slug']; ?>" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="solucoes:[[<?=$servico['slug']; ?>]]">
							<div class="cada scrollReveal">
								<div class="imagem">
									<img src="<?=BASE_SITE; ?>assets/images/<?=$servico['icone']; ?>" class="centerAll">
								</div>
								<div class="titulo">
									<?=$servico['titulo']; ?>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php include 'includes/solucoes_e_suporte.php'; ?>



<!-- <section id="produtos_home">
	<div class="limitador">
		<div class="topo">
			<div class="lado1 scrollReveal">
				TAMBÉM TEMOS<br>
				O EQUIPAMENTO<br>
				QUE VOCÊ PRECISA
			</div>
			<div class="lado2 scrollReveal">
				<span>
					Solicite um orçamento sem compromisso para compra de nossos produtos de TI. Temos o hardware que você precisa para melhorar a performance da sua empresa.
				</span>
				<a href="<?=BASE_SITE; ?>produtos">
					<div class="btn btn-azul scrollReveal">CONSULTE NOSSO ESTOQUE</div>
				</a>
			</div>
		</div>
		<div class="baixo">
			<h1 class="scrollReveal">OFERTAS EXCLUSIVAS <b>BYIT</b></h1>
			<div class="wrap_produtos">
				<?php $produtos = $c->getResults('produtos', 'ORDER BY rand() LIMIT 4'); ?>
				<?php foreach ($produtos as $produto): ?>
					<a href="<?=BASE_SITE; ?>produto/<?=$produto['id']; ?>">
						<div class="cada scrollReveal">
							<div class="imagem">
								<img src="<?=BASE_SITE; ?>assets/images/<?=$produto['imagem1']; ?>" class="centerAll">
							</div>
							<div class="titulo"><?=$produto['nome1']; ?></div>
							<div class="subtitulo"><?=$produto['nome2']; ?></div>
							<div class="descricao">
								<?=$f->limitaTexto($produto['descricao'], 60); ?>
							</div>
							<a href="<?=BASE_SITE; ?>produto/<?=$produto['id']; ?>">
								<div class="btn btn-verde">SOLICITAR ORÇAMENTO</div>
							</a>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section> -->


<section id="novidades">
	<div class="limitador">
		<h1 class="scrollReveal">NOVIDADES <b>E TENDÊNCIAS</b></h1>
		<div class="todos">
			<?php $noticias = $c->getResults('noticias', 'ORDER BY id DESC LIMIT 3'); ?>
			<?php foreach ($noticias as $noticia): ?>
				<a href="<?=BASE_SITE; ?>noticia/<?=$noticia['id']; ?>">
					<div class="cada scrollReveal">
						<div class="imagem _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['imagem']; ?>) no-repeat center center;"></div>
						<div class="titulo"><?=$noticia['titulo']; ?></div>
						<div class="descricao">
							<?=$f->limitaTexto(strip_tags($noticia['texto']), 150); ?>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
			<div style="clear:both"></div>
		<a href="<?=BASE_SITE; ?>noticias">
			<div class="btn btn-verde centerR scrollReveal">VEJA TODAS NOSSAS POSTAGENS</div>
		</a>
	</div>
</section>


<?php include 'includes/footer.php'; ?>