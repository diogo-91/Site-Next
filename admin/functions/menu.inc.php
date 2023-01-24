<div class="sidebar-menu">
	<header class="logo-env">
		<div class="logo">
			<a href="<?php echo $url_painel; ?>">
				<?php if($logotipo<>''): ?>
					<img src="<?php echo $logotipo; ?>" alt="" style="max-width:160px; max-height:40px;" />
				<?php else: ?>
					<h4><?=NOME_SITE;?></h4>
					<h5>Painel de controle</h5>
				<?php endif; ?>
			</a>
		</div>
		<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon">
			<i class="entypo-menu"></i>
			</a>
		</div>
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#">
				<i class="entypo-menu"></i>
			</a>
		</div>
	</header>
	<?php 
		$paginas = new Paginas('');
	    echo $functions->gerarMenu($paginas,$url_painel);
	?>
</div>


<style type="text/css">
	.logo h4,
	.logo h5{color: #d1d1d1; margin:1px 0px;}
</style>