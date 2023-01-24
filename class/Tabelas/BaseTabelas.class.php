<?php 
	namespace Tabelas;

	class BaseTabelas {
		# Variáveis
		public $tabela;
		public $campoID;
		public $db;
		public $functions;
		public $_USER;

		# Banco de Dados
		public function __construct($db,$functions,$_USER){
			$this->db = $db;
			$this->functions = $functions;
			$this->user = $_USER;
		}

		# Tabela
		public function defineTabela($tabela,$campoID){
			$this->tabela = $tabela;
			$this->campoID = $campoID;
		}

		# Executa query
		public function executa($query){
			$registros = $this->db->prepare($query);
			$registros->execute();
			if($registros && $registros->rowCount() > 0):
				return true;
			else:
				return false;
			endif;
		}

		# Busca todos os registros da tabela, e retorna como Array
		public function trazRegistros($campos="*",$where="",$order="ASC",$id_registro=false,$limit=''){
			#echo "SELECT $campos FROM ".$this->tabela." $where ORDER BY ".$this->campoID." ".$order." ".$limit;
			if(strpos($order,'ORDER') !== false):
				$order = $order;
			else:
				$order = "ORDER BY ".$this->campoID." ".$order;
			endif;
			if($id_registro):
				# Busca pelo ID
				$registros = $this->db->prepare("SELECT $campos FROM ".$this->tabela." WHERE ".$this->campoID." = '".$id_registro."'");
				#echo "SELECT $campos FROM ".$this->tabela." WHERE ".$this->campoID." = '".$id_registro."'";
			else:
				# Busca todos
				$registros = $this->db->prepare("SELECT $campos FROM ".$this->tabela." $where ".$order." ".$limit);
				#echo "SELECT $campos FROM ".$this->tabela." $where ".$order." ".$limit;
			endif;
			$registros->execute();
			if($registros && $registros->rowCount() > 0):
				$retorno = $registros->fetchAll();
				return $retorno;
			else:
				#$this->functions->msgAlerta("Nenhum registro encontrado. <a href='".$_SERVER['HTTP_REFERER']."' style='text-decoration:underline;'>Clique aqui para voltar</a>.");
				return false;
			endif;
		}

		# Busca ID do Projeto
		public function buscaProjeto($id_pedido) {
			$registros = $this->db->prepare("SELECT * FROM tb_pedidos WHERE id = '".$id_pedido."'");
			$registros->execute();
			$retorno = $registros->fetch();
			return $retorno['id_usuario'];
		}

		# Upload do Arquivo
		public function uploadArquivo($arquivo){
			if (!empty($arquivo["name"])){ 
				$file_name= $arquivo["name"];
				$file_name = $this->functions->strip_special_chars($file_name);
				move_uploaded_file($arquivo["tmp_name"], $arquivo["pasta"].$file_name);
				return $file_name;
			}
		}

		# Salva no banco
		public function salvaRegistro($tabela,$dados,$operacoes,$redirect = false){
			# ARQUIVOS
			if(isset($_FILES) && count($_FILES) > 0):
				foreach($_FILES as $name => $arquivo):
					if($arquivo['tmp_name'] <> '')
						$dados[$name] = $this->uploadArquivo($arquivo);
				endforeach;
			endif;
			# VALIDA DADOS
			if(!empty($dados[$this->campoID])):
				# UPDATE
				$query = "UPDATE ".$tabela." SET ";
				foreach($dados as $campo => $valor):
					if($campo <> $this->campoID && $campo <> 'acao_form' && $campo <> 'tabela_form' && $campo <> 'salvar'):
						if($campo == 'senha'):
							$query .= $campo." = '".$this->functions->_encode($valor)."', ";
						else:
							$query .= $campo." = '".$valor."', ";
						endif;
					elseif($campo == $this->campoID):
						$id = $valor;
					endif;
				endforeach;
				$query = substr($query,0,-2);
				$query .= " WHERE ".$this->campoID." = '".$id."'";
				$execute = $this->db->prepare($query);
			else:
				# INSERT
				$campos = ""; $valores = "";
				$query = "INSERT INTO ".$tabela." (";
				foreach($dados as $campo => $valor):
					if($campo <> 'acao_form' && $campo <> 'tabela_form' && $campo <> 'salvar' && $campo <> 'deletar'):
						$campos .= $campo.",";
						if($campo == 'senha'):
							$valores .= "'".$this->functions->_encode($valor)."',";
						else:
							$valores .= "'".$valor."',";
						endif;
					endif;
				endforeach;
				$campos = substr($campos,0,-1);
				$valores = substr($valores,0,-1);
				$query .= $campos.") VALUES (".$valores.")";
				$execute = $this->db->prepare($query);
			endif;
			#echo $query;
			# EXECUTA
			if($execute->execute()):
				# Pedidos
				if($tabela == 'tb_pedidos' && empty($dados[$this->campoID])):
					$id_pedido = $this->db->lastInsertId();
					$this->executa("INSERT INTO ped_fiscal (id_pedido) VALUES ('".$id_pedido."')");
					$this->executa("INSERT INTO ped_logistica (id_pedido) VALUES ('".$id_pedido."')");
					$this->executa("INSERT INTO ped_acompanhamento (id_pedido) VALUES ('".$id_pedido."')");
				endif;
				#$this->functions->redireciona($this->controller."/listar");
				$this->functions->msgSucesso("O registro foi atualizado com sucesso. O que deseja fazer agora?",$operacoes);
				if($redirect):
					if($tabela == 'tb_pedidos')
						header("Location: ".$redirect.'/'.$this->db->lastInsertId());
					else
						header("Location: ".$redirect);
				endif;
				exit;
			else:
				$this->functions->msgErro("Ocorreu um erro. <a href='".$_SERVER['HTTP_REFERER']."' style='text-decoration:underline;'>Tente novamente</a>.");
				exit;
			endif;
		}

		# Deleta do banco
		public function deletaRegistro($tabela,$dados,$operacoes){
			$query = "DELETE FROM ".$tabela." WHERE ".$this->campoID." = '".$dados[$this->campoID]."'";
			$execute = $this->db->prepare($query);
			# EXECUTA
			if($execute->execute()):
				$this->functions->msgSucesso("O registro foi deletado com sucesso. O que deseja fazer agora?",$operacoes);
				exit;
			else:
				$this->functions->msgErro("Ocorreu um erro. <a href='".$_SERVER['HTTP_REFERER']."' style='text-decoration:underline;'>Tente novamente</a>.");
				exit;
			endif;
		}

		# Busca número de Contatos
		public function trazQtdContato(){
	        $resultado = $this->db->prepare("SELECT MAX(numero) FROM (SELECT count(*) as 'numero' FROM compl_colegios_contatos GROUP BY id_colegio) AS maximo");
	        $resultado->execute();
	        $retorno = $resultado->fetchAll();
	        return $retorno[0]['MAX(numero)'];
		}

		# Busca número de Equipamentos Liberados
		public function trazQtdEquipLib($where){
	        $resultado = $this->db->prepare("SELECT MAX(numero) FROM (SELECT count(*) as 'numero' FROM vw_equipamentos_liberados ".$where." GROUP BY id) AS maximo");
	        $resultado->execute();
	        $retorno = $resultado->fetchAll();
	        return $retorno[0]['MAX(numero)'];
		}

		# Busca número de Equipamentos Solicitados
		public function trazQtdEquipSol($where){
	        $resultado = $this->db->prepare("SELECT MAX(numero) FROM (SELECT count(*) as 'numero' FROM vw_equipamentos_solicitados ".$where." GROUP BY id) AS maximo");
	        $resultado->execute();
	        $retorno = $resultado->fetchAll();
	        return $retorno[0]['MAX(numero)'];
		}

		# Busca número de Parceiros
		public function trazQtdParceiros($where){
	        $resultado = $this->db->prepare("SELECT MAX(numero) FROM (SELECT count(*) as 'numero' FROM vw_parceiros ".$where." GROUP BY id) AS maximo");
	        $resultado->execute();
	        $retorno = $resultado->fetchAll();
	        return $retorno[0]['MAX(numero)'];
		}
	}
?>