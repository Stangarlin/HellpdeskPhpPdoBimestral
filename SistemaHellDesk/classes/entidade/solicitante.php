<?php namespace classes\entidade;

class solicitante{
    private $email;
    private $nome;
    private $telefone;
    private $observacao;
    
    public function getEmail() {        return $this->email;    }
    public function getNome() {        return $this->nome;    }
    public function getTelefone() {        return $this->telefone;    }
    public function getObservacao() {        return $this->observacao;    }
    
    public function setEmail($email) {        $this->email = $email;    }
    public function setNome($nome) {        $this->nome = $nome;    }
    public function setTelefone($telefone) {        $this->telefone = $telefone;    }
    public function setObservacao($observacao) {        $this->observacao = $observacao;    }

    public function __construct($email=null, $nome=null, $telefone=null, $observacao=null) {
        $this->email = $email;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->observacao = $observacao;
    }

    
}
