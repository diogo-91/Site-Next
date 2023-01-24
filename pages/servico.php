<?php

$TITLE = 'TESTe';

?>

<?php include 'includes/header_interna.php'; ?><div class="overlay-modal"></div>

<style>
.owl-theme .owl-dots, .owl-theme .owl-nav,
.owl-theme .owl-nav.disabled+.owl-dots {
	display: none !important;
}
</style>

<div class="modal">

	<div class="fechar"><i class="fa fa-times"></i></div>

	<div class="conteudo">

		

	</div>

</div><?php
    $slug_servico = $get[1];

    $servico = $c->getResult('servicos', "WHERE slug = '$slug_servico'");
?><div id="servicos" style="padding-top: 0px;">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<div class="icone centerV scrollReveal">
				<img src="<?=BASE_SITE; ?>assets/images/<?=$servico['icone']; ?>" class="imagem_white">
			</div>
			<div class="titulo centerV scrollReveal">
				<?=$servico['titulo']; ?>
			</div>
			<div class="descricao centerV scrollReveal">
				<?=$servico['resumo']; ?>
			</div>
			<!-- <a href="<?=BASE_SITE; ?>contato">
				<div class="btn btn-verde centerV scrollReveal">LIGAMOS PARA VOCÊ</div>
			</a> -->
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
						<a href="<?=BASE_SITE; ?>servicos">SOLUÇÕES BY I.T.</a>
					</li>
					<li>/</li>
					<li>
						<?=$servico['titulo']; ?>
					</li>
				</ul>
				<!-- <h2 class="scrollReveal">DESCRIÇÃO</h2> -->
				<div class="descricao scrollReveal">
					<?=$servico['descricao']; ?>
				</div>
			</div>
			
		</div>
		<?php
            if ($servico['video_imagem'] != '') {
                $imagem_video = $servico['video_imagem'];
            } else {
                $imagem_video = 'servico.jpg';
            }
        ?>
		<div class="lado2 _bc" style="background: url(<?=BASE_SITE; ?>assets/images/<?=$imagem_video; ?>) no-repeat center center;">
			<div class="limitador_meio_left scrollReveal">
				<?php if ($servico['video_link'] != ''): ?>
					<div class="play _tr" data-video="<?=$f->getYoutubeID($servico['video_link']); ?>">
						<img src="<?=BASE_SITE; ?>assets/images/icon-play.png" class="_tr">
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="limitador">
		<div class="sec_textos">
			<div class="cada scrollReveal">
				<div class="topo">
					<h3><?=$servico['conteudo_titulo']; ?></h3>
				</div>
				<div class="descricao">
					<?=$servico['conteudo_texto']; ?>
				</div>
			</div>
			<!-- <div class="cada scrollReveal">
				<div class="topo">
					<div class="icone"><i class="fa fa-star"></i></div>
					<h3>SUBTÍTULO DO CONTEÚDO</h3>
				</div>
				<div class="descricao">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit mi sed erat gravida maximus. Sed dignissim neque at lacus vehicula.
				</div>
			</div>
			<div class="cada scrollReveal">
				<div class="topo">
					<div class="icone"><i class="fa fa-star"></i></div>
					<h3>SUBTÍTULO DO CONTEÚDO</h3>
				</div>
				<div class="descricao">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit mi sed erat gravida maximus. Sed dignissim neque at lacus vehicula.
				</div>
			</div>
			<div class="cada scrollReveal">
				<div class="topo">
					<div class="icone"><i class="fa fa-star"></i></div>
					<h3>SUBTÍTULO DO CONTEÚDO</h3>
				</div>
				<div class="descricao">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit mi sed erat gravida maximus. Sed dignissim neque at lacus vehicula.
				</div>
			</div> -->
		</div>
	</div>

	<div class="orcamento _bc" style="background: url(<?=BASE_SITE; ?>assets/images/bg_form.jpg) no-repeat center center;">
		<div class="limitador">
			<form name="orcamento" method="POST" action="">				
				<div class="lado1">
					<h3 class="scrollReveal">
						<b>SOLICITE UM</b>
						ORÇAMENTO
					</h3>
					<div class="texto scrollReveal">
						Preencha corretamente o formulário ao lado. <b>Se preferir ligamos para você</b>, fique a vontade para deixar suas observações detalhadas.<br>
						Nosso atendimento está esperando sua mensagem.
					</div>
				</div>
				<div class="lado2">
					<div class="form-group scrollReveal">
						<label>NOME</label>
						<input type="text" name="nome" placeholder="DIGITE SEU NOME" required>
					</div>
					<div class="form-group scrollReveal">
						<label>TELEFONE</label>
						<input type="tel" name="telefone" placeholder="PODE SER O CELULAR OU WHATSAPP" required>
					</div>
					<div class="form-group scrollReveal">
						<label>OBSERVAÇÕES</label>
						<textarea name="observacao" placeholder="TEM ALGUMA OBSERVAÇÃO?" required></textarea>
					</div>
				</div>
				<div class="lado3">
					<div class="form-group scrollReveal">
						<label>EMAIL</label>
						<input type="email" name="email" placeholder="DIGITE SEU EMAIL" required>
					</div>
					<div class="form-group scrollReveal">
						<label>EMPRESA</label>
						<input type="text" name="empresa" placeholder="QUAL O NOME DA SUA EMPRESA?" required>
					</div>
					<div class="form-group scrollReveal">
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
					<button type="submit" name="orcamento" class="btn btn-azul scrollReveal">SOLICITAR ORÇAMENTO</button>
				</div>
			</form>
		</div>
	</div>

	<div class="limitador">
		<div class="sec_vejatbm">
		
			<h2 class="scrollReveal">VEJA <b>TAMBÉM</b></h2>

			<div class="todos_slides">

				<div class="arrow-left"><i class="fa fa-chevron-circle-left"></i></div>
				<div class="arrow-right"><i class="fa fa-chevron-circle-right"></i></div>
				

<style>
.owl-theme .owl-nav.disabled+.owl-dots {
	margin-top: 10px;
	display: none;
}
    </style>

				<div class="slides scrollReveal owl-carousel owl-theme">
					<?php $servicos = $c->getResults('servicos', 'ORDER BY posicao ASC'); ?>
					<?php foreach ($servicos as $servico): ?>
						<a href="<?=BASE_SITE; ?>servico/<?=$servico['slug']; ?>">
							<div class="cada">
								<div class="imagem">
									<img src="<?=BASE_SITE; ?>assets/images/<?=$servico['icone']; ?>" class="centerAll">
								</div>
								<div class="titulo">
									<?=strip_tags($servico['titulo']); ?>
								</div>
							</div>
						</a>
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>
	</div>



	<script>
$('.owl-carousel').owlCarousel({
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        900:{
            items:5,
            nav:true,
            loop:false
        },
        1200:{
            items:7,
            nav:true,
            loop:false
        }
    }
})
</script>

<?php include 'includes/footer.php'; ?>