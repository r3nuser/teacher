<?php
    include("../connection/conn.php");
    $con = openConnection();
    
    $nome = $_GET['nome'];
    $numeroResidencia= $_GET['numeroResidencia'];
    $CEP= $_GET['CEP'];
    $bairro= $_GET['bairro'];
    $rua= $_GET['rua'];
    $cidade= $_GET['cidade'];
   

    $sql = "INSERT INTO `polo`(`PoloID`, `nome`, `numero`, `cep`, `bairro`, `logradouro`, `cidade`) VALUES (NULL,'$nome','$numeroResidencia','$CEP','$bairro','$rua','$cidade')";

    if(!$rs=mysqli_query($con,$sql)){
        echo "Descrição do erro: " .mysqli_error($con);
        closeConnection($con);
    }else{
        echo("<script>alert('Cadastro realizado com sucesso!')</script>");
        closeConnection($con);
        echo("<script>history.back(1)</script>");
    }
?>