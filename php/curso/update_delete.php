<?php
    include("../connection/conn.php");
    $con = openConnection();
    
    $nome = $_GET['nome'];
    $ch = $_GET['ch'];
    $id = $_GET['id'];
    $option = $_GET['botao'];
   
    switch ($option) {
       case 'editar':
            $sql = "UPDATE `curso` SET `nome`='$nome',`cargaHoraria`='$ch' WHERE `CursoID`='$id'";
            if(!$rs=mysqli_query($con,$sql)){
                echo "Descrição do erro: " .mysqli_error($con);
                closeConnection($con);
            }else{
                echo("<script>alert('Update realizado com sucesso!')</script>");
                closeConnection($con);
                echo("<script>location.href= '../../iframes/curso.php#item1'</script>");
            }
        break;
        
        case 'excluir':
            $sql = "DELETE FROM `curso` WHERE `CursoID`='$id'";
            if(!$rs=mysqli_query($con,$sql)){
                echo "Descrição do erro: " .mysqli_error($con);
                closeConnection($con);
            }else{
                echo("<script>alert('Dados apagados com sucesso!')</script>");
                closeConnection($con);
                echo("<script>location.href= '../../iframes/curso.php#item1'</script>");
            }
        break;
    } 

?>