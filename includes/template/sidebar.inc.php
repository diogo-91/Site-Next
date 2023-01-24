<?php 
    # Se não for ADMIN
    if($_USER['tipo'] <> 2):
        # Busca vinculos do usuário
        $resultado = $db->prepare("SELECT * FROM compl_usuarios_projetos WHERE id_usuario = :id_usuario GROUP BY id_projeto");
        $resultado->bindParam(':id_usuario', $_USER['id']);
        $resultado->execute();
        $vinculo = $resultado->fetchAll();
        # Forma query
        $query = "";
        foreach($vinculo as $vinc):
            if($query <> '') $query .= " OR ";
            $query .= "id_usuario = '".$vinc['id_projeto']."'";
        endforeach;
        $compl = " AND (".$query.")";
    else:
        $compl = "";
    endif;
?>

<!-- SIDEBAR -->
<sidebar class="page-menu clearfix">
    <header>Filtro por Período</header>
    <?php $objeto = new Tabelas\Pedidos($db,$functions,$_USER); ?>
    <ul>
        <?php 
            # Filtros
            $filtros[] = array("hoje","Hoje","WHERE DATE(data_criacao) = DATE(NOW())".$compl);
            $filtros[] = array("ontem","Ontem","WHERE DATE(data_criacao) = SUBDATE(NOW(),1)".$compl);
            $filtros[] = array("ultimos-7-dias","Últimos 7 dias","WHERE data_criacao BETWEEN NOW() - INTERVAL 7 DAY AND NOW()".$compl);
            $filtros[] = array("mes-atual","Mês atual","WHERE YEAR(data_criacao) = YEAR(NOW()) AND MONTH(data_criacao) = MONTH(NOW())".$compl);
            # Menu
            foreach($filtros as $filtro):
                # Busca quantidade
                $registros = $objeto->trazRegistros("*",$filtro[2],"ASC",false);
                if($registros && is_array($registros)):
                    $quantidade = count($registros);
                else:
                    $quantidade = 0;
                endif;
                # Exibe o filtro
                echo '<a href="filtro='.$filtro[0].'"><li>'.$filtro[1].' ('.$quantidade.')</li></a>';
            endforeach;
        ?>
    </ul>

    <header>Status</header>
    <ul>
        <?php 
            $objeto = new Tabelas\Pedidos_Status($db,$functions,$_USER); 
            $registros = $objeto->trazRegistros("*","","ASC");
            if($registros && is_array($registros)):
                foreach($registros as $registro):
                    $quantidade = 0;
                    $objeto_ped = new Tabelas\Pedidos_Acompanhamento($db,$functions,$_USER); 
                    $registros_ped = $objeto_ped->trazRegistros("*","WHERE status_geral = '".$registro['id']."'","ASC");
                    if($registros_ped && is_array($registros_ped)):
                        foreach($registros_ped as $registro_ped):
                            $objeto_ped_cada = new Tabelas\Pedidos($db,$functions,$_USER); 
                            $registros_ped_cada = $objeto_ped_cada->trazRegistros("*","WHERE id = '".$registro_ped['id_pedido']."'".$compl,"ASC");
                            #echo "WHERE id = '".$registro_ped['id_pedido']."'".$compl;
                            if($registros_ped_cada && is_array($registros_ped_cada)):
                                $quantidade++;
                            endif;
                        endforeach;
                    endif;
                    echo '<a href="status='.$registro['id'].'"><li>'.$registro['titulo'].' ('.$quantidade.')</li></a>';
                endforeach;
            endif;
        ?>
    </ul>

    <!--
    <header>Parceiros</header>
    <ul>
        <?php 
            $objeto = new Tabelas\Parceiros($db,$functions,$_USER); 
            $registros = $objeto->trazRegistros("*","","ASC");
            if($registros && is_array($registros)):
                foreach($registros as $registro):
                    $objeto_ped = new Tabelas\Pedidos_Parceiros($db,$functions,$_USER); 
                    $registros_ped = $objeto_ped->trazRegistros("*","WHERE id_parceiro = '".$registro['id']."'".$compl,"ASC");
                    if($registros_ped && is_array($registros_ped)):
                        $quantidade = count($registros_ped);
                    else:
                        $quantidade = 0;
                    endif;
                    echo '<a href="parceiro='.$registro['id'].'"><li>'.$registro['empresa'].' ('.$quantidade.')</li></a>';
                endforeach;
            endif;
        ?>
    </ul>
    -->
</sidebar>  