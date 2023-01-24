<?php include 'includes/header_interna.php'; ?>





<style type="text/css">
	
	#solucoes{padding: 50px 0px 0px 0px;}
	#solucoes .topo{margin-bottom: 0px;}

	#novidades .todos .cada{width: 31%; margin-bottom: 50px;}

	@media only screen and (max-width: 1200px) {
		#solucoes{padding: 50px 20px 0px 20px;}
		#solucoes ul.breadcumb{margin-top: 90px;}
	}


</style>




<div id="sobre">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<div class="box centerR">
				<span>BLOG</span>
				<img src="<?=BASE_SITE; ?>assets/images/logo.png" class="centerR">
			</div>
		</div>
	</div>

	<section id="solucoes" style="margin-top: -130px;">
		<div class="limitador">
			<ul class="breadcumb">
				<li>
					<a href="<?=BASE_SITE; ?>">HOME</a>
				</li>
				<li>/</li>
				<li>BLOG</li>
			</ul>
			<div class="topo">
				<div class="lado1 scrollReveal">
					<b>BEM VINDO AO BLOG</b><br>
					DA BY I.T.<br>
					
				</div>
				<div class="lado2 scrollReveal">
					<span>
					Nós criamos esta plataforma como uma fonte de informação e diálogo sobre o futuro da infraestrutura de TI, para profissionais da área e líders de TI. 
					</span>
					<a href="<?=BASE_SITE; ?>noticia/7">
						<div class="btn btn-azul scrollReveal">CONHEÇA O BLOG</div>
					</a>
				</div>
			</div>
		</div>
	</section>

</div>



<section id="novidades">
	<div class="limitador">
		<div class="todos">
			<?php $noticias = $c->getResults('noticias', 'ORDER BY id DESC'); ?>
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
		</div>
	</div>
</section>




<?php include 'includes/solucoes_e_suporte.php'; ?>


<?php include 'includes/footer.php'; ?>