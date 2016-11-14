<?php

namespace classes\util;

/**
 * Classe para escrever o erro
 * foi o espaghetthi quem escreveu
 * 
 */
class ErrorWriter {

    private $erros;

    public function __construct(Erro $erros) {
        $this->erros = $erros;
    }

    public function escreve() {
        if ($this->erros->possuiErros()) {
            print ('<div class="erro"><ul><li>'
                    . implode("</li><li>", $this->erros->getMensagens())
                    . '</li></ul></div>');
        }
    }

}
