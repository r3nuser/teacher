<?php
    include("../connection/conn.php");
    $con = openConnection();
    
    $option = $_GET['botao'];
    $ProfessorID = $_GET['id'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];

    switch ($option) {
        case 'editar':

            $ProfessorID = $_GET['id'];
            $nome = $_GET['nome'];
            $email = $_GET['email'];
            $telefone = $_GET['telefone'];

            $sql = "UPDATE `professor` SET `nome`='$nome',`email`='$email',`telefone`='$telefone' WHERE ProfessorID='$ProfessorID'";
            if(!$rs=mysqli_query($con,$sql)){
                echo "Descrição do erro: " .mysqli_error($con);
                closeConnection($con);
            }else{
                echo("<script>alert('Update realizado com sucesso!')</script>");
                closeConnection($con);
                echo("<script>location.href= '../../iframes/professores.php#item1'</script>");
            }
            break;
        case 'excluir':
            
            $ProfessorID = $_GET['id'];
            $sql = "DELETE FROM `professor` WHERE ProfessorID='$ProfessorID'";
            if(!$rs=mysqli_query($con,$sql)){
                echo "Descrição do erro: " .mysqli_error($con);
                closeConnection($con);
            }else{
                echo("<script>alert('Dados apagados com sucesso!')</script>");
                closeConnection($con);
                echo("<script>location.href= '../../iframes/professores.php#item1'</script>");
            }
            break;
        default:
            # code...
            break;
    }

?>