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

<html>
	<head>
		<title>Portal Unimed</title>
	</head>
<body>
<div class="topo">
	Portal Unimed
</div> 
	
	<?php
		// se o número de resultados for maior que zero, mostra os dados
		if($total > 0) {
			// inicia o loop que vai mostrar todos os dados
			do {
	?>
				<div class="login">
					<form>
						<table>
							
						</table>
					</form>
				</div>
			<?php
			// finaliza o loop que vai mostrar os dados
			}while($linha = mysql_fetch_assoc($dados));
		// fim do if 
		}
			?>
	</body>

</html>

<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?>