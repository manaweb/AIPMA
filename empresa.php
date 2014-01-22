<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" href="css/sobre.css" />
	</head>
	<body>
		<div class="principal">
			<?php
				include 'includes/topo.php';
			?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<div id="corpoTodo" class="clear">
						
							<div id="topo-principal">
								<h3 style="margin-left: 20px;color: rgb(47, 178, 103); margin-bottom: 2px;">Quem Somos</h3>
								<div id="controles-tamanho-texto">
									<a href="#" id="jfontsize-minus" class="btn-menos"></a> <a href="#" id="jfontsize-plus" class="btn-mais"></a>
								</div>
							</div>
							<div id="texto">
								<?php
									$result = db_consulta("select * from historico order by id desc LIMIT 1");
									while($dados = mysql_fetch_array($result)){
										echo "<p>".utf8_encode($dados['texto'])."</p>";
									}
								?>
							</div>
					</div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script src="js/jquery.jfontsize-1.0.js"></script>
			<script>
				$(document).ready(function(){
					$('#texto *').jfontsize();
				});
			</script>
		</div>
	</body>
</html>