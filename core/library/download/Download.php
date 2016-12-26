<?php

namespace core\library\download;

class Download
{
    const ARQUIVO        = 'formulario.html';
    const CAMINHO_ARQUIVO = '';

    static public function executar()
    {
        // Define o tempo máximo de execução em 0 para as conexões lentas
        set_time_limit(0);
        // Arqui você faz as validações e/ou pega os dados do banco de dados
        $aquivoNome   = self::ARQUIVO; // nome do arquivo que será enviado p/ download
        $arquivoLocal = self::CAMINHO_ARQUIVO.$aquivoNome; // caminho absoluto do arquivo
        // Verifica se o arquivo não existe
        if (!file_exists($arquivoLocal)) {
            echo "O arquivo $this->arquivo não existe. ";
        } else {
            // Aqui você pode aumentar o contador de downloads
            // Definimos o novo nome do arquivo
            $novoNome = $aquivoNome;
            // Configuramos os headers que serão enviados para o browser
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename="'.$novoNome.'"');
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.filesize($aquivoNome));
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Expires: 0');
        }
    }
}