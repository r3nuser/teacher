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
	    <link rel="stylesheet" href="../styles/default.css" type="text/css">
	    <link rel="stylesheet" href="css/MenuBar.css">
		<script src="../scripts/formatterFields.js"></script>
		<script src="../scripts/checkEmail.js"></script>
		<script src="../scripts/CEP.js"></script>
		<script src="../scripts/submit.js"></script>
		
	    <title>Instituição</title>
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
				<h3 align="center"> Instiuições Cadastradas </h3>
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
											<form action='../php/instituicao/update_delete.php' method='get'>
												<td><input class='text' id='id' name='id' size='01' value='$PoloID'></td>
												<td><input class='text' id='nome' name='nome' size='25' type='text' value='$nome' required/></td>
												<td><input class='text' id='numero' name='numero' type='text' value='$numero' required/></td>
												<td><input class='text'  name='CEP' type='text' onkeydown='javascript: fMasc( this, mCEP );' value='$cep' required/></td>
												<td><input class='text'  name='bairro' size='25' type='text' value='$bairro' required/></td>
												<td><input class='text'  name='rua' type='text'size='30' value='$logradouro' required/></td>
												<td><input class='text'  name='cidade' value='$cidade' required/></td>
												
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
				<form action="../php/instituicao/cadastrar.php" method="get">
					<h3>Cadastro de Instituição</h3>
					<hr>
					<br>
					<label>Nome da Instituição:</label><br>
					<input name="nome" type="text">
					<br>
					<h4>Endereço</h4>
					<hr><br>
					<!--Campo CEP-->
					<label>CEP</label>:<br>
					<input id="CEP" name="CEP" type="text" onkeydown="javascript: fMasc( this, mCEP );" maxlength="10"  onblur="search_cep(this.value);" value="" required/>
					<br>
					<!--Campo Rua-->
					<label>Rua</label>:<br>
					<input id="bairro" name="bairro" size="25" type="text" value="" required/>
					<br>
					<!--Campo bairro-->
					<label>Bairro</label>:<br>
					<input id="rua" name="rua" type="text"size="30" value="" required/>
					<br>
					<!--Campo Cidade-->
					<label>Cidade</label>:<br>
					<input id="cidade" name="cidade" value="" required/>
					<br>
					<!--Campo Número da Residência-->
					<label>Número</label>:<br>
					<input type="text" name="numeroResidencia"  value=""  id="numeroResidencia"/>
					<br>
					<br>
					<input type="submit" value="Cadastrar !"/>
				</form>
			</div>
		</div>
	</body>
</html>