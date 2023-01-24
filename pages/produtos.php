<?php include 'includes/header_interna.php'; ?>

<style>
textarea:focus, input:focus, select:focus {
    box-shadow: 0 0 0 0;
    border: 0 none;
    outline: 0;
} 
#sobre .cabecalho {
	height: 235px;
	background-position: top center;
}
#sobre .cabecalho:before {
	display: none;
}
#produtos {
	margin-top: 0;
}

.busca {
	padding-top: 60px;
}
.busca b {
	font-size: 18px;
	font-weight: 500;
	color: #68b4a1;
	display: block;
	margin-bottom: 10px;
}
.busca .input {
	background: #fff;
	height: 67px;
	border-radius: 15px; 
	width: 100%;
	padding: 0 15px;
	position: relative;
}
.busca .input input {
	width: 100%;
	border: none;
	padding: 23px 60px 23px 10px;
	background: transparent;
	font-size: 16px;
}
.busca .input button {
	position: absolute;
	right: 15px;
	top: 15px;
	font-size: 24px;
	background: transparent;
	color: #f66723;
	border: none;
}

ul.paginacao {
	float: left;
	width: 100%;
	text-align: center;
	margin-top: 50px;
}
ul.paginacao li {
	display: inline-block;
	padding: 3px;
}
ul.paginacao li a {
	font-size: 14px;
	display: block;
	width: 32px;
	height: 32px;
	line-height: 32px;
	border-radius: 10px;
	font-weight: 400;
	text-align: center;
	color: #35393b;
}
ul.paginacao li a:hover {
	background: #f1f1f1;
}
ul.paginacao li a.atual,
ul.paginacao li a.atual:hover {
	background: #f67923;
	color: #fff;
}

#produtos .produtos_conteudo h3 {
	font-weight: 400;
}
#produtos .sidebar {
	padding: 10px;
	background: #0b628f;
}
#produtos .sidebar h2 {
	font-size: 14px;
	font-weight: 600;
	text-align: left;
	background: #0b628f;
}
#produtos .sidebar ul li a {
	border-bottom-color: #0a5880;
	font-weight: 400;
	padding: 10px 0;
	color: #fff;
	font-size: 14px;
}
#produtos .sidebar ul li.ativo a {
	color: #96d0ee;
}
#produtos .sidebar ul li.ativo ul li a {
	color: #fff;
	padding: 10px 0;
	font-size: 14px;
}

#produtos .sidebar .close,
form.filter a {
	display: none;
}

/* Small */
@media (max-width:1200px) {
	#produtos {
		background: #ededed;
		position: relative;
	}
	#produtos::before {
		content:'';
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		height: 55px;
		background: #0b628f;
	}
	form.filter a,
	form.filter a:hover {
		width: 48%;
		margin: 0;
		display: inline-block;
		padding: 0 20px;
		color: #fff;
	}
	form.filter a i {
		margin-right: 5px;
	}
	.busca {
		padding: 0;
	}
	.busca b,
	#produtos ul.breadcumb {
		display: none;
	}
	#sobre .cabecalho,
	#sobre .cabecalho .limitador {
		height: auto;
	}
	#sobre .cabecalho {
		border-top: solid 2px #ededed;
	}
	.busca .input {
		border-radius: 0;
	}

	#produtos .sidebar {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		border-radius: 0;
		margin: 0;
		z-index: 300000;
		display: none;
	}
	#produtos .sidebar .close {
		position: absolute;
		top: 20px;
		right: 20px;
		font-size: 30px;
		display: block;
		color: #fff;
	}
	#produtos.open-menu .sidebar {
		display: block;
	}
	#produtos .sidebar h2 {
		font-size: 18px;
		font-weight: 800;
		margin-bottom: 20px;
	}

	.busca .input button {
		font-size: 20px;
		top: 18px;
	}

	#produtos .produtos_conteudo h3 {
		color: #72777b;
		padding: 50px 0 0;
		font-size: 14px;
	}
	#produtos .produtos_conteudo select {
		width: 40%;
		position: absolute;
		right: 0px;
		height: 40px;
		top: -10px;
		opacity: 0;
	}
}



</style>

<div id="sobre">
	
	<div class="cabecalho _bc">
		<div class="limitador">
			<form method="get" action="/produtos" class="busca">
				<b>Busque por produto</b>
				<div class="input">
					<input type="text" name="b" placeholder="Digite o nome ou especificação do item buscado" value="<?php echo strip_tags($_GET['b']); ?>"/>
					<button type="submit">
						<i class="far fa-search"></i>
					</button>
				</div>
			</form>
		</div>
	</div>

	<?php

    $query = [];
    if (!empty($_GET['b'])) {
        $query[] = '(nome1 LIKE "%'.str_replace(' ', '%', strip_tags($_GET['b'])).'%" OR nome2 LIKE "%'.str_replace(' ', '%', strip_tags($_GET['b'])).'%" OR marca LIKE "'.str_replace(' ', '%', strip_tags($_GET['b'])).'%" OR modelo LIKE "'.str_replace(' ', '%', strip_tags($_GET['b'])).'%")';
    }

    if (!empty($_GET['c'])) {
        $query[] = 'subcategoria = '.(int) $_GET['c'];
    }

    $paginacao = $c->getResults('produtos', (!(empty($query)) ? 'WHERE '.implode(' AND ', $query) : ''));

    $ids = [];
    $total_categ = [];
    foreach ($paginacao as $prods) {
        $ids[] = $prods['id'];
        ++$total_categ[$prods['subcategoria']];
    }

    $itens = 18;
    $pagina = (int) $_GET['p'];
    $pags = ceil(count($paginacao) / $itens);

    $pagina = ($pagina <= 1) ? 1 : $pagina;
    $pagina = ($pagina >= $pags) ? $pags : $pagina;

    switch ($_GET['o']) {
        case 'maior-preco':
            $order = 'valor DESC';
            break;
        case 'menor-preco':
            $order = 'valor ASC';
            break;
        case 'nome-za':
            $order = 'nome2 DESC';
            break;
        default:
            $order = 'nome2 ASC';
            break;
    }

    $produtos = $c->getResults('produtos', 'WHERE id IN ('.implode(',', $ids).') ORDER BY '.$order.' LIMIT '.($pagina - 1).', '.$itens);

    $links = [];
    $links['categoria'] = (!empty($_GET['b'])) ? 'b='.urlencode(strip_tags($_GET['b'])) : '';
    $links['orderm'] = $links['categoria'].((!empty($_GET['c'])) ? '&c='.urlencode(strip_tags($_GET['c'])) : '');
    $links['paginacao'] = $links['orderm'].((!empty($_GET['o'])) ? '&o='.urlencode(strip_tags($_GET['o'])) : '');

    ?>


	<div id="produtos">

		<div class="limitador">
		
			<ul class="breadcumb">
				<li>
					<a href="<?=BASE_SITE; ?>">HOME</a>
				</li>
				<li>/</li>
				<li>PRODUTOS</li>
			</ul>

			<?php if (count($paginacao) > 0): ?>

				<div class="sidebar">
					<a href="javascript:closeMenu();" class="close">
						<i class="fal fa-times"></i>
					</a>
					<h2>Filtrar produtos</h2>
					<ul style="padding: 10px 20px 20px;">
						<?php $categorias = $c->getResults('produtos_categorias', 'ORDER BY nome ASC'); ?>
						<?php foreach ($categorias as $i => $categoria): ?>
							<li class="ativo">
								<ul>
									<?php $id_categoria = $categoria['id']; ?>
									<?php $subcategorias = $c->getResults('produtos_subcategorias', "WHERE categoria = '$id_categoria' ORDER BY nome ASC"); ?>
									<?php foreach ($subcategorias as $sub): ?>
										<?php 
											$id_subcategoria = $sub['id'];
											$query2 = $c->getResults("produtos","WHERE subcategoria = '$id_subcategoria'");
											$quantidade = count($query2);
										?>
										<li><a href="/produtos?<?= $links['categoria'].'&c='.$sub['id']; ?>"><?=ucwords($sub['nome']).' ('.$quantidade.')'; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="produtos_conteudo">
					
					<form method="get" action="/produtos" class="filter">
						<?php if (!empty($_GET['b'])): ?>
						<input type="hidden" name="b" value="<?=urlencode(strip_tags($_GET['b'])); ?>">
						<?php endif; ?>
						<?php if (!empty($_GET['c'])): ?>
						<input type="hidden" name="c" value="<?=urlencode(strip_tags($_GET['c'])); ?>">
						<?php endif; ?>

						<a href="javascript:openMenu();">
							<i class="fal fa-list-alt"></i> Categorias
						</a>
						<a href="javascript:void(0);" style="text-align:right;">
							<i class="fal fa-sort-alt"></i> Organizar
						</a>

						<select id="order" name="o" class="scrollReveal" onchange="this.parentNode.submit();">
							<option value="">ORGANIZAR POR</option>
							<option value="maior-preco" <?php echo ($_GET['o'] == 'maior-preco') ? 'selected' : ''; ?>>Maior Preço</option>
							<option value="menor-preco" <?php echo ($_GET['o'] == 'menor-preco') ? 'selected' : ''; ?>>Menor Preço</option>
							<option value="nome-az" <?php echo ($_GET['o'] == 'nome-az') ? 'selected' : ''; ?>>Nome A-Z</option>
							<option value="nome-za" <?php echo ($_GET['o'] == 'nome-za') ? 'selected' : ''; ?>>Nome Z-A</option>
						</select>
					</form>
					
					<?php

                    if (empty($links['paginacao'])) {
                        echo '<h3 class="scrollReveal"><b>CONFIRA NOSSOS PRODUTOS</b></h3>';
                    } else {
                        echo '<h3 class="scrollReveal">Foram encontrados <b>'.count($paginacao).' produtos</b></h3>';
                    }

                    ?>

					<div class="wrap_produtos">
						<?php foreach ($produtos as $i => $produto): ?>
							<a href="<?=BASE_SITE; ?>produto/<?=$produto['id']; ?>">
								<div class="cada scrollReveal">
									<div class="imagem">
										<img src="<?php

                                            if (substr($produto['imagem1'], 0, 3) == 'htt') {
                                                echo $produto['imagem1'];
                                            } elseif (!empty($produto['imagem1'])) {
                                                echo BASE_SITE.'assets/images/'.$produto['imagem1'];
                                            } else {
                                                echo BASE_SITE.'assets/img/sem-foto.jpg';
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
							<?php
                            if ($i % 3 == 2) {
                                echo '<div style="float:left; clear:both; width:100%; height:2px;"></div>';
                            }
                            ?>
						<?php endforeach; ?>
					</div>

					<ul class="paginacao">
					<?php

                    $inicio = 1;
                    $fim = $pags;
                    $limit = 7;
                    $base = 3;

                    if ($pags > $limit && $pagina <= $base) {
                        $fim = $limit;
                    } elseif ($pags > $limit && $pagina > $base) {
                        $inicio = (($pagina - $base) > ($pags - $limit)) ? ($pags - $limit) : ($pagina - $base);
                        $fim = (($pagina + $base) < $pags) ? ($pagina + $base) : $pags;
                    }

                    if ($inicio > 1) {
                        echo '<li><a href="/produtos?'.$links['paginacao'].'&p=1">1</a></li><li>...</li>';
                    }

                    for ($x = $inicio; $x <= $fim; ++$x) {
                        echo '<li><a href="/produtos?'.$links['paginacao'].'&p='.$x.'" class="'.(($x == $pagina) ? 'atual' : '').'">'.$x.'</a></li>';
                    }

                    if ($fim < $pags) {
                        echo '<li>...</li><li><a href="/produtos?'.$links['paginacao'].'&p='.$pags.'">'.$pags.'</a></li>';
                    }

                    ?>
					</ul>

				</div>

			<?php else: ?>

			<div style="padding: 100px 0;text-align: center;">
				Nenhum produto encontrado
			</div>

			<?php endif; ?>

		</div>

	</div>

</div>

<script>

const openMenu = () => {
	document.getElementById('produtos').className = 'open-menu';
}
const closeMenu = () => {
	document.getElementById('produtos').className = '';
}

</script>


<?php include 'includes/contato.php'; ?>


<?php include 'includes/footer.php'; ?>