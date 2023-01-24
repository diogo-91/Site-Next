<?php 

	// include("../includes/configuracoes.inc.php");

	// $con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
	// mysql_select_db(DB_NAME, $con);

	// ini_set('default_charset','UTF-8');
	// mysql_set_charset('utf8');


	// Nome do Arquivo do Excel que será gerado
	$data = date('d-m-Y');
	$arquivo = 'arquivo_'.$data.'.xls';

	// Criamos uma html HTML com o formato da planilha para excel
	$html = '<meta charset="UTF-8">';
	$html .= '<table>';
	$html .= '<tr>';
	$html .= '<td>Nome</td>';
	$html .= '<td>E-mail</td>';
	$html .= '</tr>';


	$html .= '<tr>';
	$html .= '<td>Pablo Schuab</td>';
	$html .= '<td>pabloschuab.dev@gmail.com</td>';
	$html .= '</tr>';


	// $select = mysql_query('SELECT * FROM curriculos ORDER BY id ASC');
	// while($e = mysql_fetch_array($select)){
	// 	$html .= '<tr>';
	// 	$html .= '<td>'.$e['nome'].'</td>';
	// 	$html .= '<td>'.$e['email'].'</td>';
	// 	$html .= '<td>'.$e['endereco'].'</td>';
	// 	$html .= '<td>'.$e['cidade'].'</td>';
	// 	$html .= '<td>'.$e['estado'].'</td>';
	// 	$html .= '<td>'.$e['pais'].'</td>';
	// 	$html .= '<td>'.$e['telefone'].'</td>';
	// 	$html .= '<td>'.$e['celular'].'</td>';
	// 	$html .= '<td>'.$e['area'].'</td>';
	// 	$html .= '<td><a href="'.BASE_SITE.'assets/uploads/'.$e['imagem'].'">Clique aqui</a></td>';
	// 	$html .= '<td>'.$e['data'].'</td>';
	// 	$html .= '<td>'.$e['ip'].'</td>';
	// 	$html .= '</tr>';
	// }

	$html .= '</table>';


	// Configurações header para forçar o download
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );

	echo $html;

	exit;

?>