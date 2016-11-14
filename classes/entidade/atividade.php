<?php namespace classes\entidade;
class atividade{
    private $codigo;
    private $descricao;
    private $dtInicio;
    private $dtFim;
    private $codigoFuncionario;
    private $codigoStatus;
    private $solicitanteEmail;
    
    function getCodigo() {        return $this->codigo;    }
    function getDescricao() {        return $this->descricao;    }
    function getDtInicio() {        return $this->dtInicio;    }
    function getDtFim()      {   return $this->dtFim;    }
    function getCodigoFuncionario() {        return $this->codigoFuncionario;    }
    function getCodigoStatus() {        return $this->codigoStatus;    }
    function getSolicitanteEmail() {        return $this->solicitanteEmail;    }

    function setCodigo($codigo) {        $this->codigo = $codigo;    }
    function setDescricao($descricao) {        $this->descricao = $descricao;    }
    function setDtInicio($dtInicio) {        $this->dtInicio = $dtInicio;    }
    function setDtFim($dtFim) {        $this->dtFim = $dtFim;    }
    function setCodigoFuncionario($codigoFuncionario) {        $this->codigoFuncionario = $codigoFuncionario;    }
    function setCodigoStatus($codigoStatus) {        $this->codigoStatus = $codigoStatus;    }
    function setSolicitanteEmail($solicitanteEmail) {        $this->solicitanteEmail = $solicitanteEmail;    }
    
    
    function __construct($codigo=null, $descricao=null, $dtInicio=null, $dtFim=null, $codigoFuncionario=null, $codigoStatus=null, $solicitanteEmail=null) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->dtInicio = $dtInicio;
        $this->dtFim = $dtFim;
        $this->codigoFuncionario = $codigoFuncionario;
        $this->codigoStatus = $codigoStatus;
        $this->solicitanteEmail = $solicitanteEmail;
    }




}