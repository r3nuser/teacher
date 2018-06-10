<?php
    include("../connection/conn.php");
    $con = openConnection();
    
    $nome = $_GET['nome'];
    $ch = $_GET['ch'];

    $sql = "INSERT INTO `curso`(`CursoID`, `nome`, `cargaHoraria`) VALUES (null,'$nome','$ch')";

    if(!$rs=mysqli_query($con,$sql)){
        echo "Descrição do erro: " .mysqli_error($con);
    }else{
        echo("<script>alert('Cadastro realizado com sucesso!')</script>");
        echo("<script>location.href= '../../iframes/curso.php#item1'</script>");
    }
?>