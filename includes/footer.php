<!-- WAHTS -->
<script async src="<?=BASE_SITE; ?>assets/js/whats-js.js"></script>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCCLH5X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<footer class="_bc">
	<div class="limitador">
		<div class="topo">
			<a href="<?=BASE_SITE; ?>">
				<img src="<?=BASE_SITE; ?>assets/images/logo_footer.png" class="buzz scrollReveal">
			</a>
			<h2 class="scrollReveal show-phone hide-desktop" style="margin-top: 20px;">
				ASSINE NOSSO<br>
				<b>EMAIL MARKETING</b>
			</h2>
			<form action="" method="POST" class="scrollReveal">
				<div class="group">
					<label>NOME</label>
					<input type="text" name="nome" placeholder="DIGITE SEU NOME" required>
				</div>
				<div class="group">
					<label>EMAIL</label>
					<input type="email" name="email" placeholder="E AQUI O SEU EMAIL" required>
				</div>
				<button type="submit" name="newsletter" class="btn btn-verde">ENVIAR</button>
			</form>
			<h2 class="scrollReveal hide-phone show-desktop">
				ASSINE NOSSO<br>
				<b>EMAIL MARKETING</b>
			</h2>
		</div>
		<div class="baixo">
			<div class="scrollReveal cada cadaPaginas">
				<h2>PÁGINAS DO SITE</h2>
				<ul>
					<li><a href="<?=BASE_SITE; ?>" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="menu-rodape:[[home]]">Página Inicial</a></li>
					<li><a href="<?=BASE_SITE; ?>sobre" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="menu-rodape:[[conheca]]">Conheça a By I.T.</a></li>
					<li><a href="<?=BASE_SITE; ?>servicos" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="menu-rodape:[[solucoes]]">Nossas Soluções em Tecnologia</a></li>
					<!-- <li><a href="<?=BASE_SITE; ?>produtos">Catálogo de Produtos</a></li> -->
					<li><a href="<?=BASE_SITE; ?>contato" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="menu-rodape:[[contato]]">Fale Conosco</a></li>
				</ul>
			</div>
			<div class="scrollReveal cada cadaPostagens">
				<h2>ÚLTIMAS POSTAGENS</h2>
				<ul>

				<?php $noticias = $c->getResults('noticias', 'ORDER BY id DESC LIMIT 2'); ?>
			<?php foreach ($noticias as $noticia): ?>

					<li>
					<a href="<?=BASE_SITE; ?>noticia/<?=$noticia['id']; ?>">
							 <div class="titulo"><i class="fa fa-angle-right"></i> <?=$noticia['titulo']; ?></div>
						</a>
					</li>
					<?php endforeach; ?>

				</ul>
			</div>
			<div class="scrollReveal cada cadaFale">
				<h2>CONTATO</h2>
				<ul>
					<li>
					<i class="fa fa-phone"></i> 0800 885 6000
					</li>
					<li>
				
					<li>
						<i class="fa fa-envelope"></i> contato@byit.com.br
						
					</li>
					
					
					<li>
						<br>
						<a href="<?=BASE_SITE; ?>contato">
							<div class="btn btn-azul">FALE CONOSCO</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="scrollReveal cada cadaEndereco">
				<h2>ENDEREÇO</h2>
				<ul>
					<li>
						<b>Sorocaba/SP</b>
					</li>
					<li>
						Av Barão de Tatuí, 11
					</li>
					<li>
						Centro | CEP 18030-000
					</li>
					<li>
						<a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.78692107185!2d-47.46577398507173!3d-23.5041831847112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58abde11f9c3b%3A0x2dde46d8924e7d5!2sAv.%20Bar%C3%A3o%20de%20Tatu%C3%AD%2C%2011%20-%20Centro%2C%20Sorocaba%20-%20SP%2C%2018035-060!5e0!3m2!1sen!2sbr!4v1659641194663!5m2!1sen!2sbr" target="_blank">
							<div class="btn btn-laranja">ABRIR MAPA</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="copy scrollReveal">
			Todos os Direitos Reservados By I.T. Site mantido por <a href="https://noot.com.br" target="_blank">NOOT</a>
		</div>
	</div>
</footer>