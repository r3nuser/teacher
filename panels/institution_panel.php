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
		<div id="institution-central-content">
		<h3 align="center"> Instituições Cadastradas </h3>
			<hr>
			<div style="height: 300px; overflow: auto; margin: 10px;">
				<table width="100%">
					<thead class="cads tab">
						<th>ID</th>
						<th>Nome</th>
						<th>Numero</th>
						<th>CEP</th>
						<th>Bairro</th>
						<th>Logradouro</th>
						<th>Cidade</th>
						<th>Editar</th>
						<th>Apagar</th>
					</thead>
					<tbody>
					<?php

						$sql = "SELECT * FROM `polo`";
						if(!$rs = mysqli_query($con,$sql)){
        
							echo("Error description: " . mysqli_error($con)."<br>");
					
							}else{
								while($rg = mysqli_fetch_array($rs)){
									$PoloID = $rg['PoloID'];
									$nome = $rg['nome'];
									$numero = $rg['numero'];
									$cep = $rg['cep'];
									$bairro = $rg['bairro'];
									$logradouro = $rg['logradouro'];
									$cidade = $rg['cidade'];
									// SELECT `PoloID`, `nome`, `numero`, `cep`, `bairro`, `logradouro`, `cidade` FROM `polo` WHERE 1
									echo"
									<tr>
										<form id='teacher_panel' action='' method='get'>
											<td><input class='text' id='id' name='id' size='01' value='$PoloID'></td>
											<td><input class='text' id='nome' name='nome' size='25' type='text' value='$nome' required/></td>
											<td><input class='text' id='email' name='email' type='text' id='ei' size='30' onblur='return IsEmail(this.value)' value='$numero' required/></td>
											<td><input class='text' id='telefone' name='telefone' type='text' maxlength='14' size='15' onkeydown='javascript: fMasc( this, mTel );' value='$cep' required/></td>
											<td><input class='text' id='nome' name='nome' size='25' type='text' value='$bairro' required/></td>
											<td><input class='text' id='email' name='email' type='text' id='ei' size='30' onblur='return IsEmail(this.value)' value='$logradouro' required/></td>
											<td><input class='text' id='telefone' name='telefone' type='text' maxlength='14' size='15' onkeydown='javascript: fMasc( this, mTel );' value='$cidade' required/></td>
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