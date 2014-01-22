<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<style>
			.lista-adote li img {
				width: 224px;
				height: auto;
				margin: 0 auto;
				display: block;
			}
			.lista-adote li a {
				display: table-cell;
			}
			.lista-adote button {
				margin-left: -45px;
			}
		</style>
	</head>
	<body>
		<div class="principal">
			<?php 

				include 'includes/topo.php'; 
				$consulta = "SELECT * FROM tbparceiros";
				$query = mysql_query($consulta);

			?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<div id="listaAdotar" class="lista-adote" style="width: 947px;position: initial;">
						<h1>Parceiros</h1>
						<ul>
						<?php
							while ($dados = mysql_fetch_assoc($query)) {
						?>
							<li>
								<a href="<?=$dados['destino']?>">
									<div class="container">
										<img src="painel/arquivos/produtos/<?=$dados['arquivo']?>">
									</div>
									<div id="visit" style="margin: 0 auto;display: block;text-align: center;">
										<p><?=utf8_encode($dados['titulo'])?></p>
										<button>VISITAR</button>
									</div>
								</a>
							</li>
							<?php
								}
							?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
		</div>
	</body>
</html>