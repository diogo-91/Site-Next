<?php include 'includes/header_interna.php'; ?>

<div id="contato">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<div class="titulo centerV scrollReveal">
				FALE<br>CONOSCO
			</div>
			<div class="descricao centerV scrollReveal">
			Somos especialistas em Soluções de Sustentação para Infraestrutura de TI, atuamos com serviços de Suporte Multivendor com cobertura nacional.
			</div>
			<a href="<?=BASE_SITE; ?>sobre">
				<div class="btn btn-verde centerV scrollReveal">CONHEÇA A BYIT</div>
			</a>
		</div>
	</div>


	<div class="baixo">
		<div class="lado1">
			<div class="limitador_meio_right scrollReveal">
				<ul class="breadcumb">
					<li>
						<a href="<?=BASE_SITE; ?>">HOME</a>
					</li>
					<li>/</li>
					<li>
						FALE CONOSCO
					</li>
				</ul>
				<div class="lado11">
					<h3>FALE CONOSCO</h3>
					<!-- <i class="fa fa-phone"></i> <span>15 3357.9585</span> -->
					<i class="fa fa-phone"></i> <span>0800 885 6000</span>
					<i class="fa fa-envelope"></i> <span>contato@byit.com.br</span>					
					<a href="https://api.whatsapp.com/send?phone=5515988039753" target="_blank" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="fale-conosco:whatsapp">
						<div class="btn btn-verde">ABRIR WHATSAPP</div>
					</a>
				</div>
				<div class="lado22">
					<h3>ENDEREÇO</h3>
					<span>
						<b>Sorocaba/SP</b><br>
							Av Barão de Tatuí, 11 <br>
							Centro | CEP 18030-000<br> 
					</span>
					
					<a href="https://www.google.com/maps/place/Av.+Bar%C3%A3o+de+Tatu%C3%AD,+11+-+Centro,+Sorocaba+-+SP,+18035-060/@-23.5042136,-47.4639719,18.75z/data=!4m5!3m4!1s0x94c58abde11f9c3b:0x2dde46d8924e7d5!8m2!3d-23.5041832!4d-47.4635853" target="_blank" class="gtm-link-event" gtm-event-data-category="by-it:site" gtm-event-data-action="click" gtm-event-data-label="abrir-mapa">
						<div class="btn btn-cinza">ABRIR MAPA</div>
					</a>
				</div>
			</div>
		</div>
		<div class="lado2">
			<iframe class="scrollReveal" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1087.7636083221423!2d-47.46397193313036!3d-23.504213630956254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58abde11f9c3b%3A0x2dde46d8924e7d5!2sAv.%20Bar%C3%A3o%20de%20Tatu%C3%AD%2C%2011%20-%20Centro%2C%20Sorocaba%20-%20SP%2C%2018035-060!5e0!3m2!1spt-BR!2sbr!4v1670973411119!5m2!1spt-BR!2sbr" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>


	<div class="limitador">
		<div class="formulario">
			<div class="lado1 scrollReveal">
				<span><b>Preencha o formulário, nossa equipe está aguardando sua mensagem:</b></span>
				<form action="" method="POST">
					<div class="group group2">
						<label>Nome</label>
						<input type="text" name="nome" placeholder="Digite aqui seu nome" required>
					</div>
					<div class="group">
						<label>Email</label>
						<input type="email" name="email" placeholder="Seu Email" required>
					</div>
					<div class="group">
						<label>Celular</label>
						<input type="text" name="celular" placeholder="(00) 00000.0000" required>
					</div>
					<div class="group">
						<label>Assunto</label>
						<input type="text" name="assunto" placeholder="Assunto do seu interesse:" required>
					</div>
					<div class="group">
						<label>Mensagem</label>
						<textarea name="mensagem" placeholder="Deixe Sua Mensagem" required></textarea>
					</div>
					<button type="submit" name="contato" class="btn btn-verde">ENVIAR</button>
				</form>
			</div>
			<div class="lado2 scrollReveal">
				<div class="box">
					<h2><i class="fa fa-lock"></i> PORTAL DO CLIENTE</h2>
					<div class="texto">
					Para Modernizar, Agilizar e Simplificar seu atendimento utilize nosso portal com ele é possível abrir e acompanhar chamados, extrair relatórios e gráficos com métricas de atendimento, fazer a gestão do seu inventário e falar com nosso analista via chat.
					</div>
					<a href="https://byit.com.br/portal-do-cliente">
						<div class="btn">ACESSAR O PORTAL DO CLIENTE</div>
					</a>
				</div>
			</div>
		</div>
	</div>


	<?php $representantes = $c->getResults('representantes', 'ORDER BY estado ASC'); ?>
	<div class="representante">
		<div class="limitador">
			<div class="lado1 scrollReveal">
				<h1>ENCONTRE UM<br><b>REPRESENTANTE</b></h1>
				<select name="representante">
					<option value="">SELECIONE UM ESTADO</option>
					<option value="SP">SP</option>
					<option value="SP">SP</option>
					<option value="SP">SP</option>
					<option value="SP">SP</option>
				</select>
			</div>
			<div class="lado2">
				<?php foreach ($representantes as $cada): ?>
					<div class="cada scrollReveal">
						<div class="estado"><?=$cada['estado']; ?></div>
						<div class="texto">
							<b><?=$cada['titulo']; ?></b><br>
							<?=$cada['texto']; ?>
						</div>
					</div>
				<?php endforeach; ?>
				
			</div>
		</div>
	</div>

		


</div>

<script type="text/javascript">
	$("#contato input, #contato select, #contato textarea").on("click",function(){
		var campo = $(this).attr("name");
		dataLayer.push({
			'event': 'event',
			'eventCategory': 'by-it:site',
			'eventAction': 'click',
			'eventLabel': '[['+campo+']]'
		});
	});
</script>

<?php include 'includes/footer.php'; ?>