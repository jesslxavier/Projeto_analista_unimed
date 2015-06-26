<?php

// definições de host, database, usuário e senha
$host = "localhost";
$db   = "unimed_portal";
$user = "root";
$pass = "";
// conecta ao banco de dados
$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
// seleciona a base de dados em que vamos trabalhar
mysql_select_db($db, $con);
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT id, titulo, texto, descricao,dataAlteracao FROM tblNoticias WHERE excluida = false order by dataCadastro desc");
// executa a query
$dados = mysql_query($query, $con) or die(mysql_error());
// transforma os dados em um array
$linha = mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);
?>

<html >
<head>
<meta http-equiv="Content-type" content="text/html;charset=ISO-8859-1" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
		<title>Unimed Volta Redonda - Cuidar de Você. Este é o plano.</title>
	<style>

body {
	margin:0px;
	background-color: DarkGreen;
	font-family:"Trebuchet MS", Tahoma, Arial, Verdana;
	font-size:12px;
	color:#000;
	
}

#todo {
	position: relative;
	width: 1050px;
	border: 2px solid green;
	margin:0px auto;
	background-color: white;
}

#topo {
	position: relative;
	width: 1048px;
	height: 100px;
	border: 2px solid green;
		
}

#meio {
	position: relative;
	width: 1050px;
	min-height: 400px;
	background-color: white;
}

#rodape {
	width: 1048px;
	height: 75px;
	border: 2px solid green;
}

#esquerda {
	float: left;
	width: 150px;
	min-height: 464px;
	border: 2px solid green;
}

#miolo {
	float: left;
	width: 638px;
	min-height: 400px;
	border: 2px solid green;
}

#direita {
	float: right;
	width: 250px;
	min-height: 464px;
	border: 2px solid green;
}

#menu {
	width: 150px;
	height: 400px;
}

.itemMenu {
	width: 140px;
	height: 50px;
	background-color: YellowGreen;
	padding: 15px 0px 0px 10px;
	border-bottom: 2px solid green;
	font-size:18px;
    text-align: left;
	 color : white;
	  font-weight: bold;
}
#form {

    text-align: left;
	 color : GREEN;
	  font-weight: bold;
}

#logo {
	float: left;
	width: 200px;
	height: 100px;
	text-align: center;
	background-image: url("https://github.com/jesslxavier/Projeto_analista_unimed.git/images/unimedVR.jpg");  
    background-repeat: no-repeat;
	margin-right: 20px;
}

.secao_miolo {
	width: 628px;
	height: 150px;
	text-align: center;
	background-color: #cccccc;
	margin: 2px 5px 4px 5px;
}

.secao_direita {
	width: 240px;
	height: 100px;
	text-align: center;
	background-color: #cccccc;
	margin: 13px 5px 10px 5px;
}

#rodape_direita {
	float: right;
	width: 300px;
	text-align: right;
	margin: 5px 10px 0px 0px
}

#rodape_direita a{color: #eeeeee; text-decoration: none;}
#rodape_direita a:hover{color: #eeeeee; text-decoration: underline;}
</style>

	</head>
	
<body>
<div id="todo">
	<div id="topo">
	<div id="logo">
		<img src="https://github.com/jesslxavier/Projeto_analista_unimed.git/images/unimedVR.jpg"" alt="" title='Teste' style='position:absolute; left:0px; top: 0px; z-index:3;'width="200" height="100" border="0"/> 
	</div>
</div> 
	<?php
		// se o número de resultados for maior que zero, mostra os dados
		if($total > 0) {
			// inicia o loop que vai mostrar todos os dados
			do {
	?>
	
	<div id="meio">
		<div id="esquerda">
			<div id="menu">
				<div class="itemMenu">Principal</div>
				<div class="itemMenu">Notícias
				<?php // Circula tudo com um link ?>
					<a href="noticia.php?id=<?=$linha['id']?>" style="text-decoration:none;" >
					<h4 class="titulo"><?=$linha['titulo']?></h4>
					<br>
					<p class="descricao"><?=$linha['descricao']?><p>
					<br>
					<p class="data"><?=$linha['dataAlteracao']?></p>
					</a>
				</div>
			<?php
			// finaliza o loop que vai mostrar os dados
			}while($linha = mysql_fetch_assoc($dados));		
		}
			?>
				</div>
				<div class="itemMenu">Dicas de Saúde</div>
				<div class="itemMenu">Eventos</div>
				<div class="itemMenu">Vídeos</div>
			<div id="form"> <center> Administrador 
		</center>
			<form action="" method="post"> 
				<table> 
					<tr> 
						<td><b>Usuário:</b></td> <p>
						<td><input type="Text" name="usuario" size="15" maxlength = "15"/> 
					</tr> 
					<tr> 
						<td><b>Senha:</b></td> 
						<td><input type="password" name="senha" size="8" maxlength= "8" /> <p>
					</tr> 
					<tr> 
						<td><input type="submit" value="Entrar" ></td> 
					</tr> 
				</table> 
			</form> 
			
			</div>
</div>				
			
			
		</div>

		<div id="miolo">
			<div class="secao_miolo">Notícia 1</div>
			<div class="secao_miolo">Notícia 2</div>
			<div class="secao_miolo">Notícia 3</div>
		</div>

		<div id="direita">
			<div class="secao_direita">Foto 1</div>
			<div class="secao_direita">Foto 2</div>
			<div class="secao_direita">Foto 3</div>
			<div class="secao_direita">Foto 4</div>
		</div>
		<div style="clear: both;"></div>
	</div>

	<div id="rodape">
		<div id="rodape_direita">
			<b>SAC - Atendimento 24 horas: 0800 970 9039 </b><br/>
			Atendimento 33 - Rua 33, nº 80, Vila Santa Cecília<br/>
			Sede / Pró Vida - Rodovia dos Metalúrgicos, nº 2.500, Jardim Belvedere, CEP 27258-000 </br>
	
		</div>
	</div>
</div>


	</body>

</html>

<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?>