<?php
    header('Content-Type: text/plain');
    require '../editar/configuracoes.inc.php';
    require '../functions/db_connect.inc.php';

    $paginas_menu = "";
    $sql_table = mysql_query("SHOW TABLES");
    while($row_table = mysql_fetch_array($sql_table)):
        $campos = "";
        $tabela = $row_table[0];
        $paginas_menu = $paginas_menu."'".$tabela."',";
        echo "case '".$tabela."':";

        echo "\n\t".'$this->titulo = "'.ucfirst($tabela).'";';
        echo "\n\t".'$this->tabela = "'.$tabela.'";';

        $sql_coluna_p = mysql_query("SHOW KEYS FROM $tabela WHERE Key_name = 'PRIMARY'");
        $row_coluna_p = mysql_fetch_array($sql_coluna_p);
        $campo_id = $row_coluna_p['Column_name'];
        echo "\n\t".'$this->campoID = "'.$row_coluna_p['Column_name'].'";';
        echo "\n\t".'$this->operacoes = array(\'inserir\',\'listar\',\'editar\',\'deletar\');';

        $sql_coluna2 = mysql_query("SHOW COLUMNS FROM $tabela WHERE Field <> '$campo_id'");
        echo "\n\t".'$this->listar = array(\'id\',';
        while($row_coluna2 = mysql_fetch_array($sql_coluna2)):
            echo "'".$row_coluna2['Field']."',";
        endwhile;
        echo "'acao'=>array('editar','deletar'));";
        

        echo "\n\t".'$this->campos = array(';
        $sql_coluna = mysql_query("SHOW COLUMNS FROM $tabela WHERE Field <> '$campo_id'");
        while($row_coluna = mysql_fetch_array($sql_coluna)):
            if($row_coluna['Field']=='texto' || $row_coluna['Field']=='descricao'){
                $campos = $campos."\n\t\t\"".$row_coluna['Field']."\" => array('".ucwords(strtolower(str_replace('_',' ',$row_coluna['Field'])))."','textarea',false,'Digite aqui o ".ucwords(strtolower(str_replace('_',' ',$row_coluna['Field'])))."'),";
            }elseif($row_coluna['Field']=='imagem' || $row_coluna['Field']=='banner' || $row_coluna['Field']=='icone' || $row_coluna['Field']=='icon' || $row_coluna['Field']=='foto'){
                $campos = $campos."\n\t\t\"".$row_coluna['Field']."\" => array('".ucwords(strtolower(str_replace('_',' ',$row_coluna['Field'])))."','upload-img','../assets/uploads/',false,false),";
            }else{
               $campos = $campos."\n\t\t\"".$row_coluna['Field']."\" => array('".ucwords(strtolower(str_replace('_',' ',$row_coluna['Field'])))."','input',255,'".ucwords(strtolower(str_replace('_',' ',$row_coluna['Field'])))."','text'),";
            }
        endwhile;
        echo substr($campos,0,-1);
        echo "\n\t".');';
        echo "\n".'break;'."\n\n";
    endwhile;

    echo $paginas_menu;

    # case 'categoria_empreendimento':
    #   $this->tabela = "categoria_empreendimento";
    #   $this->titulo = "Categoria dos Empreendimentos";
    #   $this->campoID = "id";
    #   $this->operacoes = array('inserir','listar','editar','deletar');
    #   $this->listar = array('id','titulo','porcentagem','id_empreendimento'=>array('empreendimentos','titulo','id'),'acao'=>array('editar','deletar'));
    #   $this->campos = array(
    #       "titulo" => array('input',255,'placeholder','type')
    #   );
    # break;
?>