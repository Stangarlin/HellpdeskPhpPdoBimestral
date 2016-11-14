<?php

namespace classes\dao;

use classes\persistencia\Banco;

/**
 * Description of DAO
 * Classe que faz a instancia entre o banco e as demais classes Dao
 * @author espaghetti voador
 */
abstract class DAO implements \classes\util\TrataErro {

    private $erro;
    protected $banco;

    protected function __construct() {
        $this->limpaErro();
        $this->banco = new Banco();
    }

    public function __destruct() {
        $this->banco->fechar();
    }

    protected final function limpaErro() {
        $this->erro = null;
    }

    public final function temErro() {
        return $this->erro != null;
    }

    public final function getErro() {
        return $this->erro;
    }

    protected final function setErro($erro) {
        $this->erro = $erro;
    }

}
