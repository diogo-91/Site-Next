<!-- Paginação, Necessita da quantidade de registros encontrados, da página atual e da base do site ($quantidade,$pagina,$base)-->
<?php 

  class Paginacao{

    private $quantidade;
    private $pagina;
    private $base;

    //Função que inicia as variáveis
    function __construct($quantidade,$pagina,$base,$classe) {
       $this->quantidade = $quantidade;
       $this->pagina = $pagina;
       $this->base = $base;
       $this->classe = $classe;
    }


    //Define a página que cada botão da paginação irá direcionar
    function getAcaoPagina($tag,$pagina,$qtd = 0,$base,$categoria = ""){
        switch ($tag) {
          case 'next':
            return $base.($pagina+1);
            break;
          case 'prev':
            return $base.($pagina-1);
            break;
          case 'first':
            return $base.(1);
            break;
          case 'last';
            $paginas = $this->getQuantidadePaginas($qtd);
            return $base.$paginas;
            break;
          default:
            return $base.($pagina);
            break;
        }
        
      }
      //Retorna a quantidade de páginas 
      function getQuantidadePaginas($qtd){
        $resto = $qtd % intval(maximo_por_pagina);
        $paginas = intval($qtd / intval(maximo_por_pagina));
        if($resto > 0):
          $paginas = $paginas + 1;
        endif;
        return intval($paginas);
      }
      //Função que gera o botão de página anterior
      function nextPage(){      
        if($this->getQuantidadePaginas($this->quantidade) > $this->pagina): 
          $html = '<a href="'.$this->getAcaoPagina('next',$this->pagina,0,$this->base).'" title="">';
          $html .= '<div class="'.$this->classe.' _tr"> > </div></a>';
          echo $html;
        endif;
      }
      //Função que gera o botão de última página
      function lastPage(){
        if($this->getQuantidadePaginas($this->quantidade) > $this->pagina):
          $html= '<a href="'.$this->getAcaoPagina('last',$this->pagina,$this->quantidade,$this->base).'" title="">';
          $html .= '<div class="'.$this->classe.' _tr">'.$this->getQuantidadePaginas($this->quantidade).'</div></a>';
          echo $html;
        endif;
      }
      //Função que gera o botão de primeira página
      function firstPage(){
        if($this->pagina > 2):
          $html= '<a href="'.$this->getAcaoPagina('first',$this->pagina,$this->quantidade,$this->base).'" title="">';
          $html .= '<div class="'.$this->classe.' _tr"> 1 </div></a>';
          echo $html;
        endif;
      }
      //Função que gera o botão de três pontos
      function treeDotsLast(){
        if($this->getQuantidadePaginas($this->quantidade) > ($this->pagina+2)):
          $html = '<div class="'.$this->classe.' btn-no-hover _tr">...</div>';
          echo $html;
        endif;
      }
      //Função que gera o botão de três pontos
      function treeDotsFirst(){
        if( $this->pagina > 2 ):
          $html = '<div class="'.$this->classe.' btn-no-hover _tr">...</div>';
          echo $html;
        endif;
      }
      //Função que gera o botão de próxima página em número
      function nextPageNumber(){
        if($this->getQuantidadePaginas($this->quantidade) > ($this->pagina+1)):
          $html ='<a href="'.$this->getAcaoPagina('next',$this->pagina,0,$this->base).'" title=""> ';
          $html .=  '<div class="'.$this->classe.' _tr">';
              if($this->getQuantidadePaginas($this->quantidade) > $this->pagina + 1):
                $html .= $this->pagina+1;
              endif;
          $html .= '</div></a>';
          echo $html;
        endif;
      }
      //Função que gera o botão de página atual
      function currentPage(){
        $html = '<a href="'.$this->getAcaoPagina('atual',$this->pagina,0,$this->base).'" title="">';
        $html .= '<div class="'.$this->classe.' _tr ativo" >';
        $html .= $this->pagina;
        $html .= '</div></a>';
        echo $html;
      }
      //Função que gera o botão de página anterior em número
      function prevPageNumber(){
        if($this->pagina > '1'):
          $html = '<a href="'.$this->getAcaoPagina('prev',$this->pagina,0,$this->base).'" title="">';
          $html .= '<div class="'.$this->classe.' _tr">';
          $html .= $this->pagina-1;
          $html .= '</div></a>';
          echo $html;
        endif;

      }
      //Função que gera o botão de página anterior
      function prevPage(){
        if($this->pagina > '1'):
          $html = '<a href="'.$this->getAcaoPagina('prev',$this->pagina,0,$this->base).'" title="">';
          $html .= '<div class="'.$this->classe.' _tr"> < </div></a>';
          echo $html;
        endif;
      }
      function createPagination($type){
        if($type=='small'):
          $this->prevPage();
          $this->prevPageNumber();
          $this->currentPage();
          $this->nextPageNumber();
          $this->treeDotsLast();
          $this->lastPage();
          $this->nextPage();
        elseif('big'):
          $this->prevPage();
          $this->firstPage();
          $this->treeDotsFirst();
          $this->prevPageNumber();
          $this->currentPage();
          $this->nextPageNumber();
          $this->treeDotsLast();
          $this->lastPage();
          $this->nextPage();
        endif;

        
      }
  }

  //  //Defina esse valor como o número máximo de elementos retornados ná página
  // define("maximo_por_pagina","10");
  // //Quantidade de registros encontrados no banco
  // $quantidade = 500;
  // //Página atual
  // $pagina = intval($get[0]);
  // //url base da página de busca
  // $base_url = 'http://localhost/padrao_inicial/';
  // //Classe css dos botões
  // $classe = 'btn-page';

  // //Cria um objeto de paginação
  // $obj = new Paginacao($quantidade,$pagina,$base_url,$classe);
  // //Small traz paginação com menos botões,e big traz com mais botões
  // $obj->createPagination('small');


  // <style type="text/css" media="screen">
  //   .btn-page{
  //     width: 20px;
  //     float: left;
  //     margin-right: 20px;
  //     background: red;
  //     color: #fff;
  //     text-align: center;
  //   }
  //   .ativo{
  //     color: blue;
  //   }
  // </style>

?>