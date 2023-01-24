<?php
	 
	$dadosSEO = $c->getResult("seo","WHERE id = '1'");

	if($dadosSEO['id']<>''):
	
?>
	<!-- TWITTER -->
	<meta name="twitter:card" content="<?php echo $dadosSEO['descricao_site']; ?>">
	<meta name="twitter:title" content="<?php echo $dadosSEO['titulo_site']; ?>">
	<meta name="twitter:description" content="<?php echo $dadosSEO['descricao_site']; ?>">
	<meta name="twitter:creator" content="Pablo Schuab">
	<meta name="twitter:image" content="assets/uploads/<?php echo $dadosSEO['imagem_facebook']; ?>">
	 
	<!-- FACEBOOK -->
	<meta property="og:title" content="<?php echo $dadosSEO['titulo_site']; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')+1); ?>" />
	<meta property="og:image" content="<?php echo "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')+1); ?>assets/uploads/<?php echo $dadosSEO['imagem_facebook']; ?>" />
	<meta property="og:description" content="<?php echo $dadosSEO['descricao_site']; ?>" />
	<meta property="og:site_name" content="<?php echo $dadosSEO['titulo_site']; ?>" />
	<meta name="description" content="<?php echo $dadosSEO['descricao_site']; ?>" />
	 
	<!-- GOOGLE+ -->
	<meta itemprop="name" content="<?php echo $dadosSEO['titulo_site']; ?>">
	<meta itemprop="description" content="<?php echo $dadosSEO['descricao_site']; ?>">
	<meta itemprop="image" content="assets/uploads/<?php echo $dadosSEO['imagem_facebook']; ?>">

	<link rel="shortcut icon" href="<?php if($dadosSEO['favicon'] <> '') echo 'assets/uploads/'.$dadosSEO['favicon']; else echo ''; ?>" type="image/x-icon" />

	<!-- GERAL -->
	<meta id="MetaDescription" name="DESCRIPTION" content="<?php echo $dadosSEO['descricao_site']; ?>">
	<meta id="MetaKeywords" name="KEYWORDS" content="<?php echo $dadosSEO['keywords']; ?>">
	<meta id="MetaAuthor" name="AUTHOR" content="<?php echo AUTOR_SITE ?>">
	<meta name="Robots" content="ALL">
	<meta name="Robots" content="INDEX,FOLLOW">
	<meta name="Revisit-After" content="2 Days">
	<meta name="Distribution" content="Global">
	<meta name="Rating" content="General">


<?php 
	endif;
?>