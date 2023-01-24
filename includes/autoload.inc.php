<?php 
	spl_autoload_register(function($classe){
		if($classe <> 'Tabelas\PDO'):
		   $namespace = str_replace("\\","/",__NAMESPACE__);
		   $classe = str_replace("\\","/",$classe);
	   	$caminho_classe = BASE_CORE."class/".(empty($namespace)?"":$namespace."/")."{$classe}.class.php";
	   	#echo '<pre>'.$caminho_classe.'<br></pre>';
	   	require_once($caminho_classe);
   	endif;
	});
?>