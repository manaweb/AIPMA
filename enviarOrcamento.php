<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" href="css/cadastro.css" />
		<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	</head>
	<body>
		<div class="principal">
			<?php include 'includes/topo.php'; ?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<?php
						if(!isset($_GET['id'])){
							header("Location:cart.php");
						}

						if (isset($_COOKIE['produto_']))
							unset($_COOKIE['produto_']);

						$cookies = array();
						$i = 0;
						foreach($_COOKIE as $key => $value){
							if('produto_' == substr($key, 0, 8)){
								$cookies[$i] = $key;
								$i++;
							}
						}

					?>
					<div id="corpoTodo" class="clear">
						<div class="aoLado pedido">
							<h3>Pedido realizado em <?php
							date_default_timezone_set('America/Sao_Paulo'); 
							echo date('d/m/Y')?></h3>
							<!--<p>Pedido: </p>-->
							<div class="cabecalhoOrcamento">Produto</div>
							<div>
								<?php
								for($i = 0; $i < sizeof($cookies); $i++){
									$meuArray = unserialize($_COOKIE[$cookies[$i]]);
									$sqlCarrinho = "select * from tbprodutos WHERE id = ".$meuArray['id'];
									$resultado = mysql_query($sqlCarrinho);
									$dadosCarrinho = mysql_fetch_array($resultado);
								?>
									<div class="produto tdProduto clear">
										<a href="veradocao.php?id=<?=$dadosCarrinho['id']?>">
											<img class="aoLadoMiddle" src="painel/arquivos/produtos/<?=$dadosCarrinho['foto1']?>" alt="" />
											<p class="tituloproduto aoLadoMiddle"><?=utf8_encode($dadosCarrinho['nome'])?></p>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="aoLado miniCadastro">
							<?php
								$sqlCadastro = "select * from tbclientes where id = ".$_GET['id']."";
								$result = mysql_query($sqlCadastro);
								$dadosCliente = mysql_fetch_assoc($result);
								$tel = "";
								if($dadosCliente['telefone'] != ""){
									$tel = $dadosCliente['telefone'];
								}else if($dadosCliente['celular'] != ""){
									$tel = $dadosCliente['celular'];
								}
							?>
							<fieldset>
								
								<h3 style="margin-top: 0px;"><img src="img/dados.png" alt="Dados Pessoais"/> Dados pessoais</h3>
								<p><?=$dadosCliente['email']?></p>
								<p><?=$dadosCliente['primeironome']?> <?=$dadosCliente['ultimonome']?></p>
								<p><?=$tel?></p>
								
							</fieldset>
					
							<fieldset>
								<h3 style="margin-top: 0px;"><img src="img/orcamento.png" alt="Pedido" /> Pedido</h3>
								<div class="lblSubmit">
									<button style="top: 0px;display: initial;position: initial;margin: 0;border: none;text-align: center;font-size: 18px;display: inline;background: url(../img/btn_bg_adoteja.png) repeat-x;cursor: pointer;color: white;height: 39px;" id="enviarOrcamento" onclick="javascript:void(0)">Enviar Pedido</button>
								</div>
							</fieldset>
							<div id="carregando" class="carregando clear"><img src='img/loader.gif' alt='Loading' class="imgCarregando" /></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script>
				$(function(){
					/*$(".iframe_bcash").fancybox({ 
						 fitToView : false, 
						 width : 970, 
						 height : 700, 
						 autoSize : false, 
						 closeClick : false, 
						 openEffect : 'none', 
						 closeEffect : 'none'
					}); */
					$("#enviarOrcamento").click(function(){
						$(this).attr('disabled','disabled');
						$('#carregando').show();
						$.ajax({
							url: "finalizar.php?id=<?=$_GET['id']?>&email=<?=$dadosCliente['email']?>",
							type: 'GET',
							dataType: 'html',
							success: function(html) {
								$('#carregando img').replaceWith("<div class='sucessoEnvio'>Pedido enviado com sucesso</div>");
								$(".sucessoEnvio").fadeIn();
								$('#corpoTodo').append(html);
								setTimeout(function() {
									$('.sucessoEnvio').text("Redirecionando para o BCASH, aguarde...");
								},300);
								setTimeout(function() {
									$('form').submit();
								},1200);
							}
						});
					});
				});
			</script>
		</div>
	</body>
</html>