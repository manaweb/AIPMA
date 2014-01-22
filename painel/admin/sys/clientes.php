<? 
	define('ID_MODULO',107,true);
	include("../../../php/config/config.php");
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'clientes',
		'tabela'=>'tbclientes',
		'nome'=>'clientes',
		'id'=>'id',
		'urlfixo'=>'', 
		'pasta'=>'clientes',
	);

?>
<div id="acessibilidade">
	Voc&ecirc; est&aacute; aqui: <a href="banner.php">Publicidade</a> &rsaquo; <a href="banner.php">Banners</a> &rsaquo; Consultar
</div>
<div id="conteudo">
<?
	# Imprimir Mensagem (se houver)
	include('../includes/Mensagem.php');




	// -----------------------------------------------------------------------------------------------------------
	// Listagem
	// -----------------------------------------------------------------------------------------------------------

	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>TÃ­tulo			2=>Fonte			3=>Url
		array('texto',		'C&Oacute;DIGO',	'id',				''),
		array('texto',		'CLIENTE',			'cliente',			''),
		array('texto',		'EMAIL',			'email',			''),
		array('texto',		'CELULAR',			'celular',			''),
		array('texto',		'TELEFONE',			'telefone',			''),
	);


	# Consulta SQL
	/*$SQL = "SELECT * FROM ".$Config['tabela']." WHERE 1 ".$busca." ORDER BY titulo ASC";*/
	
	
	$SQL = "
			select c.*, concat(c.primeironome,' ',c.ultimonome) as cliente from tbclientes c
		   ";
	
	
	

	# Processando os dados
	$total = mysql_num_rows(mysql_query($SQL));
	$Lista = new Consulta($SQL,$total,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir'),$Config,false);



	# Paginação
	//echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';


?>
</div>
<? include('../includes/Rodape.php'); ?>