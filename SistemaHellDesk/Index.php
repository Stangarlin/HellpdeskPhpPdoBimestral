<?php
require_once './_autoload.php';

use classes\dao\funcionarioDAO;
use classes\util\Erro;
use classes\util\ErrorWriter;


use classes\controller\funcionarioControll;
use classes\entidade\funcionario;

$funcDAO = new funcionarioDAO();

$erros = new Erro();

$user = new funcionario();

$login="";

if (filter_input(INPUT_POST,"bntEnviar"))
{
    $login = filter_input(INPUT_POST, "txtLogin");
    $senha = filter_input(INPUT_POST, "txtSenha");
    if ($login == false) {
        $erros->add("Login não informado!");
    }
    if ($senha == false) {
        $erros->add("Senha não informada!");
    }
    if (!$erros->possuiErros())
    {
        $user = $funcDAO->autenticar($senha);
        
        if ($user != NULL){
            if ($user->getCodigo() > 0){
                $_SESSION["usuarioLogado"] = $user;
                header("Location: teste.php \r\n");
                exit();
            }else {
                $erros->add("Senha inválida!");
            }
        }else {
            $erros->add("Usuário não cadastrado!");
        }
        
    }
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        (new ErrorWriter($erros))->escreve();
        ?>
        <form action="Index.php" method="POST">
            <label for="txtLogin">Login: </label><br/>
            
            <input type="text" name="txtLogin" value="" /><br/>
            <label for="txtSenha">Senha: </label><br/>
            <input type="text" name="txtSenha" value="" /><br/>
            <br/>
            <input type="submit" name="bntEnviar" value="Enviar" />
            
        </form>
        
        
    </body>
</html>
