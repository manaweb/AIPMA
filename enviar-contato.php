<?php
	$contato = str_replace('Painel','Contato','AIPMA');
	$mail = "contato@aipma.com.br";
	
	$d = date('d-m-Y h:i');
	$u = $_POST['nome'];
	$e = $_POST['email'];
	$t = $_POST['tel'];
	$a = $_POST['assunto'];
	$m = $_POST['msg'];
	$i = $_SERVER['REMOTE_ADDR'];
	
	$headers = "";
	$msg = "";
	
	$header .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: $contato		<$mail>\r\n";
	
	$msg = "<html><body>";
	$msg .="<p><b><font face= verdana size=2 color=#003366 >Dados enviados em: $d do IP: $i</b></font></p>";
	$msg .= "<br><strong><font face= verdana size=2 color=#003366 >Nome: </strong> $u</font>";
	$msg .= "<br><strong><font face= verdana size=2>E-mail:</strong>  $e</font>";
	$msg.= "<br><strong><font face= verdana size=2>Telefone:</strong>  $t</font>";
	$msg .= "<br> <strong><font face= verdana size=2>Assunto:</strong> $a</font>";
	$msg .= "<br> <strong><font face= verdana size=2>Mensagem:</strong> $m</font>";
	$msg .= "</body></html>";
	
	if (mail($mail,$a,$msg,$headers)) {
		echo "<script>window.location = 'contato.php?status=1'</script>";
	} else {
		echo "<script>window.location = 'contato.php?status=0'</script>";
	} 
?>