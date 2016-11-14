<?php

namespace classes\util;

/**
 * 
 * Classe para armazenar as mensagens de erro geradas em uma página.
 * @author = null
 */
class Erro {

    /**
     * Vetor de mensagens.
     * @var String[] 
     */
    private $mensagens;

    /**
     * Adiciona uma nova mensagem no objeto.
     * @param String $msg a mensagem
     */
    final public function add($msg) {
        $this->mensagens[] = $msg;
    }

    /**
     * Busca o vetor de mensagens
     * @return String[] o vetor de mensagens
     */
    final public function getMensagens() {
        return $this->mensagens;
    }

    /**
     * Indica se existem mensagens cadastradas no objeto.
     * @return boolean true em caso de existirem, senão false.
     */
    final public function possuiErros() {
        return isset($this->mensagens);
    }

}
