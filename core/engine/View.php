<?php
namespace core\engine;
class View {
    public function render($pagina, $dados = array()) {
        /*
         * Transforma cada chave do array em uma variÃ¡vel
         * $dados = array(
         *  'titulo' => 'titulo da pagina',
         *  'conteudo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat felis id vehicula facilisis. Morbi porta nunc quam, quis bibendum turpis pulvinar eget. Morbi vel malesuada elit. ',
         *  );
         * Cria as variÃ¡veis $titulo e $conteudo
        */
        extract($dados);
        include PASTA_BASE_VIEW.$pagina . ".php";
    }

}

