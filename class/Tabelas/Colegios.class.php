<?php 
	namespace Tabelas;
	
	class Colegios extends BaseTabelas {
		# Variáveis
		public $titulo = "Colégios";
		public $controller = "colegios";
		public $campos = array(
			"id" => array(
				"titulo" => "ID",
				"tipo" => array("input","text")
			),
			"id_projeto"  => array(
				"titulo" => "Projeto",
				"tipo" => array("select","tabela" => "tb_usuarios", "tabelaID" => "id", "tabelaTexto" => "nome", "tabelaCampo" => "id_projeto", "condicao" => "WHERE tipo = '1'")
			),
			"sistema" => array(
				"titulo" => "Sistema",
				"tipo" => array("input","text")
			),
			"nome_colegio" => array(
				"titulo" => "Nome do Colégio",
				"tipo" => array("input","text")
			),
			"cnpj"  => array(
				"titulo" => "CNPJ",
				"tipo" => array("input","text")
			),
			"razao_social"  => array(
				"titulo" => "Razão Social",
				"tipo" => array("input","text")
			),
			"data_liberacao" => array(
				"titulo" => "Data da Liberação",
				"tipo" => array("input","date")
			),
			"inicio_aulas" => array(
				"titulo" => "Inicio das Aulas",
				"tipo" => array("input","date")
			),
			"uf" => array(
				"titulo" => "UF",
				"tipo" => array("input","text")
			),
			"cidade" => array(
				"titulo" => "Cidade",
				"tipo" => array("input","text")
			),
			"cep" => array(
				"titulo" => "CEP",
				"tipo" => array("input","text")
			),
			"endereco" => array(
				"titulo" => "Endereço",
				"tipo" => array("input","text")
			),
			"email" => array(
				"titulo" => "E-mail",
				"tipo" => array("input","email")
			)
		);

		# Funções
		public function __construct($db,$functions,$_USER){
			parent::__construct($db,$functions,$_USER);
			parent::defineTabela("tb_colegios","id");
		}
	}
?>