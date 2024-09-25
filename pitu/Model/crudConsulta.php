<?php

require "conexaoBd.php";

 session_start(); 

class crud {  
  public $codigo;    
  
  
   public function setCodigo($codigo)
   {
    $this->codigo = $codigo;
   }

  public function getCodigo()
   {
    return $this->codigo;
  
   }
     
   function selecionar_Codigo() {
    $conn = conectar();  
    $codigo = $this->getCodigo();

    // Usando uma consulta preparada
    $query_Busca_CodigoSql = "SELECT * FROM cliente WHERE pkcodPlanta = ?";
    
    if ($stmt = mysqli_prepare($conn, $query_Busca_CodigoSql)) {
        mysqli_stmt_bind_param($stmt, 's', $codigo); // 's' para string
        mysqli_stmt_execute($stmt);
        
        // Obtendo o resultado
        $result_Busca_Codigo_Conexao = mysqli_stmt_get_result($stmt);
        $resultado_Busca_Codigo = mysqli_fetch_assoc($result_Busca_Codigo_Conexao);

        if ($resultado_Busca_Codigo) {
            header("Location: ../View/FloraYpe.IA.html");
            exit(); // É importante usar exit após redirecionar
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Código incorreto'); window.location.href='../View/index.html';</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Fechar a conexão ao final
}

}