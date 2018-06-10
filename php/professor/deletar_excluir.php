<?php
      include("../connection/conn.php");
      $con = openConnection();
    
    ECHO $option = $_GET['botao'];
    ECHO $ProfessorID = $_GET['id'];
    ECHO $nome = $_GET['nome'];
    ECHO $email = $_GET['email'];
    ECHO $telefone = $_GET['telefone'];

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
                echo("<script>history.back(1)</script>");
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
                echo("<script>history.back(1)</script>");
            }
            break;
        default:
            # code...
            break;
    }

?>