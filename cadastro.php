<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="utf-8">
	<title>TCC</title>
	<!--CADASTRO COM O MESMO ESTILO DO LOGIN-->
	<style type="text/css">
			*{margin: 0; padding: 0; box-sizing: border-box;}
	body{background: #000}
	.right{float: left }

	.botao{

		padding: 6px 8px; background: #81F781;
	 border: 1px solid green; font: 16px tahoma,arial;
	 font-weight: bold;
	  color: black;
	   border-radius: 5px;}
	
	.formulario{position: absolute;
	 top: 50%;
	  left: 46%;
	  right: 50%; 
	  width: 500px; height: 250px; 
	  background: #0B6138;
	  border-radius: 6px;
	  margin-left: -200px;
	  margin-top: -100px;
	  padding: 10px;
	  box-shadow: #0B6138 5px 5px 50px;}


	  h1{
	  	float: left; width: 100%; margin-bottom: 10px;
	  	font:20px "Trebuche MS", tahoma, arial;
	  	font-weight: bold;
	  	color: #000;
	  	padding: 5px;
	  	text-align: center;
	  }
	  .formulario label{
	  	float: left;
	  	width: 100%;
	  }
	  .formulario label span{
	  	float: left;
	  	width: 100%;
	  	font: 15px Tahoma, arial;
	  	color: #000;
	  	margin-bottom: 10px;
	  }
	  .formulario label input{
	  	float: left;
	  	width: 100%;
	  	padding: 6px;
	  	background: white;
	  	border-radius: 5px;
	  	border: 2px solid #000;
	  	outline: none;
	  	margin-bottom: 10px;
	  }
	   .formulario label input span #nome{
	  	float: left;
	  	width: 50%;
	  	padding: 6px;
	  	background: white;
	  	border-radius: 5px;
	  	border: 2px solid #000;
	  	outline: none;
	  	margin-bottom: 10px;
	  }
		</style>
	</head>

	<body>
		<div class="logo" align="center"><img src="fotos/logo.jpg" width="250" height="250" /></div>
		<div class="formulario">
			<h1>Bem vindo ao SeeD talk</h1>

			<?php



			?>


			<form action="" method="post" enctype="multipart/form-data">
				<label>
					<span align="center"><b>Faça Seu Cadastro</span></b>
					<input type="text" name="nome" id="nome" placeholder="Digite Seu Nome " autocomplete="off" />
					<input type="text" name="email" id="email" placeholder="Digite Seu e-mail " autocomplete="off" />
					<input type="text" name="senha" id="senha" placeholder="Digite Sua Senha " autocomplete="off" />

				</label>
				<input type="hidden" name="acao" value="logar" />
				<input type="submit" value="Cadastrar" class="botao right" />
			
			</form>
		</div>
	</body>

</head>
<body>

</body>
</html>