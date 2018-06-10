<?php 
	include("../php/connection/conn.php");
	$con = openConnection();
?>
<html>
	<head>
    <link rel="stylesheet" href="css/MenuBar.css">
	<link rel="stylesheet" href="../styles/default.css" type="text/css">
	
	<script src="../scripts/submit.js"></script>
	<meta charset="utf-8">
	<style>
		.text{
			border:none;
		}
	
	</style>
	</head>
	<body style="overflow: auto;">
         <!-- inicio da div main -->
    <div class="main">         
        <!-- inicio da div item1 -->
        <div id="item1">
		<!-- <div id="course-central-content"> -->
		<h3 align="center"> Cursos Cadastrados </h3>
			<hr>
			<!-- <div style="height: 300px; overflow: auto; margin: 10px;"> -->
				<table width="100%">
					<thead class="cads tab">
						<th>ID</th>
						<th>Curso</th>
						<th>Carga Horária</th>
						<th>Editar</th>
						<th>Apagar</th>
					</thead>
					<tbody>
					<?php
                        // SELECT `CursoID`, `nome`, `cargaHoraria` FROM `curso` WHERE 1
						$sql = "SELECT * FROM `curso`";
						if(!$rs = mysqli_query($con,$sql)){
        
							echo("Error description: " . mysqli_error($con)."<br>");
					
							}else{
								while($rg = mysqli_fetch_array($rs)){
									$CursoID = $rg['CursoID'];
									$nome = $rg['nome'];
									$cargaHoraria = $rg['cargaHoraria'];
									
									
									echo"
									<tr>
										<form action='../php/curso/update_delete.php' method='get'>
											<td><input class='text' name='id' size='01' value='$CursoID'></td>
											<td><input class='text' name='nome' size='25' type='text' value='$nome' required/></td>
											<td><input class='text' name='ch' value='$cargaHoraria' required/></td>
											
											<td><button type='submit' id='editar' onclick='return confirmUpdate();' name='botao' value='editar'><img src='../images/editar.png'></button></td>
											<td><button type='submit' id='excluir' onclick='return confirmDelete();' name='botao' value='excluir'><img src='../images/deletar.png'></button></td>
										</form>
									</tr>
									";
								}
								closeConnection($con);
							}
					?>
				</tbody>
				</table>
            </div>
            <div id="item2">
            <form action="../php/curso/cadastrar.php" method="get">
				<h3>Cadastro de Curso</h3>
				<hr>
				<br>
				<label>Nome do curso: <input name="nome" type="text"required></label>
				<br><br>
				<label>Carga Horária: <input name="ch" type="text"required></label>
				<br><br>
				<input type="submit" value="Cadastrar!"/>
			</form>
            </div>
		</div>
	</body>
</html>