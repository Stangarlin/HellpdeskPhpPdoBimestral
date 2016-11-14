<?php 
require_once "./_autoload.php";

use classes\dao\funcionarioDAO;
use classes\util\Erro;
use classes\util\ErrorWriter;


use classes\controller\funcionarioControll;
use classes\entidade\funcionario;
$funcionarioDAO = new funcionarioDAO();
$nome="";
$erros = new Erro();
$funcionario;


if (filter_input(INPUT_POST, "bPesq"))
{
   $nome = filter_input(INPUT_POST, "txtNome");
   $funcionario =  $funcionarioDAO->buscarPeloNome($nome);
   if (!$erros->possuiErros()){
       echo "Dados Funcionario: ";
      
       foreach ($funcionario as $fun)
       {
           print($fun->getNome());
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
        <br/>
        <?php 
        (new ErrorWriter($erros))->escreve();
        
        ?>
        ...
        <br/>
        
        <form action="teste.php" method="POST">
            nome
            <input type="text" name="txtNome" value="" />
            <input type="submit" value="pesquisar" name="bPesq" />
        </form>
        
        <?php ?>
    </body>
</html>
