<?php include 'includes/header_interna.php'; ?>

<?php

    $id_produto = (int) $get[1];
    $produto = $c->getResult('produtos', "WHERE id = '$id_produto'");


 //    echo 'imagem1: '.$produto['imagem1'].'<br>';
	// echo 'imagem2: '.$produto['imagem2'].'<br>';
	// echo 'imagem3: '.$produto['imagem3'].'<br>';

?>

<style type="text/css">
body{background: #ededed;}
#produto .lado2 .titulo {
	float: none;
	display: block;
	margin: 0 0 10px;
	font-size: 24px;
}
#produto .lado2 .label {
	float: left;
	margin: 0 10px 0 0;
	font-size: 11px;
	border-radius: 10px;
	padding: 6px 13px;
}
#produto .lado2 .infos {
	width: 100%;
	float: left;
	clear: both;
	font-size: 16px;
	font-weight: 100;
	color: #6e6e6e;
	line-height: 22px;
	margin-top: 25px;
}
#produto .lado2 .descricao,
#produto .lado2 .infos {
	padding: 40px 50px;
	background: #fff;
	border-radius: 16px;
	min-height: 255px;
}
#produto .lado2 .infos {
	min-height: auto;
}	
#produto .lado2 .infos .item {
	width: 40%;
	float: left;
	font-size: 1rem;
	color: #72777b;
	padding-left: 60px;
	position: relative;
}
#produto .lado2 .infos .item i {
	position: absolute;
	font-size: 32px;
	color: #35393b;
	left: 0;
	top: 4px; 
}
#produto .lado2 .descricao b,
#produto .lado2 .infos .item b {
	font-size: 18px;
	font-weight: 800;
	color: #35393b;
}
#produto .lado2 .descricao .desc {
	font-size: 14px;
	padding-top: 25px;
	color: #72777b;
}
#produto .lado2 .infos .item.first {
	width: 59%;
}	
#produto .lado2 .valor-exib {
	
}
#produto .lado2 .valor-exib .item {
	float: left;
	color: #5c5c5c;
	line-height: 30px;
	padding: 10px 0 40px;
}
#produto .lado2 .valor-exib .item.item-button {
	float: right;
}
#produto .lado2 .valor-exib .item strong {
	font-size: 26px;
	font-weight: 800;
	color: #35393b;
}
#produto .lado2 .valor-exib .item .comprar {
	width: 240px;
	height: 64px;
	border-radius: 15px;
	background-color: #52b123;
	color: #fff;
	border: none;
	font-size: 24px;
	font-weight: 800;
}
#produto .lado2 .valor-exib .item .comprar:hover {
	background-color: #5ec928;
}
#produto .lado2 .valor-exib .item .comprar i {
	font-size: 18px; 
	margin-right: 15px;
	position: relative;
	top: -2px;
}

.owl-theme .owl-dots, .owl-theme .owl-nav,
.owl-theme .owl-nav.disabled+.owl-dots {
	display: none !important;
}

/* Small */
@media (max-width:640px) {
	#produto ul.breadcumb {
		margin-top: 20px;
	}
	#produto .lado2 .valor-exib .item,
	#produto .lado2 .valor-exib .item.item-button {
		float:none;
	}
	#produto .lado2 .infos .item,
	#produto .lado2 .infos .item.first {
		width: 100%;
	}
	#produto .lado2 .infos .item.first {
		margin-bottom: 40px;
	}
	#produto .btn.full {
		margin: 10px 0 40px;
		width: 100%;
		text-align: center;
	}
}
	
</style>

<div id="sobre">

	<div id="produto">
		
		<div class="limitador">
			<ul class="breadcumb scrollReveal">
				<li>
					<a href="<?=BASE_SITE; ?>">HOME</a>
				</li>
				<li>/</li>
				<li>
					<a href="<?=BASE_SITE; ?>produtos">PRODUTOS</a>
				</li>
				<li>/</li>
				<li><?= $produto['nome1'].' '.$produto['nome2']; ?></li>
			</ul>

			<div class="lado1 hide-phone show-desktop">
				<div class="imagem_principal scrollReveal">
					<?php 

						if (substr($produto['imagem1'], 0, 3) == 'htt') {
	                        $link_imagem = $produto['imagem1'];
	                    } elseif (!empty($produto['imagem1'])) {
	                        $link_imagem = BASE_SITE.'assets/images/'.$produto['imagem1'];
	                    } else {
	                        $link_imagem = BASE_SITE.'assets/img/sem-foto.png';
	                    }

					?>
					<!-- <a href="<?=$link_imagem;?>" data-lightbox="foto"> -->
						<img src="<?=$link_imagem;?>" xoriginal="<?=$link_imagem;?>" class="xzoom centerAll">
					<!-- </a> -->
				</div>
				<div class="thumbs">

					<?php

                    if (substr($produto['imagem1'], 0, 3) == 'htt') {
                        echo '<div class="cada ativo scrollReveal"><img src="'.$produto['imagem1'].'" class="centerAll"></div>';
                    } elseif (!empty($produto['imagem1'])) {
                        echo '<div class="cada ativo scrollReveal"><img src="'.BASE_SITE.'assets/images/'.$produto['imagem1'].'" class="centerAll"></div>';
                    } else {
                        echo '<div class="cada ativo scrollReveal"><img src="'.BASE_SITE.'assets/img/sem-foto.png" class="centerAll"></div>';
                    }

                    if (substr($produto['imagem2'], 0, 3) == 'htt') {
                        echo '<div class="cada scrollReveal"><img src="'.$produto['imagem2'].'" class="centerAll"></div>';
                    } elseif (!empty($produto['imagem2'])) {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/images/'.$produto['imagem2'].'" class="centerAll"></div>';
                    } else {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/img/sem-foto.png" class="centerAll"></div>';
                    }

                    if (substr($produto['imagem3'], 0, 3) == 'htt') {
                        echo '<div class="cada scrollReveal"><img src="'.$produto['imagem3'].'" class="centerAll"></div>';
                    } elseif (!empty($produto['imagem3'])) {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/images/'.$produto['imagem3'].'" class="centerAll"></div>';
                    } else {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/img/sem-foto.png" class="centerAll"></div>';
                    }

                    ?>
				</div>
			</div>

			<div class="lado2">
				<div class="titulo scrollReveal">
					<b><?= (!empty($produto['nome2'])) ? $produto['nome2'] : $produto['nome1']; ?></b>
				</div>
				<div class="label scrollReveal">
					<b>MARCA:</b> <?=$produto['marca']; ?>
				</div>
				<div class="label scrollReveal">
					<b>MODELO:</b> <?=$produto['modelo']; ?>
				</div>
			</div>

			<div class="lado1 show-phone hide-desktop">
				<div class="imagem_principal scrollReveal">
					<img src="<?php
                        if (substr($produto['imagem1'], 0, 3) == 'htt') {
                            echo $produto['imagem1'];
                        } elseif (!empty($produto['imagem1'])) {
                            echo BASE_SITE.'assets/images/'.$produto['imagem1'];
                        } else {
                            echo BASE_SITE.'assets/img/sem-foto.png';
                        }
                        ?>" class="centerAll">
				</div>
				<div class="thumbs">
					<?php

                    if (substr($produto['imagem1'], 0, 3) == 'htt') {
                        echo '<div class="cada ativo scrollReveal"><img src="'.$produto['imagem1'].'" class="centerAll"></div>';
                    } elseif (!empty($produto['imagem1'])) {
                        echo '<div class="cada ativo scrollReveal"><img src="'.BASE_SITE.'assets/images/'.$produto['imagem1'].'" class="centerAll"></div>';
                    } else {
                        echo '<div class="cada ativo scrollReveal"><img src="'.BASE_SITE.'assets/img/sem-foto.png" class="centerAll"></div>';
                    }

                    if (substr($produto['imagem2'], 0, 3) == 'htt') {
                        echo '<div class="cada scrollReveal"><img src="'.$produto['imagem2'].'" class="centerAll"></div>';
                    } elseif (!empty($produto['imagem2'])) {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/images/'.$produto['imagem2'].'" class="centerAll"></div>';
                    } else {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/img/sem-foto.png" class="centerAll"></div>';
                    }

                    if (substr($produto['imagem3'], 0, 3) == 'htt') {
                        echo '<div class="cada scrollReveal"><img src="'.$produto['imagem3'].'" class="centerAll"></div>';
                    } elseif (!empty($produto['imagem3'])) {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/images/'.$produto['imagem3'].'" class="centerAll"></div>';
                    } else {
                        echo '<div class="cada scrollReveal"><img src="'.BASE_SITE.'assets/img/sem-foto.png" class="centerAll"></div>';
                    }

                    ?>
					
				</div>
				
			</div>

			<div class="lado2">

				<div class="valor-exib scrollReveal">
					<div class="item">

					<?php
                    if ($produto['valor'] > 0) {
                        echo '<strong style="font-size: 22px; color: #333;">R$ '.number_format($produto['valor'], 2, ',', '.').'</strong><br>
						<span>até 12x de '.number_format($produto['valor'] * 0.0945, 2, ',', '.').'</span>';

                        echo '</div> 
						<div class="item item-button">';
                        if ($produto['valor'] > 0 && $produto['quantidade'] > 0) {
                            echo '<form method="post" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
									<!-- Campos obrigatórios -->  
									<input name="receiverEmail" type="hidden" value="ariane.silva@byit.com.br">  
									<input name="currency" type="hidden" value="BRL">  
							
									<!-- Itens do pagamento (ao menos um item é obrigatório) -->  
									<input name="itemId1" type="hidden" value="'.$produto['id'].'">  
									<input name="itemDescription1" type="hidden" value="'.$produto['nome1'].'">  
									<input name="itemAmount1" type="hidden" value="'.$produto['valor'].'">  
									<input name="itemQuantity1" type="hidden" value="1">  
									<input name="itemWeight1" type="hidden" value="'.$produto['quantidade'].'">
							
									<!-- Código de referência do pagamento no seu sistema (opcional) -->  
									<input name="reference" type="hidden" value="'.$produto['part_number'].'">  
							
									<!-- submit do form (obrigatório) -->  
									<button type="submit" class="comprar">
										<i class="far fa-shopping-cart"></i>
										COMPRAR
									</button>
								</form>';
                        } else {
                            echo '<a class="abrirModalOrcamento">
								<div class="btn scrollReveal">SOLICITAR ORÇAMENTO</div>
							</a>';
                        }
                    } else {
                        echo '<a class="abrirModalOrcamento">
							<div class="btn scrollReveal full">SOLICITAR ORÇAMENTO</div>
						</a>';
                    }
                    ?>
					
					</div>
				</div>

				<div class="descricao scrollReveal">
					<b>Descrição:</b>
					<div class="desc">
						<?php
                            if (!empty($produto['descricao'])) {
                                echo $produto['descricao'];
                            } else {
                                echo 'Nenhuma descrição adicionada.<br><br>';
                            }
                        ?>
					</div>

					<?php

                        if (!empty($produto['basico'])) {
                            echo '<br><br><b>Configurações Básicas:</b><div class="desc">'.$produto['basico'].'</div>';
                        }

                        if (!empty($produto['intermediario'])) {
                            echo '<br><br><b>Configurações Intermediária:</b><div class="desc">'.$produto['intermediario'].'</div>';
                        }

                        if (!empty($produto['avancado'])) {
                            echo '<br><br><b>Configurações Avançadas:</b><div class="desc">'.$produto['avancado'].'</div>';
                        }

                    ?>
				</div>

				<div class="infos scrollReveal">
					<div class="item first">
						<b>Dúvidas?</b><br>
						<i class="fal fa-headset"></i> 15 3357.9585 / 15 98803.8100
					</div>
					<div class="item">
						<b>E-mail?</b><br>
						<i class="fal fa-envelope"></i> contato@byit.com.br
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<section id="produtos_home">
	<div class="limitador">
		<div class="baixo">
			<h1 class="scrollReveal">VEJA <b>TAMBÉM</b></h1>
			<div class="wrap_produtos">
				<?php $produtos = $c->getResults('produtos', 'ORDER BY rand() LIMIT 4'); ?>
				<?php foreach ($produtos as $produto): ?>
					<a href="<?=BASE_SITE; ?>produto/<?=$produto['id']; ?>">
						<div class="cada scrollReveal">
							<div class="imagem">
								<img src="<?php

                                if (substr($produto['imagem1'], 0, 3) == 'htt') {
                                    echo $produto['imagem1'];
                                } elseif (!empty($produto['imagem1'])) {
                                    echo BASE_SITE.'assets/images/'.$produto['imagem1'];
                                } else {
                                    echo BASE_SITE.'assets/img/sem-foto.png';
                                }
                                ?>" class="centerAll">
							</div>
							<div class="subtitulo"><?= $f->limitaTexto(((!empty($produto['nome2'])) ? $produto['nome2'] : $produto['nome1']), 45); ?></div>
							<div class="descricao">
								<?=$f->limitaTexto(strip_tags($produto['descricao']), 45); ?>
							</div>
							<div class="valor">
							<?php
                                if ($produto['valor'] > 0) {
                                    echo '<b>R$ '.number_format($produto['valor'], 2, ',', '.').'</b><br>
									<span>até 12x de '.number_format($produto['valor'] * 0.0945, 2, ',', '.').'</span>';
                                } else {
                                    echo '<b>Consulte-nos</b><br>
									<span>para mais informações</span>';
                                }
                            ?>
							</div>
							
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section id="servicos" style="background: #FFF; padding:0px;">
	
	<div class="limitador">
		<div class="sec_vejatbm">
		
			<h2 class="scrollReveal">NOSSAS <b>SOLUÇÕES</b></h2>

			<div class="todos_slides">

				<div class="arrow-left scrollReveal"><i class="fa fa-chevron-circle-left"></i></div>
				<div class="arrow-right scrollReveal"><i class="fa fa-chevron-circle-right"></i></div>
				
				<div class="slides scrollReveal owl-carousel owl-theme">
					<?php $servicos = $c->getResults('servicos', 'ORDER BY titulo ASC'); ?>
					<?php foreach ($servicos as $servico): ?>
						<a href="<?=BASE_SITE; ?>servico/<?=$servico['id']; ?>">
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