<?php 
	include("../php/connection/conn.php");
	$con = openConnection();
?>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			.text{
				border:none;
			}
		</style>
	</head>
	<body>
		<div id="course-central-content">
		<h3 align="center"> Professores Cadastrados </h3>
			<hr>
			<div style="height: 300px; overflow: auto; margin: 10px;">
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
										<form id='teacher_panel' action='' method='get'>
											<td><input class='text' id='id' name='id' size='01' value='$CursoID'></td>
											<td><input class='text' id='nome' name='nome' size='25' type='text' value='$nome' required/></td>
											<td><input class='text' id='email' name='email' type='text' id='ei' size='30' onblur='return IsEmail(this.value)' value='$cargaHoraria' required/></td>
											<td><input type='image' id='editar' name='botao' value='editar' onclick=\"Submit('1')\" src='../teacher/images/editar.png'/></td>
											<td><input type='image' id='excluir' name='botao' value='excluir' onclick=\"Submit('2')\"' src='../teacher/images/deletar.png'/> </td>
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
			<hr>
		</div>
	</body>
</html>