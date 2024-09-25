<?php

    function conectar(){

    $conn = mysqli_connect('localhost', 'root', '', 'pitu_bancodados');
    
	if(!$conn){
            
		return "Conexão não abre !" ;
                
	}else{
            
		return $conn ;
    }
    

    


}
