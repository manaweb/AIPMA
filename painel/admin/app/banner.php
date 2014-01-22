<?php
	define('ID_MODULO',0,true);
	include("../../../php/config/config.php");

	include("../includes/Config.php");
	

	
	foreach ($_POST as $campo => $valor) $$campo = $valor;
	
	$Config = array(
		'arquivo'=>'banner',
		'tabela'=>'tbpublicidade',
		'id'=>'id_publicidade',
		'urlfixo'=>'',
		'pasta'=>'banner',
		'imagem'=>array(
			'x'=>1920, 'y'=>500, 'corte'=>1, 
			'mini'=>array(
				'x'=>224, 'y'=>224, 'corte'=>0
			)
		)
	);

	// -----------------------------------------------------------------------------------------------------------
	// Incluir ou alterar dados no banco de dados
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="dados") {

		/*# Testes
		$Erros='';
		$size = sizeof($_FILES['foto']['name']);
		if (strlen($titulo) < 2) $Erros .= "- Título|";
		for ($i = 0;$i < $size;$i++)
			if (  (! validaTipoArquivo($_FILES['foto']['name'][$i],1)) && (!($id_noticia>0)) ) $Erros .= "<br>Tipo de arquivo não aceito! Envie JPG, GIF ou PNG";


		# Se houver erro, SAI
		if (strlen($Erros)) { header('Location: ../sys/'.$Config2['arquivo'].'_dados.php?ID='.$$cnf['id'].$Config['urlfixo'].'&erro='.urlencode("<b>Dados inválidos:</b>|".$Erros),true); exit; }*/

		
		# Dados;
		$dados = array('id_area'=>$id_area, 'titulo'=>$titulo, 'destino'=>$destino, 'dimx'=>$dimx, 'dimy'=>$dimy);

		# Arquivos
	
		if (!empty($_FILES['arquivo']['name'])) {
			$dados['arquivo'] = processaArquivo('arquivo',$Config,$_FILES,1,'imagem');
			if ($dados['arquivo'] == false) { header("Location: ../sys/".$Config2['arquivo'].".php?erro=".urlencode('Erro processando Imagem.'),true); exit; }
		}

		# Executando 
		if ($$Config['id']>0) {

			# Apagando a Imagem se houver uma nova cadastrada
			db_apagaArquivo('arquivo',$Config,$$Config['id']);

			db_executa($Config['tabela'],$dados,'update', $Config['id'].'='.$$Config['id']);

		} else {

			//$dados['data']='now()';

			db_executa($Config['tabela'],$dados);
			
			/*$result = mysql_query("SHOW TABLE STATUS LIKE '".$Config['tabela']."'");
			$row = mysql_fetch_array($result);
			$nextId = $row['Auto_increment']-1;
			mysql_free_result($result);

			$dados2['id_noticia'] = $nextId;
			$consulta = db_consulta("SELECT id_img FROM tbnoticias_imagens");
			$tmpDados = $dados2;
			for ($i = 0; $i < $size;$i++) {
				$tmpVar = $tmpDados['imagem'][$i];
				$dados2['imagem'] = $tmpVar;
				db_executa($Config2['tabela'],$dados2);
			}*/
			
			# Cadastrar novo endereço
			$dados_end = array('id_categoria'=>$id_categoria);


		}


		header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Feito.'),true); exit;

	}


	// -----------------------------------------------------------------------------------------------------------
	// Excluir um registro e seus arquivos
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="excluir") {
		$id=(int)$_GET['id'];
		/*$consultaImagens = mysql_query("
			SELECT `tbnoticias_imagens`.imagem, `tbnoticias`.tituloURL
			FROM tbnoticias INNER JOIN tbnoticias_imagens
			ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
			WHERE `tbnoticias`.id_noticia = $id;
		");
		$arquivos = array();
		while ($c = mysql_fetch_array($consultaImagens)) {
			$arquivos[] = $c['imagem'];
			unlink(DOMAIN."cache/$tituloURL");
		}*/
		if ($id>0) {
			# Apagando os arquivos
			db_apagaArquivo('arquivo',$Config,$id,$arquivos);

			# Excluindo do Bando de dados
			db_consulta("DELETE FROM ".$Config['tabela']." WHERE id_publicidade=$id");
			db_consulta("DELETE FROM ".$Config['tabela']." WHERE ".$Config['id']."=".$id);
			header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Excluido.'),true); exit;

		}
	}








	// -----------------------------------------------------------------------------------------------------------
	// Apaga vários itens de uma vez só
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="excluir_massa") {
		
		if (is_array($check)) 
		foreach ($check as $id) {
			/*$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem, `tbnoticias`.tituloURL 
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_noticia = $id;
			");
			$arquivos = array();
			while ($c = mysql_fetch_array($consultaImagens))
				$arquivos[] = $c['imagem'];*/
			if ($id>0) {

				# Apagando os arquivos 
				db_apagaArquivo('arquivo',$Config,$id,$arquivos);
	
				# Excluindo do Bando de dados
				db_consulta("DELETE FROM ".$Config['tabela']." WHERE id_publicidade=$id");
				db_consulta("DELETE FROM ".$Config['tabela']." WHERE ".$Config['id']."=".$id);
				

			}
		}
		header("Location: ../sys/".$Config['arquivo'].".php?msg=".urlencode('Feito').$Config['urlfixo'],true); exit;
	}







	// -----------------------------------------------------------------------------------------------------------
	// Alterando flags
	// -----------------------------------------------------------------------------------------------------------
	if ($_GET['faz']=="flag") {
		list($valor) = db_dados("SELECT ".$_GET['flag']." FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['id']);
		if ($valor==1) $valor='0'; else $valor='1';
		
		db_executa($Config['tabela'],array($_GET['flag']=>$valor),'update', $Config['id'].'='.$_GET['id']);
		header("Location: ".urldecode($_GET['origem'])."?&msg=Atualizado",true); exit;
	}






	// Se nada for feito...
	header("Location: ../sys/".$Config['arquivo'].".php?info=".urlencode('Nada feito'),true); exit;
	
?>