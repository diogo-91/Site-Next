<?php include 'includes/header_interna.php'; ?>


<?php

    $id_noticia = $get[1];

    $noticia = $c->getResult('noticias', "WHERE id = '$id_noticia'");

?>


<style type="text/css">
	
	#solucoes{padding: 50px 0px 0px 0px;}
	#solucoes .topo{margin-bottom: 0px;}

	#novidades .todos .cada{width: 31%; margin-bottom: 50px;}

	ul.breadcumb {float: none;margin: 0; padding: 20px 0 30px;}

	@media only screen and (max-width: 768px) {
		ul.breadcumb { display: none; }
	}
</style>




<div id="sobre">
	<div style="background:#ededed;padding: 1px 0;">
		<div class="limitador">
			<ul class="breadcumb">
				<li>
					<a href="<?=BASE_SITE; ?>">HOME</a>
				</li>
				<li>/</li>
				<li>
					<a href="<?=BASE_SITE; ?>noticias">BLOG</a>
				</li>
				<li>/</li>
				<li><?=$noticia['titulo']; ?></li>
			</ul>
		</div>
	</div>
	<section id="noticia" style="margin-top: 0;padding:-top: 0;">
		<div class="limitador">
			<div class="topo">
				<div class="lado1 scrollReveal">
					<div class="data">
						<?=$f->formataData($noticia['data']); ?>
					</div>
					<h1>
						<?=$noticia['titulo']; ?>
					</h1>
					
				</div>
				<div class="lado2 scrollReveal">
					<div class="imagem _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['imagem']; ?>) no-repeat center center;"></div>
				</div>
			</div>
			<div class="textoNoticia scrollReveal">
				<?=$noticia['texto']; ?>
			</div>
			<div class="todasFotos">
				<h2 class="scrollReveal">FOTOS</h2>
				<div class="todas">
					<?php if ($noticia['foto1'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto1']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto1']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto2'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto2']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto2']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto3'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto3']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto3']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto4'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto4']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto4']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto5'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto5']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto5']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto6'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto6']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto6']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto7'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto7']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto7']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
					<?php if ($noticia['foto8'] != ''): ?>
						<a href="<?=BASE_SITE; ?>assets/images/<?=$noticia['foto8']; ?>" data-lightbox="fotos">
							<div class="cada scrollReveal _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$noticia['foto8']; ?>) no-repeat center center;"></div>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

</div>




<?php include 'includes/solucoes_e_suporte.php'; ?>


<?php include 'includes/footer.php'; ?>