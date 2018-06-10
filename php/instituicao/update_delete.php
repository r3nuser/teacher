<?php
    include("../connection/conn.php");
    $con = openConnection();
    
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $numero = $_GET['numero'];
    $CEP = $_GET['CEP'];
    $bairro = $_GET['bairro'];
    $rua = $_GET['rua'];
    $cidade = $_GET['cidade'];
    $option = $_GET['botao'];
   
    switch ($option) {
       case 'editar':
            $sql = "UPDATE `polo` SET `nome`='$nome',`numero`='$numero',`cep`='$CEP',`bairro`='$bairro',`logradouro`='$rua',`cidade`='$cidade' WHERE `PoloID`='$id'";
            if(!$rs=mysqli_query($con,$sql)){
                echo "Descrição do erro: " .mysqli_error($con);
                closeConnection($con);
            }else{
                echo("<script>alert('Update realizado com sucesso!')</script>");
                closeConnection($con);
                echo("<script>location.href= '../../iframes/instituicao.php#item1'</script>");
            }
        break;
        
        case 'excluir':
            $sql = "DELETE FROM `polo` WHERE `PoloID`='$id'";
            if(!$rs=mysqli_query($con,$sql)){
                echo "Descrição do erro: " .mysqli_error($con);
                closeConnection($con);
            }else{
                echo("<script>alert('Dados apagados com sucesso!')</script>");
                closeConnection($con);
                echo("<script>location.href= '../../iframes/instituicao.php#item1'</script>");
            }
        break;
    }

?>