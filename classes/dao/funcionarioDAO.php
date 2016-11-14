<?php           
namespace classes\dao;

use classes\entidade\funcionario;

class funcionarioDAO extends DAO{
    public function __construct() {
        parent::__construct();
    }
    
    public function autenticar($senha){
        $param = array($senha);
        $sql = "SELECT fun_codigo, fun_ativo, fun_tipo FROM funcionario WHERE fun_senha = ?; ";
        $this->banco->setComandoSql($sql);
        $resultado = $this->banco->consulta_objeto_p($param);
        if ($resultado !== false){
            if (count($resultado) > 0 ){
//                $func = new funcionario();
                $linha = $resultado[0];
                
//              $func->GetCodigo = $resultado[0]("fun_codigo");
//                $func->SetCodigo = $linha->fun_codigo;
//                $func->SetAtivo = $linha->fun_ativo;
//                $func->SetTipo = $linha->fun_tipo;
                return new funcionario($linha->fun_codigo,$linha->fun_ativo,$linha->fun_tipo);
                
            }
           
        }
            if ($this->banco->temErro()) {
            $this->setErro($this->banco - getErro());
        }
        return null;
    }
    
   public function buscar($funcionario){
       $param = array($funcionario);
       $sql = "SELECT fun_codigo,fun_ativo,fun_dtcontratacao,fun_dtdemissao,fun_nome,fun_senha,fun_tipo from funcionario where fun_codigo = ?; ";
       $this->banco->setComandoSql($sql);
       $resultado = $this->banco->consulta_objeto_p($param);
       if ($resultado !== false){
        if (count($resultado) > 0){
            $linha = $resultado[0];
           return new funcionario($linha->fun_codigo,$linha->fun_ativo,$linha->fun_dtcontratacao,$linha->fun_dtdemissao,$linha->fun_nome,$linha->fun_senha,$linha->fun_tipo);
            }
        }       
   }
   public function buscarPeloNome($nome){
       $param = array($nome);
       
       //$sql = "SELECT fun_codigo,fun_ativo,fun_dtcontratacao,fun_dtdemissao,fun_nome,fun_tipo from funcionario where fun_nome = ?;";
       $sql = "SELECT fun_codigo,fun_ativo,fun_dtcontratacao,fun_dtdemissao,fun_nome,fun_tipo from funcionario where fun_nome LIKE ? ";
       
       $this->banco->setComandoSql($sql);
       
       $resultado = $this->banco->consulta_objeto_p($param);
       if ($resultado !== false){
           if (count($resultado)>0){
               $linha[] = $resultado;
               return $linha;
               
           }
            if (count($resultado) >0 &&count($resultado) >1){
                   $linha = $resultado[0];
                   return new funcionario($linha->fun_codigo,$linha->fun_ativo,$linha->fun_dtcontratacao,$linha->fun_dtdemissao,$linha->fun_nome,$linha->fun_tipo);
               }
       }
   }
   
   public function inserir(Funcionario $funcionario) {
        $parametros = array(
            ":codigo" => $funcionario->getCodigo(),
            ":ativo" => $funcionario->getAtivo(),
            ":dtcontratacao" => $funcionario->getDtcontratacao(),
            ":dtdemissao" => $funcionario->getDtDemissao(),
            ":nome" => $funcionario->getNome(),            
            ":senha" => $funcionario->getSenha(),
            ":tipo" => $funcionario-getTipo()
        );
        $this->limpaErro();
        $sql = "INSERT INTO Funcionario (fun_codigo, fun_ativo, fun_dtcontratacao,fun_dtdemissao,fun_nome,fun_senha,fun_tipo)"
                . " values (:codigo, :ativo, :dtcontratacao, :dtdemissao, :nome, :senha, :tipo)";
        $this->banco->setComandoSQL($sql);
        $this->banco->executa_p($parametros);
        if ($this->banco->temErro()) {
            $this->setErro($this->banco->getErro());
            return false;
        } else {
            return true;
        }
    }
   
}