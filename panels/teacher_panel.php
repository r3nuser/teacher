<?php 
	include("../php/connection/conn.php");
	$con = openConnection();
?>
<html>
	<head>
		<meta charset="utf-8">
		<script src="../scripts/formatterFields.js"></script>
		<script src="../scripts/checkEmail.js"></script>
		<style>
			.text{
				border:none;
			}
		</style>
	</head>
	<body>
		<div id="teacher-central-content" padding="10px">
			<h3 align="center"> Professores Cadastrados </h3>
			<hr>
			<div style="height: 300px; overflow: auto; margin: 10px;">
				<table width="100%">
					<thead class="cads tab">
						<th>ID</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Editar</th>
						<th>Apagar</th>
					</thead>
					<tbody>
					<?php

						$sql = "SELECT * FROM `professor`";
						if(!$rs = mysqli_query($con,$sql)){
        
							echo("Error description: " . mysqli_error($con)."<br>");
					
							}else{
								while($rg = mysqli_fetch_array($rs)){
									$ProfessorID = $rg['ProfessorID'];
									$nome = $rg['nome'];
									$email = $rg['email'];
									$telefone = $rg['telefone'];
									// onclick='return confirm(\"realmente deseja atualizar?\")'
									// ../php/professor/deletar_excluir.php
									// onclick=\"Submit('1')\"
									echo"
									<tr>
										<form action='deletar_excluir.php' method='get'>
											<td><input class='text' id='id' name='id' size='01' value='$ProfessorID'></td>
											<td><input class='text' id='nome' name='nome' size='25' type='text' value='$nome' required/></td>
											<td><input class='text' id='email' name='email' type='text' id='ei' size='30' onblur='return IsEmail(this.value)' value='$email' required/></td>
											<td><input class='text' id='telefone' name='telefone' type='text' maxlength='14' size='15' onkeydown='javascript: fMasc( this, mTel );' value='$telefone' required/></td>
											
											<td><input type='image' id='editar' name='botao' value='editar' src='../teacher/images/editar.png'/></td>
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