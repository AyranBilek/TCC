<!--algumas funçoes ainda nao funcionam fase de testes codigo desenvolvido por:AMB(ayran maciel bilek) mas com estilos e funçoes ja existentes , apenas modificadas--><?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<!--META PARA QUE POSSAM SER USADOS ACENTOS NOS TEXTOS -->
		<meta charset=UTF-8>

		<title>TCC</title>
		<!--O ESTILO DENTRO DA MESMA PAGINA DE CODIGOS PARA TESTAR SE FUNCIONA-->
		<style type="text/css">

			*{margin: 0; padding: 0; box-sizing: border-box;}

	/*COR DE FUNDO DA PAGINA*/
	 body{background: #000}
	.right{float: left; }

	/*ESTILO DO BOTAO*/
	 .botao{

		padding: 6px 8px; background: #81F781;
	 border: 1px solid green; font: 16px tahoma,arial;
	 font-weight: bold;
	  color: black;
	   border-radius: 5px;}

	   /*BOTAO DE CADATRO*/
	  
	   .botaoleft{
	   	float: right;
	   	padding: 6px 8px; background: #81F781;
	 border: 1px solid green; font: 16px tahoma,arial;
	 font-weight: bold;
	  color: black;
	   border-radius: 5px;
	   text-decoration-line: none;}
	
	/*DIV DO FUNDO DO FORMULARIO*/
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


	 /*ESTILO DE TEXTO DO TITULO*/ h1{
	  	float: left; width: 100%; margin-bottom: 10px;
	  	font:20px "Trebuche MS", tahoma, arial;
	  	font-weight: bold;
	  	color: #000;
	  	padding: 5px;
	  	text-align: center;
	  }
	  /*ESTILOS DAS LABELS DENTRO DO FORMULARIO*/
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
		</style>
	</head>

	<body>
		<!--LOGO CENTRALIZADA DIRETO NO HTML PQ TAVA DANDO ERRO NO CSS-->
		<div class="logo" align="center"><img src="fotos/logo.jpg" width="250" height="250" /></div>
		<div class="formulario">
			<h1>Bem vindo ao SeeD talk</h1>
			<!--CODIGO PHP PARA VERIFICAR SE O EMAIL E SENHA EXISTE NO BANCO-->
			<?php
				if(isset($_POST['acao']) && $_POST['acao'] == 'logar'){
					$email = strip_tags(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));

					$senha = strip_tags(trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
				
					//SE O EMAIL ESTIVER VAZIO ELE MOSTRA A MENSAGEM ABAIXO
					if($email == '' || $senha == ''){
						echo 'Digite seu Email e Senha Abaixo';


					}else{
						//ELE PROCURA NO BANCO PELO USUARIO
						$pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `email`  = ? ");
						$pegaUser->execute(array($email));

						$pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `senha`  = ? ");
						$pegaUser->execute(array($senha));

						//SE O USUARIO NAO EXISTIR OU A SENHA ESTIVER INCORRETA ELE MOSTRA A MENSAGEM
						if($pegaUser->rowCount() == 0){
							echo "<script language='javascript' type'text/javascript> alert('E-mail ou senha incorretos!');window.location.href='index.php';</script>";
						}else{
							$agora = date('Y-m-d H:i:s');
							$limite = date('Y-m-d H:i:s', strtotime('+2 min'));
							$update = BD::conn()->prepare("UPDATE `usuarios` SET `horario` = ?, `limite` = ? WHERE `email` = ?");
							if( $update->execute(array($agora, $limite, $email)) ){
								while($row = $pegaUser->fetchObject()){
									//SE O EMAIL SE EXISTIR LE É LEVADO PARA A "HOME" DO SITE "CHAT.PHP"
									$_SESSION['email_logado'] = $email;
									$_SESSION['id_user'] = $row->id;
									header("Location: chat.php");
								}
							}
						}
					}
				}
			?>
			<form action="" method="post" enctype="multipart/form-data">
				<label>
					<span align="center"><b>Digite seus Dados Abaixo</span></b>
					<b>Email:<input type="text" name="email" placeholder="Seu e-mail aqui" autocomplete="on" /><p>
					Senha:<input type="password" name="senha" placeholder="Sua Senha aqui" autocomplete="off" / ></p></b>
				</label>
				<input type="hidden" name="acao" value="logar" />
				<input type="submit" value="Entrar" class="botao right" />
				<a href="cadastro.php"><input type="button" class="botaoleft" value="Cadastre-se" /></a>

			</form>

		</div>
		
	</body>
</html>