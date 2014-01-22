<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
	</head>
	<body>
		<div class="principal">
			<?php 

				include 'includes/topo.php'; 
				$id = $_GET['id'];
				$consulta = "SELECT id, nome, foto1 FROM tbprodutos";
				if (isset($id))
					$consulta .= " WHERE id_subcategoria = '$id'";
				$query = mysql_query($consulta);

			?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<div class="margem-30">
						<div id="adotejaMenuEsquerda" class="adoteJa esquerda">
							<fieldset>
								<h2>Encontre a árvore que deseja adotar!</h2>
								<label for="pesquisar">Pesquisar por:</label>
								<input type="text" name="pesquisar" id="pesquisar" class="search-input">
								<button style="background-color: #444;border: none;font-size: 16px;color: white;margin: 8px 0px 0px 0px;padding: 5px;cursor: pointer" id="btn_search">Pesquisar</button>
							</fieldset>
							<div>
								<?php
									$ul = '';
									$final = '';
									$q = mysql_query("SELECT * FROM tbprodutos_categorias");
									while ($dados = mysql_fetch_assoc($q)) {
										$final = '';
										$id = $dados['id_categoria'];
										$qq = mysql_query("SELECT * FROM tbprodutos_subcategorias WHERE categoria = '$id'");
										while ($dados2 = mysql_fetch_assoc($qq))
											$final .= '<li><a href="adoteja.php?id='.$dados2['id_subcategoria'].'">'.utf8_encode($dados2['subcategoria']).'</a></li>';
										$ul .= '<ul><li><h3><a href="javascript:void(0);" class="show-hide">'.utf8_encode($dados['categoria']).'</a></h3><ul>'.$final.'</ul></li></ul>';
										
									}
									echo $ul;
								?>
							</div>
						</div>
						<div id="listaAdotar" class="lista-adote direita">
							<h1>Adote Já</h1>
							<div id="lista-de-adocao">
								<ul>
								<?php
									while ($dados = mysql_fetch_assoc($query)) {
								?>
									<li>
										<a href="veradocao.php?id=<?=$dados['id']?>">
											<div class="container">
												<img src="painel/arquivos/produtos/_miniaturas/<?=$dados['foto1']?>">
											</div>
											<p><?=utf8_encode($dados['nome'])?></p>
											<button>Adote Já</button>
										</a>
									</li>
								<?php
									}
								?>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script>
				$(function() {
					$('.adoteJa ul li > ul').hide();
					$('.show-hide').click(function() {
						$(this).parents('li').children('ul').slideToggle('slow');
					});
					$('#btn_search').click(function() {
						$.post('search.php',{pesquisa: $('#pesquisar').val()},function(result) {
							$('#lista-de-adocao').html(result);
						});
					});
				}); 
			</script>
		</div>
	</body>
</html>