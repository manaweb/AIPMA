<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<style>
			.parceiros .cycle-slideshow {
				width: 90% !important;
			}
		</style>
	</head>
	<body>
		<div class="principal">
			<?php 
				include 'includes/topo.php';
				$query = mysql_query("select * from tbprodutos");
			?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<h1>Plantar uma &aacute;rvore</h1>
					<h2>Plante esta id&eacute;ia!</h2>
					<div id="projetos" class="projetos">
						<div class="imagem esquerda">
							<img src="img/maozinha.jpg">
						</div>
						<div class="texto">
							<div class="marcador esquerda">
								<h3>Projeto</h3>
							</div>
							<span class="textoReal clear"> 
								<h4>Adote uma Árvore</h4>
								Seja um colaborador da natureza e construa um futuro melhor para suas gerações futuras.
								<p>
								Ao adotar uma Árvore você recebera em sua casa um certificado de DEFENSOR da natureza, um lindo mascote de pelúcia. Juntos vamos reflorestar, cuidar e manter todos os animais sem risco de extinção. O planeta esta pedindo nossa ajuda.</p>
								<div class="arvore_ilustrativa">
									
								</div>
								<span class="comoadotar">
									Como adotar uma &aacute;rvore
									<a href="adoteja.php">Clique aqui</a>
								</span>
							</span>
						</div>
					</div>
					<div id="adoteja" class="adoteja">
						<fieldset>
							<legend>Adote Já</legend>
							<div class="banner_rotativo direita">
								<button class="left" id="adote_esquerda"></button>
								<button class="right" id="adote_direita"></button>
							</div>
						</fieldset>
						<div id="attshumpe" style="width: 944px;height: 250px;overflow: hidden;">
							<ul id="adoteumgnomo" style="width: 1000%;height: 250px;overflow: hidden;">
							<?php
								while ($dados = mysql_fetch_assoc($query)) {
							?>
								<li>
									<img src="painel/arquivos/produtos/_miniaturas/<?=$dados['foto1']?>">
									<div class="btn_adoteja">
										<a href="veradocao.php?id=<?=$dados['id']?>">
											<span class="manipular_adote">Adote Já</span>
										</a>
									</div>
								</li>
							<?php 

								} 
								@mysql_free_result($dados);
							?>
							</ul>
						</div>
						<fieldset id="parceiros" class="clear">
							<legend>Parceiros</legend>
							<div class="parceiros">
								<a href="javascript:void(0);" class="esquerda left" id="parceiros_esquerda"></a>
								<a href="javascript:void(0);" class="direita right" id="parceiros_direita"></a>
								<div id="hideParcas" style="width: 820px;overflow: hidden;">
									<ul style="width: 1000%;height: 150px;overflow: hidden;" id="parcas">
										<?php
											$consulta = "SELECT * FROM tbparceiros";
											$query = mysql_query($consulta);
											while ($dados = mysql_fetch_assoc($query)) {
										?>
											<li>
												<a href="<?=$dados['destino']?>">
													<div class="container">
														<img src="painel/arquivos/produtos/<?=$dados['arquivo']?>">
													</div>
												</a>
											</li>
											<?php
												}
											?>
									</ul>
								</div>
							</div>
						</fieldset>
					</div>
					<div id="facebook">
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fprojetoaipma&amp;width=947px&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:947px; height:258px;" allowTransparency="true"></iframe>
					</div>
					<?php @mysql_close($conexao); ?>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script>
				$(function() {
					var pullul = $('#adoteumgnomo li').length;
					var pull = $('#parcas li').length;

					$('#parceiros_direita').click(function() {
						if (pull > 3) {
							var width = $('#parcas li img').eq(pull-1).width()+56;
							$('#parcas').animate({
								marginLeft: '-='+width+'px'
							},600);
							pull--;
						}
					});
					$('#parceiros_esquerda').click(function() {
						if (pull < $('#parcas li').length) {
							var width = $('#parcas li').eq(pull).width()+56;
							$('#parcas').animate({
								marginLeft: '+='+width+'px'
							},600);
							pull++;
						}
					});
					$('#adote_direita').click(function() {
						if (pullul > 4) {
							var width = $('#adoteumgnomo li').eq(pullul-1).width()+2;
							$('#adoteumgnomo').animate({
								marginLeft: '-='+width+'px'
							},600);
							pullul--;
						}
					});
					$('#adote_esquerda').click(function() {
						if (pullul < $('#adoteumgnomo li').length) {
							var width = $('#adoteumgnomo li').eq(pullul).width()+2;
							$('#adoteumgnomo').animate({
								marginLeft: '+='+width+'px'
							},600);
							pullul++;
						}
					});
				});
			</script>
		</div>
	</body>
</html>