<?php  

$botao=filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);    
 
if(isset($botao)){   
    
    
 include_once '../Model/crudConsulta.php' ;   
 
$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);

$consulta = new crud();
$consulta->setCodigo($codigo);
$consulta->selecionar_Codigo();
        
}      

