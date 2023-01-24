<div class="solicitarContato _bc" style="background-color:#7dac5c">
	<form method="POST" action="">
		<div class="limitador">
			<div class="lado1">
				<h3 class="scrollReveal">
					FALE<br>
					<b>CONOSCO</b>
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
				<button type="submit" name="orcamento" class="btn scrollReveal">SOLICITAR ORÇAMENTO</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
    $(".solicitarContato input, .solicitarContato select, .solicitarContato textarea").on("click",function(){
        var campo = $(this).attr("name");
        dataLayer.push({
            'event': 'event',
            'eventCategory': 'by-it:site',
            'eventAction': 'click',
            'eventLabel': 'orcamento[['+campo+']]'
        });
    });
</script>