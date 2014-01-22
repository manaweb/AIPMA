<? 
	define('ID_MODULO',83,true);
	include("../../../php/config/config.php");
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'parceiros',
		'tabela'=>'tbparceiros',
		'nome'=>'titulo',
		'id'=>'id',
		'urlfixo'=>'', 
		'pasta'=>'parceiros',
	);

?>
<div id="acessibilidade">
	Voc&ecirc; est&aacute; aqui: <a href="parceiros.php">Parceiros</a> &rsaquo; &rsaquo; Consultar
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
		array('texto',		'T&Iacute;TULO',	'titulo',			''),
		array('texto',		'URL',				'destino',			''),
		array('foto',		'IMAGEM',			'arquivo',			''),
	);


	# Consulta SQL
	/*$SQL = "SELECT * FROM ".$Config['tabela']." WHERE 1 ".$busca." ORDER BY titulo ASC";*/
	
	
	$SQL = "
			SELECT * FROM tbparceiros ORDER BY id DESC
		   ";
	
	
	

	# Processando os dados
	$Lista = new Consulta($SQL,300,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir','editar'),$Config,true);


?>
</div>
<? include('../includes/Rodape.php'); ?>