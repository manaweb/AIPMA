<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" type="text/css" href="css/cadastro.css">
		<link rel="stylesheet" type="text/css" href="validator/css/validationEngine.jquery.css">
	</head>
	<body>
		<div class="principal">
			<?php 
				
				include 'includes/topo.php';

				$cookies = array();
				$i = 0;

				if (isset($_COOKIE['produto_']))
					unset($_COOKIE['produto_']);

				foreach($_COOKIE as $key => $value){
					if('produto_' == substr($key, 0, 8)){
						$cookies[$i] = $key;
						$i++;
					}
				}

				if (!isset($cookies[0]))
					header('Location: adoteja.php');
			?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<div id="corpoTodo" class="clear">
						<h3 style="text-align: center;">Para finalizar a compra, informe seu e-mail.<span>Rápido. Fácil. Seguro</span></h3>
						<form method="post" action="cadastro.php" style="text-align: center;">
							<input type="hidden" name="id" value="<?=(isset($_GET['id']) ? $_GET['id'] : "")?>" />
							<input type="hidden" name="qtd" value="<?=(isset($_GET['qtd']) ? $_GET['qtd'] : "")?>" />
							<input type="email" name="email" class="emailValidar validate[required,custom[email]]" placeholder="seu@email.com" /><input type="submit" class="continuar" value="Continuar" />
						</form>
						<br />
						<div class="infoCad">
							<p>Usamos seu e-mail de forma 100% segura para:</p>
							<ul>
								<li>Identificar seu perfil</li>
								<li>Notificar sobre o andamento do seu pedido</li>
								<li>Acelerar o preenchimento de suas informações</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script src="validator/js/jquery.validationEngine-pt_BR.js" type="text/javascript" charset="utf-8"></script>
			<script src="validator/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
			<script>
				$(function(){
					$('form').validationEngine('attach');;
				});
			</script>
		</div>
	</body>
</html>