<?php namespace classes\entidade;

class status{
    private $codigo;
    private $status;
    private $ativo;
    
    public function getCodigo() {        return $this->codigo;    }
    public function getStatus() {        return $this->status;    }
    public function getAtivo() {        return $this->ativo;    }

    public function setCodigo($codigo) {        $this->codigo = $codigo;    }
    public function setStatus($status) {        $this->status = $status;    }
    public function setAtivo($ativo) {        $this->ativo = $ativo;    }

    public function __construct($codigo=null, $status=null, $ativo=null) {
        $this->codigo = $codigo;
        $this->status = $status;
        $this->ativo = $ativo;
    }



    
}