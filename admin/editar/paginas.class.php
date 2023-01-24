<?php

    class Paginas
    {
        // Variáveis

        public $tabela;
        public $icone;
        public $titulo;
        public $campoID;
        public $campos;
        public $aviso = false;

        // Paginas do Menu sem nível de acesso

        public $paginas_menu = array(
            'home_banners',
            'sobre',
            array('Produtos', 'produtos', 'produtos_categorias', 'produtos_subcategorias'),
            'servicos',
            'noticias',

            'newsletter',
            'representantes',
            'emails_orcamentos',

            'adm_usuarios', 'seo',
        );

        // PÁGINAS POR NÍVEL DE ACESSO

        // public $paginas_menu;

        // function setPaginasMenu($array){

        // 	$this->paginas_menu = $array;

        // }

        // Páginas

        public function __construct($pagina)
        {
            // PÁGINAS POR NÍVEL DE ACESSO

            // $nivel = $_SESSION['usuarioNivel'];

            // if($nivel==0):

            // 	$this->setPaginasMenu(array('animes','posts','usuarios','links'));

            // elseif($nivel==1):

            // 	$this->setPaginasMenu(array('animes','posts'));

            // endif;

            switch ($pagina):

                // case 'nome_da_tabela':

                // 	$this->tabela = "nome_da_tabela";

                //   $this->icone = "<i class='entypo-layout'></i>";

                // 	$this->titulo = "Titulo da Tabela";

                // 	$this->campoID = "id";

                //	$this->operacoes = array('inserir','listar','editar','deletar');

                //	$this->listar = array('id','campo01','campo02','campo03','select'=>array('tabela','titulo','id'),'acao'=>array('editar','deletar'));

                // 	$this->campos = array(

                // 		"input(text/number/input-preco/input-block)" => array('Nome','input',255,'Nome','text'),

                // 		"select" => array('Selecione','select','tabela','id','nome'),

                //       "select-multi" => array('Selecione','select','tabela','id','nome',true),

                // 		"upload-imagem" => array('Imagem','upload-img','../assets/images/',false,false),

                //		"upload-arquivo" => array('Arquivo','upload-file','../assets/images/'),

                //		"textarea/textarea2" => array('Texto','textarea',false,'Texto'),

                //		"data" => array('Data','date','Data'),

                //		"radiobutton" => array('Opção','radio', array('0' => 'Sim', '1' => 'Não')),

                //		"imagem" => array('Imagem','upload-img','../assets/images/',false,false,'thumb'=>array(270,270,'../assets/images/','thumb'))

                // 	);

                // break;

                case 'adm_usuarios':

                    $this->icone = "<i class='entypo-users'></i>";

            $this->titulo = 'Usuários';

            $this->tabela = 'adm_usuarios';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'nome', 'usuario', 'nivel', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'nome' => array('Nome', 'input', 255, 'Nome', 'text'),

                        'usuario' => array('Usuario', 'input', 255, 'Usuario', 'text'),

                        'senha' => array('Senha', 'input', 255, 'Senha', 'text'),

                        'nivel' => array('Nivel', 'input', 255, 'Nivel', 'text'),

                        'datetime' => array('Datetime', 'datetime', 255, 'datetime', 'text'),
                    );

            break;

            case 'seo':

                    $this->icone = "<i class='entypo-search'></i>";

            $this->titulo = 'SEO';

            $this->tabela = 'seo';

            $this->campoID = 'id';

            $this->operacoes = array('listar', 'editar');

            $this->listar = array('id', 'keywords', 'titulo_site', 'descricao_site', 'imagem_facebook', 'favicon', 'acao' => array('editar'));

            $this->campos = array(
                        'favicon' => array('Logotipo', 'upload-img', '../assets/images/', false, false),

                        'imagem_facebook' => array('Imagem', 'upload-img', '../assets/images/', false, false),

                        'titulo_site' => array('Titulo Site', 'input', 255, 'Titulo Site', 'text'),

                        'descricao_site' => array('Descricao Site', 'input', 255, 'Descricao Site', 'text'),

                        'keywords' => array('Keywords', 'input', 255, 'Keywords', 'text'),
                    );

            break;

            case 'emails_orcamentos':
                    $this->titulo = 'E-mails Orçamentos';
            $this->tabela = 'emails_orcamentos';
            $this->campoID = 'id';
            $this->operacoes = array('listar', 'editar');
            $this->listar = array('id', 'nome', 'telefone', 'observacao', 'email', 'empresa', 'retorno', 'produto', 'acao' => array('editar'));
            $this->campos = array(
                        'nome' => array('Nome', 'input', 255, 'Nome', 'text'),
                        'telefone' => array('Telefone', 'input', 255, 'Telefone', 'text'),
                        'observacao' => array('Observacao', 'input', 255, 'Observacao', 'text'),
                        'email' => array('Email', 'input', 255, 'Email', 'text'),
                        'empresa' => array('Empresa', 'input', 255, 'Empresa', 'text'),
                        'retorno' => array('Retorno', 'input', 255, 'Retorno', 'text'),
                        'produto' => array('Produto', 'textarea', false, 'Produto'),
                    );
            break;

            case 'home_banners':

                    $this->titulo = 'Banners Home';

            $this->tabela = 'home_banners';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'imagem', 'imagem_mobile', 'titulo', 'texto', 'btn_cor', 'btn_texto', 'btn_link', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'imagem' => array('Imagem', 'upload-img', '../assets/images/', false, false),

                        'imagem_mobile' => array('Imagem Mobile', 'upload-img', '../assets/images/', false, false),

                        'titulo' => array('Titulo', 'input', 255, 'Titulo', 'text'),

                        'titulo_cor' => array('Cor do Titulo em Hexadecimal', 'input', 255, 'Cor do Titulo em Hexadecimal... #FFFFFF', 'text'),

                        'texto' => array('Texto', 'textarea', false, 'Digite aqui o Texto'),

                        'texto_cor' => array('Cor do Texto em Hexadecimal', 'input', 255, 'Cor do Texto em Hexadecimal... #000000'),

                        'btn_cor' => array('Cor do Botão em Hexadecimal', 'input', 255, 'Cor do Botão em Hexadecimal... #000000'),

                        'btn_texto' => array('Texto do botão', 'input', 255, 'Btn Texto', 'text'),

                        'btn_link' => array('Link do botão', 'input', 255, 'Btn Link', 'text'),
                    );

            break;

            case 'newsletter':

                    $this->titulo = 'Newsletter';

            $this->tabela = 'newsletter';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'nome', 'email', 'data', 'ip', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'nome' => array('Nome', 'input', 255, 'Nome', 'text'),

                        'email' => array('Email', 'input', 255, 'Email', 'text'),

                        'data' => array('Data', 'input', 255, 'Data', 'text'),

                        'ip' => array('Ip', 'input', 255, 'Ip', 'text'),
                    );

            break;

            case 'noticias':

                    $this->titulo = 'Noticias';

            $this->tabela = 'noticias';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'titulo', 'data', 'imagem', 'texto', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'titulo' => array('Titulo', 'input', 255, 'Titulo', 'text'),

                        'data' => array('Data', 'date', 'Data'),

                        'imagem' => array('Imagem', 'upload-img', '../assets/images/', false, false),

                        'texto' => array('Texto', 'textarea', false, 'Digite aqui o Texto'),

                        'foto1' => array('Foto 1', 'upload-img', '../assets/images/', false, false),

                        'foto2' => array('Foto 2', 'upload-img', '../assets/images/', false, false),

                        'foto3' => array('Foto 3', 'upload-img', '../assets/images/', false, false),

                        'foto4' => array('Foto 4', 'upload-img', '../assets/images/', false, false),

                        'foto5' => array('Foto 5', 'upload-img', '../assets/images/', false, false),

                        'foto6' => array('Foto 6', 'upload-img', '../assets/images/', false, false),

                        'foto7' => array('Foto 7', 'upload-img', '../assets/images/', false, false),

                        'foto8' => array('Foto 8', 'upload-img', '../assets/images/', false, false),
                    );

            break;

            case 'produtos':

                    $this->titulo = 'Produtos';

            $this->tabela = 'produtos';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'part_number', 'imagem1', 'imagem2', 'imagem3', 'nome1', 'nome2', 'marca', 'modelo', 'status', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'part_number' => array('Part Number', 'input', 50, 'Part Number', 'text'),

                        'imagem1' => array('Imagem Principal', 'upload-img', '../assets/images/', false, false),

                        'imagem2' => array('Imagem 2', 'upload-img', '../assets/images/', false, false),

                        'imagem3' => array('Imagem 3', 'upload-img', '../assets/images/', false, false),

                        'subcategoria' => array('Subcategoria', 'select', 'produtos_subcategorias', 'id', 'nome'),

                        'nome1' => array('Nome 1', 'input', 255, 'Nome1', 'text'),

                        'nome2' => array('Nome 2', 'input', 255, 'Nome2', 'text'),

                        'marca' => array('Marca', 'input', 255, 'Marca', 'text'),

                        'modelo' => array('Modelo', 'input', 255, 'Modelo', 'text'),

                        'descricao' => array('Descricao', 'textarea', false, 'Digite aqui o Descricao'),

                        'basico' => array('Básico', 'textarea', false, 'Digite aqui o Descricao'),

                        'intermediario' => array('Intermediário', 'textarea', false, 'Digite aqui o Descricao'),

                        'avancado' => array('Avançado', 'textarea', false, 'Digite aqui o Descricao'),

                        'status' => array('Status', 'radio', array('0' => 'Inativo', '1' => 'Ativo')),
                    );

            break;

            case 'produtos_categorias':

                    $this->titulo = 'Categorias';

            $this->tabela = 'produtos_categorias';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'nome', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'nome' => array('Nome', 'input', 255, 'Nome', 'text'),
                    );

            break;

            case 'produtos_subcategorias':

                    $this->titulo = 'Subcategorias';

            $this->tabela = 'produtos_subcategorias';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'categoria' => array('produtos_categorias', 'nome', 'id'), 'nome', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'categoria' => array('Categoria', 'select', 'produtos_categorias', 'id', 'nome'),

                        'nome' => array('Nome', 'input', 255, 'Nome', 'text'),
                    );

            break;

            case 'representantes':

                    $this->titulo = 'Representantes';

            $this->tabela = 'representantes';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'estado', 'titulo', 'texto', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'estado' => array('Estado', 'input', 255, 'Estado', 'text'),

                        'titulo' => array('Titulo', 'input', 255, 'Titulo', 'text'),

                        'texto' => array('Texto', 'textarea', false, 'Digite aqui o Texto'),
                    );

            break;

            case 'servicos':

                    $this->titulo = 'Servicos';

            $this->tabela = 'servicos';

            $this->campoID = 'id';

            $this->operacoes = array('inserir', 'listar', 'editar', 'deletar');

            $this->listar = array('id', 'posicao', 'slug', 'icone', 'titulo', 'resumo', 'descricao', 'video', 'conteudo_titulo', 'conteudo_texto', 'acao' => array('editar', 'deletar'));

            $this->campos = array(
                        'icone' => array('Icone', 'upload-img', '../assets/images/', false, false),

                        'video_imagem' => array('Vídeo Imagem', 'upload-img', '../assets/images/', false, false),

                        'video_link' => array('Vídeo Link do YouTube', 'input', 255, 'Vídeo Link do YouTube', 'text'),

                        'posicao' => array('Posição', 'input', 255, 'Posição', 'text'),

                        'titulo' => array('Titulo', 'input', 255, 'Titulo', 'text'),

                        'slug' => array('Slug', 'input', 255, 'Slug', 'text'),

                        'resumo' => array('Resumo', 'textarea', false, 'Digite aqui o Resumo'),

                        'descricao' => array('Descricao', 'textarea', false, 'Digite aqui o Descricao'),

                        'video' => array('Video', 'input', 255, 'Video', 'text'),

                        'conteudo_titulo' => array('Conteudo Titulo', 'input', 255, 'Conteudo Titulo', 'text'),

                        'conteudo_texto' => array('Conteúdo Texto', 'textarea', false, 'Digite aqui o Descricao'),
                    );

            break;

            case 'sobre':

                    $this->titulo = 'Sobre';

            $this->tabela = 'sobre';

            $this->campoID = 'id';

            $this->operacoes = array('listar', 'editar');

            $this->listar = array('id', 'video', 'historia', 'missao', 'visao', 'valores', 'acao' => array('editar'));

            $this->campos = array(
                        'video' => array('Video', 'input', 255, 'Video', 'text'),

                        'historia' => array('História', 'textarea', false, 'Digite aqui a História'),

                        'missao' => array('Missão', 'textarea', false, 'Digite aqui a Missão'),

                        'visao' => array('Visão', 'textarea', false, 'Digite aqui a Visão'),

                        'valores' => array('Valores', 'textarea', false, 'Digite aqui os Valores'),
                    );

            break;

            endswitch;
        }
    }
