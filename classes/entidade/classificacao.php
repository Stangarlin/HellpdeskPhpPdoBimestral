<?php namespace classes\entidade;
class classificacao{
    private $codigo;
    private $nome;
    private $ativa;
    
    public function getCodigo() {        return $this->codigo;    }
    public function getNome() {        return $this->nome;    }
    public function getAtiva() {        return $this->ativa;    }
    
    public function setCodigo($codigo) {        $this->codigo = $codigo;    }
    public function setNome($nome) {        $this->nome = $nome;    }
    public function setAtiva($ativa) {        $this->ativa = $ativa;    }

    public function __construct($codigo=null, $nome=null, $ativa=null) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->ativa = $ativa;
    }

           
    
}

