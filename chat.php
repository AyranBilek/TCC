<?php
	session_start();
	include_once "defines.php";
	require_once('classes/BD.class.php');
	BD::conn();

	if(!isset($_SESSION['email_logado'], $_SESSION['id_user'])){
		header("Location: index.php");
	}

	$pegaUser = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `email` = ?");


	$pegaUser->execute(array($_SESSION['email_logado']));
	$dadosUser = $pegaUser->fetch();
    //BOTAO DE SAIR
	if(isset($_GET['acao']) && $_GET['acao'] == 'sair'){
		unset($_SESSION['email_logado']);
		unset($_SESSION['id_user']);
		session_destroy();
		header("Location: index.php");
	}
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset=UTF-8>
		<title>TCC</title>
		<!--ESTILO DO PERFIL-->
		 <nav class="menu">
	<ul class="active">
		<li class="current-item"><a href="#">Home</a></li>
		<li><a href="#">Perfil</a></li>
		
		<li><a href="#">Usuarios</a></li>
		<li><a href="#">Salas</a></li>
		<li><a href="#">Configurações</a></li>
	</ul>

	<a class="toggle-nav" href="#">&#9776;</a>

	<form class="search-form">
		<input type="text">
		<button >Pesquisar</button>
	</form>
</nav>

<style type="text/css">

.toggle-nav {
	display:none;
}


@media screen and (min-width: 860px) {
	.menu {
	width:100%;
	padding:10px 18px;
	box-shadow: 5px 2px 5px #0B6138;
	border-radius:3px;
	background:#0B6138;
	}
}

.menu ul {
	display:inline-block;
}

.menu li {
	margin:0px 50px 0px 0px;
	float:left;
	list-style:none;
	font-size:17px;
}

.menu li:last-child {
	margin-right:0px;
}

.menu a {
	text-decoration-line: none;
	font: 14px   tahoma, arial, helvetica;
 	font-weight: bold;
 	color: #fff;
	text-shadow:0px 1px 0px rgba(0,0,0,0.5);
	
	transition:color linear 0.15s;
}

.menu a:hover, .menu .current-item a {
	text-decoration:none;
	color:#000;
}


.search-form {
	float:right;
	display:inline-block;
}

.search-form input {
	width:200px;
	height:30px;
	padding:0px 8px;
	float:left;
	border-radius:10px 10px 10px 10px;
	border: solid 1px #000;
	font-size:13px;
}

.search-form button {

		text-decoration:none;
		padding: 4px 6px;
	 background:#81F781;
	 border: 1px solid black; 
	 font: 16px tahoma,arial;
	font-weight: bold;
	  color: black;
	   border-radius: 5px;
	   cursor: pointer;"
}

.search-form button :hover{

		text-decoration:none;
		padding: 4px 6px;
	 background:#000;
	 border: 1px solid black; 
	 font: 16px tahoma,arial;
	font-weight: bold;
	  color: white;
	   border-radius: 5px;
	   cursor: pointer;"
	  
}


@media screen and (max-width: 1150px) {
	.wrap {
		width:90%;
	}
}

@media screen and (max-width: 970px) {
	.search-form input {
		width:120px;
	}
}

@media screen and (max-width: 860px) {
	.menu {
		position:relative;
		display:inline-block;
	}

	.menu ul.active {
		display:none;
	}

	.menu ul {
		text-decoration-line: none;
		width:100%;
		position:absolute;
		top:120%;
		left:0px;
		padding:10px 18px;
		box-shadow:0px 1px 1px rgba(0,0,0,0.15);
		border-radius:3px;
		background:#303030;
	}

	.menu ul:after {
		text-decoration-line: none;
		width:0px;
		height:0px;
		position:absolute;
		top:0%;
		left:22px;
		content:'';
		transform:translate(0%, -100%);
		border-left:7px solid transparent;
		border-right:7px solid transparent;
		border-bottom:7px solid #303030;
	}

	.menu li {
		margin:5px 0px 5px 0px;
		float:none;
		display:block;
	}

	.menu a {
		display:block;
	}

	.toggle-nav {
		text-decoration-line: none;
		padding:20px;
		float:left;
		display:inline-block;
		box-shadow:0px 1px 1px rgba(0,0,0,0.15);
		border-radius:3px;
		background:#303030;
		text-shadow:0px 1px 0px rgba(0,0,0,0.5);
		color:#777;
		font-size:20px;
		transition:color linear 0.15s;
	}

	.toggle-nav:hover, .toggle-nav.active {
		text-decoration:none;
		color:#66a992;
	}

	.search-form {
		margin:12px 0px 0px 20px;
		float:left;
	}

	.search-form input {
		box-shadow:-1px 1px 2px rgba(0,0,0,0.1);


	}

}</style>


</div>
<div id="div">


	<font size="6"><h2 align="center" class="has-text-color has-text-align-center" style="color:#198838">Ayran Bilek</h2></font>
	<font color="white" size="6"><div align="center"  class="wp-block-image border: 2px; is-style-circle-mask" ><figure class="aligncenter size-large is-resized"><img src="fotos/sonic.jpg" alt="" style="
    border: solid 2px #198838;
	border-radius:120px;
    box-shadow: #0B6138 5px 5px 50px;
	" class="wp-image-15" width="228" height="228"/><figcaption><span class="uppercase"><p>

		<table style="border: solid 1px #fff; box-shadow: #0B6138 5px 5px 50px;"><tr><td>

			<b style="color: #fff;
		border: solid 1px #fff;
		border-radius: 100px;
		background-color:#198838;
     
		">+</b> Filmes<br>
		<b style="
		color: #fff;
		border: solid 1px #fff;
		border-radius: 20px;
		background-color:#198838;
     
		">+</b> Series<br>
		<b style="
		text-align: center;
		color: #fff;
		border: solid 1px #fff;
		border-radius: 100px;
		background-color:#f00;

		">+</b> Jogos
	</tr></td> </table></span></figcaption></figure></div></div> 

	<style type="text/css">
	.sair{
        text-decoration:none;
		padding: 4px 6px;
	 background:#81F781;
	 border: 1px solid black; 
	 font: 16px tahoma,arial;
	font-weight: bold;
	  color: black;
	   border-radius: 5px;}
	</style>


		<!--<div align="center"><input type="button" name="opcoes" value="O" style="
		text-align: center;
		font-size: 34px;
		color: #fff;
		border: solid 2px #fff;
		border-radius: 100px;
		background-color:#198838;
     
		">
		<input type="button" name="opcoes" value="O" style="
		text-align: center;
		font-size: 34px;
		color: #fff;
		border: solid 2px #fff;
		border-radius: 100px;
		background-color:#198838;
     
		">
		<input type="button" name="opcoes" value="O" style="
		text-align: center;
		font-size: 34px;
		color: #fff;
		border: solid 2px #fff;
		border-radius: 100px;
		background-color:#198838;
     
		">
	</div>-->
	
	<!--<div align="center" class="wp-block-button aligncenter"><a class="wp-block-button__link has-background" 
		style="
        
		background-color:#198838;
		border-radius:0px">Editar cor de Fundo</a></div><p>

	<div align="center" class="wp-block-button aligncenter"><a class="wp-block-button__link has-background" 
		style="background-color:#198838;
		border-radius:50px solid:#fff">Editar foto de Perfil</a></div></font></font>-->


		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery_play.js"></script>
		<script type="text/javascript">
			$.noConflict();
		</script>
		
	</head>

	<body>
		<span class="user_online" id="<?php echo $dadosUser['id'];?>"></span>
		<!--DA UM ALERTA COM O NOME DO USUARIO-->
		<script language="javascript" type="text/javascript">alert('Bem vindo, <?php echo $dadosUser['nome'];?>')</script>
		<style type="text/css">
	.sair{
        text-decoration:none;
		padding: 4px 6px;
	 background:#81F781;
	 border: 1px solid black; 
	 font: 16px tahoma,arial;
	font-weight: bold;
	  color: black;
	   border-radius: 5px;}
	</style>
	<!--BOTAO DE SAIR-->
	<a href="?acao=sair" class="sair">Sair</a>
		<aside id="users_online">
			<ul>
			
			<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `id` != ?");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = ($row['foto'] == '') ? 'default.jpg' : $row['foto'];
					$blocks = explode(',', $row['blocks']);
					$agora = date('Y-m-d H:i:s');
					if(!in_array($_SESSION['id_user'], $blocks)){
						$status = 'on';
						if($agora >= $row['limite']){
							$status = 'off';
						}
			?>
				<li id="<?php echo $row['id'];?>">
					<div class="imgSmall"><img src="fotos/<?php echo $foto;?>" border="0" /></div>
					<a href="#" id="<?php echo $_SESSION['id_user'].':'.$row['id'];?>" class="comecar"><?php echo utf8_encode($row['nome']);?></a>
					<span id="<?php echo $row['id'];?>" class="status <?php echo $status;?>"></span>
				</li>
			<?php }}?>
			</ul>
		</aside>

		<aside id="chats">
			
		</aside>
		<script type="text/javascript" src="js/functions.js"></script>
	</body>
</html>
