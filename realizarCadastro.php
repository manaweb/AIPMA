<?php
	header('Content-type: text/html;charset=UTF-8',true);
	include("php/config/config.php");
	include("painel/includes/BancoDeDados.php");
	$conexao = db_conectar();

	$email = $_POST['email'];
	$primeiroNome = utf8_decode($_POST['firstName']);
	$ultimoNome = utf8_decode($_POST['lastName']);
	$celular = $_POST['celular'];
	$telefone = $_POST['telefone'];
	$cpf = $_POST['cpf'];
	$cnpj = $_POST['cnpj'];
	$razao = utf8_decode($_POST['razao']);
	$cep = $_POST['cep'];
	$endereco = utf8_decode($_POST['endereco']);
	$cidade = utf8_decode($_POST['cidade']);
	$estado = utf8_decode($_POST['estado']);

	$cpf = preg_replace('/[-@\.\/!#$%¨&*\(\)=+*_§¬¢\'"\|><;\?\~\^\[\]\{\} ]/','',$cpf);
	$cnpj = preg_replace('/[-@\.\/!#$%¨&*\(\)=+*_§¬¢\'"\|><;\?\~\^\[\]\{\} ]/','',$cnpj);
	$cep = preg_replace('/[-@\.\/!#$%¨&*\(\)=+*_§¬¢\'"\|><;\?\~\^\[\]\{\} ]/','',$cep);
	$telefone = preg_replace('/[-@\.\/!#$%¨&*\(\)=+*_§¬¢\'"\|><;\?\~\^\[\]\{\} ]/','',$telefone);
	$celular = preg_replace('/[-@\.\/!#$%¨&*\(\)=+*_§¬¢\'"\|><;\?\~\^\[\]\{\} ]/','',$celular);

	$cookies = array();
	$i = 0;
	foreach($_COOKIE as $key => $value){
		if('produto_' == substr($key, 0, 8)){
			$cookies[$i] = $key;
			$i++;
		}
	}
	$strForm = '
	<form name="bcash" action="https://www.bcash.com.br/checkout/pay/" method="post"> 
	<input name="email_loja" type="hidden" value="contato@aipma.com.br"> ';
	$ids = '';
	for($i = 0; $i < sizeof($cookies); $i++){
		$meuArray = unserialize($_COOKIE[$cookies[$i]]);
		$ids .= $meuArray['id'].',';
	}
	$ids = trim($ids,',');

	$query = mysql_query("SELECT * FROM tbprodutos WHERE id IN ($ids)");
	for ($i = 1;$produtos = mysql_fetch_assoc($query);$i++) {
		$meuArray = unserialize($_COOKIE[$cookies[$i-1]]);
		$strForm .= '<input name="produto_codigo_'.$i.'" type="hidden" value="'.$produtos['id'].'">';
		$strForm .= '<input name="produto_descricao_'.$i.'" type="hidden" value="'.htmlentities($produtos['descricao']).'">';
		$strForm .= '<input name="produto_qtde_'.$i.'" type="hidden" value="'.$meuArray['qtd'].'">';
		$strForm .= '<input name="produto_valor_'.$i.'" type="hidden" value="'.($produtos['preco']).'">';
	}
	
	$sqlCadastro = "select * from tbclientes where email = '".$email."'";
	$result = mysql_query($sqlCadastro);
	$numRows = mysql_num_rows($result);
	if($numRows == 0){
		$sql = "insert into tbclientes (email, primeironome, ultimonome, celular, telefone, cpf, cnpj, razao, cep, endereco, cidade, estado) values ('$email', '$primeiroNome', '$ultimoNome', '$celular', '$telefone', '$cpf', '$cnpj', '$razao', '$cep', '$endereco', '$cidade', '$estado')";
		mysql_query($sql);
	}
	$sql = "select * from tbclientes where email = '$email'";
	$dados = mysql_fetch_assoc(mysql_query($sql));
	$idCliente = $dados['id'];
	$strForm .= '

		<input name="email" type="hidden" value="'.$dados['email'].'"> 
		<input name="nome" type="hidden" value="'.$dados['primeironome'].' '.$dados['ultimonome'].'"> 
		<input name="cpf" type="hidden" value="'.$dados['cpf'].'"> 
		<input name="telefone" type="hidden" value="'.$dados['telefone'].'"> 
		<input name="cliente_cnpj" type="hidden" value="'.$dados['cnpj'].'"> 
		<input name="cliente_razao_social" type="hidden" value="'.$dados['razao'].'"> 
		 
		<!-- Dados de Entrega --> 
		<input name="cep" type="hidden" value="'.$dados['cep'].'"> 
		<input name="endereco" type="hidden" value="'.$dados['endereco'].'"> 
		<input name="cidade" type="hidden" value="'.$dados['cidade'].'"> 
		<input name="estado" type="hidden" value="'.$dados['estado'].'">
	</form>';

	file_put_contents("form_bcash_$idCliente.html",$strForm);

	header("Location: enviarOrcamento.php?id=".$dados['id']);
?>