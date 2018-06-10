<?php 
	include("../php/connection/conn.php");
	$con = openConnection();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" href="css/MenuBar.css">
	    <link rel="stylesheet" href="../styles/default.css" type="text/css">
		<script src="../scripts/formatterFields.js"></script>
		<script src="../scripts/checkEmail.js"></script>
		<script src="../scripts/submit.js"></script>

	    <title>Professores</title>
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
				<h3 align="center"> Professores Cadastrados </h3>
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
								
									echo"
											<tr>
												<form action='../php/professor/update_delete.php' method='get'>
													<td><input class='text' id='id' name='id' size='01' value='$ProfessorID' /></td>
													<td><input class='text' id='nome' name='nome' size='25' type='text' value='$nome' required/></td>
													<td><input class='text' id='email' name='email' type='text' id='ei' size='30' onblur='return IsEmail(this.value)' value='$email' required/></td>
													<td><input class='text' id='telefone' name='telefone' type='text' maxlength='14' size='15' onkeydown='javascript: fMasc( this, mTel );' value='$telefone' required/></td>

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
	    	</div> <!-- fim da div 1 -->
			<div id="item2">
				<form action="../php/professor/cadastrar.php" method="get">
					<h3>Cadastro de Professor</h3>
					<hr>
					<br>
					<label>Nome:</label><br>
					<input name="nome" type="text" required/>
					<br>
					<h4>Contato</h4>
					<hr>
					<label>Email:</label><br>
					<input name="email" type="text" id="ei" onblur="return IsEmail(this.value)" required/>
					<br>
					<label>Telefone:</label><br>
					<input name="telefone" type="text" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" required/>
					<br>
					<br>
					<input type="submit" value="Cadastrar !">
				</form>
			</div><!-- fm do item 2 -->
		</div>					
	</body>
</html>
