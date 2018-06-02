<?php
    include("../connection/conn.php");
    $con = openConnection();
    
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];

    $sql = "INSERT INTO `professor`(`ProfessorID`, `nome`, `email`, `telefone`) VALUES (NULL,'$nome','$email','$telefone')";

    if(!$rs=mysqli_query($con,$sql)){
        echo "Descrição do erro: " .mysqli_error($con);
        closeConnection($con);
    }else{
        echo("<script>alert('Cadastro realizado com sucesso!')</script>");
        closeConnection($con);
        echo("<script>history.back(1)</script>");
    }
?>