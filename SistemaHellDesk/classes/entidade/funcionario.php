<?php
namespace classes\entidade;

class funcionario {
    private $codigo;
    private $nome;
    private $dtContratacao;
    private $dtDemissao;
    private $ativo;
    private $senha;
    private $tipo;
    
    function getCodigo() {        return $this->codigo;    }
    function getNome() {        return $this->nome;    }
    function getDtContratacao() {        return $this->dtContratacao;    }
    function getDtDemissao() {        return $this->dtDemissao;    }  
    function getAtivo() {        return $this->ativo;    }
    function getSenha() {        return $this->senha;    }   
    function getTipo() {        return $this->tipo;    }    
    
    function setCodigo($codigo) {        $this->codigo = $codigo;    }
    function setNome($nome) {        $this->nome = $nome;    }
    function setDtContratacao($dtContratacao) {        $this->dtContratacao = $dtContratacao;    }
    function setDtDemissao($dtDemissao) {        $this->dtDemissao = $dtDemissao;    }
    function setAtivo($ativo) {        $this->ativo = $ativo;    }
    function setSenha($senha) {        $this->senha = $senha;    }
    function setTipo($tipo) {        $this->tipo = $tipo;    }    
    
    function __construct($codigo=null, $nome=null, $dtContratacao=null, $dtDemissao=null, $ativo=null, $senha=null, $tipo=null) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->dtContratacao = $dtContratacao;
        $this->dtDemissao = $dtDemissao;
        $this->ativo = $ativo;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }


    
}