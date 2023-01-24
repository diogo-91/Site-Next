<?php
    ob_start();
    include 'seguranca.php'; // Inclui o arquivo com o sistema de segurança
    protegePagina(); // Chama a função que protege a página

    require 'editar/configuracoes.inc.php';
    require 'functions/db_connect.inc.php';
?>
<!doctype html>
<html lang="pt">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="tema/css/neon.css" id="style-resource-5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <style>
        .main {
            position: relative;
            margin: 30px auto 0;
            max-width: 900px;
        }
        .erro {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 20px;
            text-align: center;
        }
        .alert {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
            padding: 20px;
            text-align: center;
        }
        .ok {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            padding: 20px;
            text-align: center;
        }

        ol {
            border: solid 1px #ebebeb;
            padding: 0;
            margin: 50px 0 0;
            list-style: none;
        }
        ol li {
            background: #fff;
            padding: 0;
            position: relative;
            transition: all 0.2s ease-out;
        }
        ol h3 {
            font-size: 1.125rem;
            margin: 0;
            padding: 20px;
            color: #6f7077;
            font-weight: 800;
            cursor: pointer;
            border-bottom: solid 1px #ebebeb;
            transition: all 0.2s ease-out;
        }
        ol li.active h3,
        ol li:hover h3 {
            color: #40454b;
            background: #f0f0f1;
        }
        ol h3 i.open {
            color: #40454b;
            font-size: 1rem;
            position: absolute;
            top: 20px;
            right: 10px;
        }
        ol h3 i.icon {
            width: 30px;
            display: inline-block;
        }
        ol .text {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.2s ease-out;
            border-bottom: solid 1px #ebebeb;
        } 
        ol li:last-child .text {
            border: none;
        }
        ol p {
            font-size: 1rem;
            margin: 0;
            padding: 20px;
            line-height: 1.8;
        }
        ol li.active .text {
            max-height: 200px;
            overflow: auto;
            opacity: 1;
        }

        .return {
            padding: 50px 0;
            text-align: center;
        }
        .return a {
            color: #3aa8f5;
            font-size: 14px;
            transition: all 0.2s ease-out;
        }
        .return a:hover {
            color: #0072c1
        }
    </style>
</head>
<body>
    <div class="main">

    <?php

    $change_id = md5(date('Y-m-d_H:i:s').rand(0, 9999));

    $vars = [
        'partnumber' => 'part_number',
        'description' => 'nome1',
        'name' => 'nome2',
        'mfg' => 'marca',
        'model' => 'modelo',
        'qty' => 'quantidade',
        'category' => 'subcategoria',
        'pricebr' => 'valor',
        'image1' => 'imagem1',
        'image2' => 'imagem2',
        'image3' => 'imagem3',
    ];

    $x = 0;
    $erro = null;
    $data = [];
    $lines = [];
    $titles = [];
    $total_columns = 0;

    if ( isset($_FILES['csv-file']) ) {

        $file = fopen($_FILES['csv-file']['tmp_name'], 'r');
        
        while (($line = fgetcsv($file)) !== false) {
            $line[0] = str_replace(',','.',$line[0]);

            if (!empty(trim($line[0]))) {
                $values = explode(';', $line[0]);

                if ($x == 0) {
                    foreach ($values as $k => $configs) {
                        $array = strtolower(str_replace(['%EF%BB%BF', ' ', '+'], '', urlencode(trim($configs))));
                        $data[$k] = $array;
                        $titles[$k] = $configs;
                    }

                    $total_columns = count($data);

                    // if (!in_array('partnumber', $data)) {
                    //     $erro = 'Coluna Part Number é obrigatória';
                    //     break;
                    // }
                } else {
                    // if ($total_columns != count($values)) {
                    //     $erro = 'Valor inválido na linha '.$x.' da coluna '.$titles[count($values) - 1];
                    //     break;
                    // }

                    foreach ($values as $k => $value){
                        if (isset($vars[$data[$k]])) {
                            $lines[$x][$data[$k]] = $value;
                        }
                    }
                }

                ++$x;
            }
        }


        fclose($file);
        

        //SE NAO HOUVER ERRO
        if (empty($erro)) {
            $returns = [
                'atualizado' => [],
                'cadastrado' => [],
                'negado' => [],
            ];

            $total = count($lines);
            for ($x = 1; $x < $total; $x++) {

                //CATEGORIA
                $category_id = 1; // Outros

                $line_category = utf8_encode($lines[$x]['category']);

                if (!empty($line_category)) {
                    $categ = mysqli_query($_SG['link'],'SELECT id FROM produtos_subcategorias WHERE nome = "'.$line_category.'" LIMIT 1');
                    if (mysqli_num_rows($categ) == 1) {
                        // echo 'entrou 1<br>';
                        $category = mysqli_fetch_assoc($categ);
                        $category_id = $category['id'];
                    } else {
                        // echo 'entrou 2<br>';
                        mysqli_query($_SG['link'],'INSERT INTO produtos_subcategorias (categoria, nome) VALUES (1, "'.$line_category.'")');
                        $category_id = mysqli_insert_id($_SG['link']);
                    }
                }

                // echo 'linha: '.$x.'<br>';
                // echo 'category_id: '.$category_id.'<br>';
                $subcategoria_id = $category_id;

                $query = mysqli_query($_SG['link'],'SELECT id FROM produtos WHERE part_number = "'.$lines[$x]['partnumber'].'" LIMIT 1') or die(mysqli_error());


                //ATUALIZA
                if (mysqli_num_rows($query) == 1) {
                    $row = mysqli_fetch_assoc($query);

                    $update = [];
                    $update[] = 'subcategoria = "'.$subcategoria_id.'"';
                    $update[] = 'status = 1';
                    $update[] = 'change_id = "'.$change_id.'"';
                    foreach ($vars as $index => $column) {
                        if($column<>'category' && $column<>'subcategoria'){
                            if (isset($lines[$x][$index]) && trim($lines[$x][$index]) != '') {
                                $update[] = $column.' = "'.$lines[$x][$index].'"';
                            }
                        }
                    }

                    mysqli_query($_SG['link'],'UPDATE produtos 
                                    SET '.implode(',', $update).', subcategoria = '.$subcategoria_id.'
                                  WHERE id = "'.$row['id'].'" 
                                  LIMIT 1');

                    if (mysqli_affected_rows() == 1) {
                        $returns['atualizado'][] = 'Linha '.$x.' - ('.$lines[$x]['partnumber'].') - Atualizado';
                    } else {
                        $returns['erro'][] = 'Linha '.$x.' - Não foi possível atualizar ('.mysqli_error().')';
                    }
                }


                //CADASTRO
                else {
                    if (empty($lines[$x]['partnumber'])) {
                        $returns['erro'][] = 'Linha '.$x.' - Não informado Part Number';
                    } elseif (empty($lines[$x]['description'])) {
                        $returns['erro'][] = 'Linha '.$x.' - Não informado Description';
                    } else {

                        $pricebr2 = (float) $lines[$x]['pricebr'];
                        $pricebr2 = str_replace(',','.',$pricebr2);

                        $insert = mysqli_query($_SG['link'],"INSERT INTO produtos (
                            part_number, 
                            quantidade, 
                            imagem1, 
                            imagem2, 
                            imagem3, 
                            subcategoria, 
                            nome1, 
                            nome2, 
                            marca, 
                            modelo, 
                            valor,
                            change_id
                        ) 
                        VALUES (
                            '".$lines[$x]['partnumber']."',
                            '".(int) $lines[$x]['qty']."',
                            '".$lines[$x]['image1']."',
                            '".$lines[$x]['image2']."',
                            '".$lines[$x]['image3']."',
                            '".$category_id."',
                            '".$lines[$x]['description']."',
                            '".((!empty($lines[$x]['name'])) ? $lines[$x]['name'] : $lines[$x]['description'])."',
                            '".$lines[$x]['mfg']."',
                            '".$lines[$x]['model']."',
                            '".$pricebr2."',
                            '".$change_id."'
                        )");

                        if ($insert) {
                            $returns['cadastrado'][] = 'Linha '.$x.' - ('.$lines[$x]['partnumber'].') '.$lines[$x]['description'].' - Cadastrado';
                        } else {
                            $returns['erro'][] = 'Linha '.$x.' - Não foi possível cadastrar ('.mysqli_error().')';
                        }
                    }
                }

                
            }

            $inactive = mysqli_query($_SG['link'],'UPDATE produtos SET status = 0 WHERE change_id != "'.$change_id.'" OR change_id IS NULL');
            $inactives = mysqli_affected_rows();

            echo '<div class="ok">Processo realizado com sucesso!</div>
            <ol class="questions">
                <li>
                    <h3><i class="fa fa-check icon" style="color: #00a651;"></i> Produtos cadstrados ('.number_format(count($returns['cadastrado']), 0, '', '.').') <i class="fa fa-plus open"></i></h3>
                    <div class="text">
                    <p>';

            if (count($returns['cadastrado']) > 0) {
                foreach ($returns['cadastrado'] as $prod) {
                    echo $prod.'<br>';
                }
            } else {
                echo 'Nenhum produto cadastro';
            }

            echo '</p>
                    </div>
                </li>
                <li>
                    <h3><i class="fa fa-exchange-alt icon" style="color: #0072bc;"></i> Produtos atualizados ('.number_format(count($returns['atualizado']), 0, '', '.').') <i class="fa fa-plus open"></i></h3>
                    <div class="text">
                    <p>';

            if (count($returns['atualizado']) > 0) {
                foreach ($returns['atualizado'] as $prod) {
                    echo $prod.'<br>';
                }
            } else {
                echo 'Nenhum produto atualizado';
            }

            echo '</p>
                    </div>
                </li>
                <li>
                    <h3><i class="fa fa-times icon" style="color: #d42020;"></i> Produtos não cadastrados / atualizados ('.number_format(count($returns['negado']), 0, '', '.').') <i class="fa fa-plus open"></i></h3>
                    <div class="text">
                    <p>';

            if (count($returns['negado']) > 0) {
                foreach ($returns['negado'] as $prod) {
                    echo $prod.'<br>';
                }
            } else {
                echo 'Nenhum produto com problema';
            }

            echo '</p>
                    </div>
                </li>
                <li>
                    <h3><i class="fa fa-exclamation icon" style="color: #d4ac20;"></i> Produtos inativos ('.number_format($inactives, 0, '', '.').') <i class="fa fa-plus open"></i></h3>
                    <div class="text">';

            if ($inactives > 0) {
                echo '<p>Encontramos '.$inactives.' produtos no banco de dados que não estavam na lista, por esse motivo removidos da lista de ativos</p>';
            } else {
                echo '<p>Nenhum produto foi atualizada para a lista de inativos</p>';
            }

            echo '</div>
                </li>
            </ol>';
        } else {
            echo '<div class="erro">'.$erro.'</div>';
        }

    } else {
        echo '<div class="erro">É necessário que envie um arquivo no formato .CSV</div>';
    }

    ?>

    <div class="return">
        <a href="/admin/?m=produtos&t=listar">
            <i class="fa fa-arrow-left"></i> Retornar a lista de produtos
        </a>
    </div>

    </div>
    <script>
    let open = document.querySelectorAll('ol li h3');
    let total = open.length;

    for(i=0; i<total; i++) {
        open[i].addEventListener('click', function() {
            openQuestion(this);
        });
    }
    const openQuestion = (el) => {
        let inactive = document.querySelector('ol li.active');
        if(inactive) {
            inactive.classList.remove('active');
            inactive.querySelector('h3 i.fa-minus').className = 'fa fa-plus open';
        }
        if(el.parentNode != inactive) {
            el.parentNode.classList.add('active');
            el.querySelector('i.fa-plus').className = 'fa fa-minus open';
        }
    }
    </script>
</body>
</html>