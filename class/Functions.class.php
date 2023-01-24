<?php
	class Functions {
		
		protected $db;

		function __construct($conexao){
			$this->db = $conexao;
		}

		function getResult($inicio, $fim, $html){
			$explode = explode($inicio,$html);
			$explode2 = explode($fim,$explode[1]);
			$retorno = $explode2[0];
			return $retorno;
		}

		# Remove Caracteres Especiais
		function strip_special_chars($string){ 
		  $string = preg_replace('/([^.a-z0-9]+)/i', '_', $string);
		  return $string;  
		}

		# Gera um SLUG com a string solicitada
		function gerarUrl($str) {
			$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
			$clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
			$clean = strtolower(trim($clean, '-'));
			$clean = preg_replace("/[\/_| -]+/", '-', $clean);

			return $clean;
		}

		# Encode HASH
		function _encode($string) {
			$key = "9kJpFwUhsIppYrlCEltvncggsANeL4SclSfbRfJOz";
			return rawurlencode( base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key)))));
		}
		# Decode HASH
		function _decode($string) {
			$key = "9kJpFwUhsIppYrlCEltvncggsANeL4SclSfbRfJOz";
			return rawurldecode( rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(rawurldecode($string)), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
		}

		# Remove cookie
		function removeCookie($cookie){
			unset($_COOKIE[$cookie]);
            setcookie($cookie, null, -1, '/');
		}

		# Cria cookie
		function criaCookie($cookie, $valor) {
			setcookie($cookie, $valor, time() + (86400 * 30), '/'); # 1 Dia
		}

		# Função que previne SQL Injection
		function _antiSqlInjection($Target){
			$sanitizeRules = array('FROM','SELECT','INSERT','DELETE','WHERE','DROP TABLE','SHOW TABLES');
			foreach($Target as $key => $value):
				if(is_array($value)): $arraSanitized[$key] = _antiSqlInjection($value);
				else:
					$arraSanitized[$key] = (!get_magic_quotes_gpc()) ? addslashes(str_ireplace($sanitizeRules,"",$value)) : str_ireplace($sanitizeRules,"",$value);
				endif;
			endforeach;
			return @$arraSanitized;
		}

		# Debug
		function _debug($var){
			echo '<pre>';
			print_r($var);
			echo '</pre>';
		}

		# Lista todos os arquivos de uma pasta e grava em um array
		function arquivosPasta($pasta){
			$arquivos = array();
			if(substr($pasta,-1) == '/'):
			   $dir = opendir($pasta);
			else:
			   $dir = opendir($pasta."/.");
			endif;
		   while($item = readdir($dir))
	        	if(is_file($sub = $pasta."/".$item))
	            $arquivos[] = $item;
	         else
	            if($item != "." and $item != "..")
	                $this->arquivosPasta($sub,$arquivos); 
		   return($arquivos); # Retorna um array
		}

		# Carrega CSS
		function carregaCSS(){
			$html = '';
			$arquivos_CSS = $this->arquivosPasta(PASTA_CSS);
		   foreach($arquivos_CSS as $arquivo):
		      $html .= '<link rel="stylesheet" href="'.BASE_SITE.PASTA_CSS.$arquivo.'">'."\n\t";
		   endforeach;
		   echo $html;
		}

		# Carrega JS
		function carregaJS($subpasta){
			$html = '';
			if(substr($subpasta,-1) <> '/')
			   $subpasta = $subpasta."/";
			# Arquivos soltos
			$arquivos_JS = $this->arquivosPasta(PASTA_JS.$subpasta);
		   foreach($arquivos_JS as $arquivo):
				$arquivo_min = explode(".js",$arquivo);
		   	# Ignora o arquivo normal, se houver um .min.js
		   	if(!file_exists(BASE_SITE.PASTA_JS.$subpasta.$arquivo_min[0].".min.js"))
		      	$html .= '<script src="'.BASE_SITE.PASTA_JS.$subpasta.$arquivo.'"></script>'."\n\t";
		   endforeach;
			# Plugins
			$subpastas = glob(PASTA_JS.$subpasta.'*' , GLOB_ONLYDIR);
			if(count($subpastas) > 1):
				foreach($subpastas as $pasta):
					$pasta = $pasta.'/';
					$arquivos_JS = $this->arquivosPasta($pasta);
				   foreach($arquivos_JS as $arquivo):
				   	$arquivo_min = explode(".js",$arquivo);
				   	# Ignora o arquivo normal, se houver um .min.js
				   	if(!file_exists($pasta.$arquivo_min[0].".min.js"))
				      	$html .= '<script src="'.BASE_SITE.$pasta.$arquivo.'"></script>'."\n\t";
				   endforeach;
				endforeach;
			endif;
		   echo $html;
		}

		# Valida CPF
		function validaCPF($cpf = null) {
		    if(empty($cpf)) {
		        return false;
		    }
		    $cpf = ereg_replace('[^0-9]', '', $cpf);
		    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		    // Verifica se o numero de digitos informados é igual a 11 
		    if (strlen($cpf) != 11) {
		        return false;
		    }
		    // Verifica se nenhuma das sequências invalidas abaixo 
		    // foi digitada. Caso afirmativo, retorna falso
		    else if ($cpf == '00000000000' || 
		        $cpf == '11111111111' || 
		        $cpf == '22222222222' || 
		        $cpf == '33333333333' || 
		        $cpf == '44444444444' || 
		        $cpf == '55555555555' || 
		        $cpf == '66666666666' || 
		        $cpf == '77777777777' || 
		        $cpf == '88888888888' || 
		        $cpf == '99999999999') {
		        return false;
		     } else {   
		        for ($t = 9; $t < 11; $t++) {
		            for ($d = 0, $c = 0; $c < $t; $c++) {
		                $d += $cpf{$c} * (($t + 1) - $c);
		            }
		            $d = ((10 * $d) % 11) % 10;
		            if ($cpf{$c} != $d) {
		                return false;
		            }
		        }
		        return true;
		    }
		}
		
		# Verifica se o email é válido
		function validaEmail($email){
		   	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    return false;
			}else{
				return true;
			}
		}
		
		# Retorna o endereço de IP
		function getIp(){
			$ipaddress = '';
			if (getenv('HTTP_CLIENT_IP'))
				$ipaddress = getenv('HTTP_CLIENT_IP');
			else if(getenv('HTTP_X_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			else if(getenv('HTTP_X_FORWARDED'))
				$ipaddress = getenv('HTTP_X_FORWARDED');
			else if(getenv('HTTP_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			else if(getenv('HTTP_FORWARDED'))
			 $ipaddress = getenv('HTTP_FORWARDED');
			else if(getenv('REMOTE_ADDR'))
				$ipaddress = getenv('REMOTE_ADDR');
			else
				$ipaddress = 'UNKNOWN';

			if($ipaddress=='::1'){
				$ipaddress = 'localhost';
			}else{
				$ipaddress = $ipaddress;
			}
			
			return $ipaddress;
		}
		
		# Verifica variável contra SQL Injection
		function verificaInjection( $sCode ) {
			if ( function_exists( "mysql_real_escape_string" ) ) {
				$sCode = mysql_real_escape_string( $sCode );
			} else {
				$sCode = addslashes( $sCode );
			}
			return $sCode;
		}
		
		# Retorna a url atual
		function getUrl(){
			$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
			$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
			$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
			$URL  = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
			return $URL;
		}

		# Resgata os $_GET de uma url absoluta
		function gets($url){
			$u2 = explode("?",$url);
			$us = explode("&",$u2[1]);

			foreach($us as $i => $value):
				$v = explode("=",$value);
				$get 	= $v[0];
				$valor 	= urldecode($v[1]);

				$_GET[$get] = $valor;
			endforeach;
		}
		
		# Gera uma string randomica
		function gerarRand($tamanho = ""){	
			$code = md5(uniqid(rand(), true));
			if ($tamanho != "") return substr($code, 0, $tamanho);
			else return $code;
		}
		
		function removerTags($string){
			$val = trim($string);
			$val = strip_tags($val);
			//$val = htmlentities($val, ENT_QUOTES, 'UTF-8'); // convert funky chars to html entities
			$pat = array("\r\n", "\n\r", "\n", "\r"); // remove returns
			$val = str_replace($pat, '', $val);
			$pat = array('/^\s+/', '/\s{2,}/', '/\s+\$/'); // remove multiple whitespaces
			$rep = array('', ' ', '');
			$val = preg_replace($pat, $rep, $val);
			$val = trim($val);
			# $val = mysql_real_escape_string($val);
			return $val;
		}

		function limitaTexto($texto,$tamMax = 30) {
			if(strlen($texto) > $tamMax) 
			   return substr($texto, 0, $tamMax) . '...';
			else
			   return $texto;
		}

		# Formata DATA
		function formataData($data){
			$dataC = explode("-",$data);
			return $dataC[2].'/'.$dataC[1].'/'.$dataC[0];
		}
		# Desformata DATA
		function desformataData($data){
			$dataC = explode("/",$data);
			return $dataC[2].'-'.$dataC[1].'-'.$dataC[0];
		}		

		# Traz data completa - Ex.: 20 de Agosto de 2016
		function trazDataCompleta($data){
			$d = explode("-",$data);
			if($d[1]==01):
				$mes = "Janeiro";
			elseif($d[1]=='02'):
				$mes = "Fevereiro";
			elseif($d[1]=='03'):
				$mes = "Março";
			elseif($d[1]=='04'):
				$mes = "Abril";
			elseif($d[1]=='05'):
				$mes = "Maio";
			elseif($d[1]=='06'):
				$mes = "Junho";
			elseif($d[1]=='07'):
				$mes = "Julho";
			elseif($d[1]=='08'):
				$mes = "Agosto";
			elseif($d[1]=='09'):
				$mes = "Setembro";
			elseif($d[1]=='10'):
				$mes = "Outubro";
			elseif($d[1]=='11'):
				$mes = "Novembro";
			elseif($d[1]=='12'):
				$mes = "Dezembro";
			endif;

			return $d[2].' de '.$mes.' de '.$d[0];
		}

		# Upload de Imagem
		public function uploadImagem($arquivo,$pasta,$qualidade,$width,$height){
			include("assets/wideimage/WideImage.php");
			$image = WideImage::load($arquivo["tmp_name"]);

			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
			$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			$caminho_imagem = $pasta.$nome_imagem;

			if($width && $height):
				$image->resize($width,$height,"fill");
			endif;

			if($qualidade){
				$image->saveToFile($caminho_imagem,$qualidade);
			}else{
				$image->saveToFile($caminho_imagem,100);
			}
			

			return $nome_imagem;

			$image->destroy();
		}

		public function uploadArquivo($arquivo,$pasta){
			if (!empty($arquivo["name"])){ 
				$file_name= $arquivo["name"];
				$file_name = $this->strip_special_chars($file_name);
				move_uploaded_file($arquivo["tmp_name"], $pasta.$file_name);
				return $file_name;
			}
		}

		// RETORNA O PAIS DO USUÁRIO BASEADO EM SEU IP
		function geoPais(){
			$ip = $this->getIp();
			$url = "http://www.localizaip.com.br/localizar-ip.php?ip=".$ip;
			$pagina = file_get_contents($url);
			preg_match_all("/País:<b>(.*)<\/b>/U",$pagina,$array);
			$pais = explode("País:",strip_tags($array[0][0]));
			return $pais[1];
		}

		// RETORNA O ESTADO DO USUÁRIO BASEADO EM SEU IP
		function geoEstado(){
			$ip = $this->getIp();
			$url = "http://www.localizaip.com.br/localizar-ip.php?ip=".$ip;
			$pagina = file_get_contents($url);
			preg_match_all("/Estado:<b>(.*)<\/b>/U",$pagina,$array);
			$estado = explode("Estado:",strip_tags($array[0][0]));
			return $estado[1];
		}

		// RETORNA A CIDADE DO USUÁRIO BASEADO EM SEU IP
		function geoCidade(){
			$ip = $this->getIp();
			$url = "http://www.localizaip.com.br/localizar-ip.php?ip=".$ip;
			$pagina = file_get_contents($url);
			preg_match_all("/Cidade:<b>(.*)<\/b>/U",$pagina,$array);
			$cidade = explode("Cidade:",strip_tags($array[0][0]));
			return $cidade[1];
		}

		// PEGA O ID DO VÍDEO DA URL SOLICITADA
		function getYoutubeID($link){
			$l = explode("?v=",$link);
			$r = explode("&",$l[1]);
			return $r[0];
		}
	}
?>