<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" type="text/css" href="zoom/css/zoom.css">
		<link rel="stylesheet" type="text/css" href="css/rfverproduto.css">
		
	</head>
	<body>
		<div class="principal">
			<?php include 'includes/topo.php';
				$id = $_GET['id'];
				$dados = mysql_fetch_array(mysql_query("select * from tbprodutos where id = $id"));
				setlocale(LC_MONETARY,'pt_BR');
			?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<div id="corpoTodo" class="clear larguraTotal">
				<div id="fotoInformacoes" class="larguraTotal">
					<div id="foto" class="aoLado">
						<div id="zoom">
							<img src="painel/arquivos/produtos/<?=$dados['foto1']?>" />
						</div>
						<div id="zoomhover"><img src="painel/arquivos/produtos/<?=$dados['foto1']?>" /></div>
					</div>
					<div id="information" class="aoLado">
						<form action="cart.php?type=add" method="post">
							<input type="hidden" name="id" value="<?=$dados['id']?>" />
							<input type="hidden" name="nome" value="<?=utf8_encode($dados['nome'])?>" />
							<input type="hidden" name="foto1" value="<?=$dados['foto1']?>" />
						<h3 class="corTitulo"><?=utf8_encode($dados['nome'])?><!--JG Colcha Matelassê Premier Malha Grafite HD - Solteiro--></h3>
						<!--<p class="codigo">Cód. do produto: <?=$dados['id']?></p>-->
						<div id="precos">
							<div id="precoPreco">
								<span style="font-weight: bold;">por:</span><span class="preco" id="realPrice"><?=money_format('%n',$dados['preco'])?></span>
							</div>
								<div id="parcelas">
									<div id="parcelaCela">
										<select name="parcelas" id="parcelamento">
											<option value="1">1x</option>
											<option value="2">2x</option>
											<option value="3">3x</option>
											<option value="4">4x</option>
											<option value="5">5x</option>
											<option value="6">6x</option>
											<option value="7">7x</option>
											<option value="8">8x</option>
											<option value="9">9x</option>
											<option value="10">10x</option>
											<option value="11">11x</option>
											<option value="12">12x</option>
										</select>
										de <span id="partPrice"></span> sem juros
									</div>
							</div>
						</div>
						<div style="margin-top: -193px;margin-left: 277px;position: absolute;">
							<span class="forma">Formas de Pagamento</span><br />
							<span class="cartoes">Cartões de Crédito</span><br />
							<a><img src="img/visa.png" /></a>
							<a><img src="img/master.png" /></a>
							<a><img src="img/american.png" /></a>
							<br>
							<a href="javascript:void(0);"><img src="img/bcash.png" /></a>
						</div>
						<div id="escolherQuantidade">
							
							<div id="inputNumber">
								<p>Escolha a quantidade</p>
								<input type="text" id="qtd" name="qtd" value="1" />
								<div id="controls">
									<div class="qtdMore"></div>
									<div class="qtdLess"></div>
								</div>
							</div>
							<input type="submit" class="BUTANONA" value="Adote Já!" style="top: 0px;display: initial;position: initial;margin: 0;border: none;text-align: center;font-size: 18px;display: inline;background: url(../img/btn_bg_adoteja.png) repeat-x;cursor: pointer;" />
							</form>
						</div>
					</div>
				</div>
				<div id="descricao" class="setorAbas">
					<div class="topoAba">
						<span class="aba">
							DESCRIÇÃO DO PRODUTO
						</span>
					</div>
					<div class="conteudoAba">
						<p><?=utf8_encode($dados['descricao'])?></p>
					</div>
					<div class="bottomAba">
						<span class="voltarTopo">
							VOLTAR AO TOPO
						</span>
					</div>
				</div>
				
				<div id="relacionados" class="setorAbas">
					<div class="topoAba">
						<span class="aba">
							QUEM VIU, VIU TAMBÉM
						</span>
						<div class="direita controlesRelacionados">
							<button id="butanona" class="controleEsquerda"></button>
							<button id="butonona" class="controleDireita"></button>
						</div>
					</div>
					<div class="cycle-slideshow abaProdutosRelacionados conteudoAba"
								data-cycle-fx=carousel 
								data-cycle-timeout=0
								data-cycle-next='#butonona'
								data-cycle-prev='#butanona' 
								data-cycle-slides='.produtoRelacionado'
								data-cycle-carousel-visible=4
								data-allow-wrap=false
								style="max-height: 906px;"
								
					>
						<?php
						$sqlProdutosRelacionados = "select * from tbprodutos where id <> $id and id_subcategoria = ".$dados['id_subcategoria'];
						$result = mysql_query($sqlProdutosRelacionados);
						while ($dados2 = mysql_fetch_array($result)) {
						?>
							<div class="produtoRelacionado">
								<img src="painel/arquivos/produtos/<?=$dados2['foto1']?>" />
								<br />
								<a href="veradocao.php?id=<?=$dados2['id']?>" class="saibaMais">Saiba Mais</a>
							</div>
						<?php
						}
						?>
					</div>
					<div class="bottomAba">
						<span class="voltarTopo">
							VOLTAR AO TOPO
						</span>
					</div>
				</div>
			</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script type="text/javascript" src="zoom/js/jquery.zoom.js"></script>
			<script type="text/javascript" src="js/jquery.money.min.js"></script>
			<script>
				$(function(){
					var realPrice = $('#realPrice').text().replace('R$','');
					$('#partPrice').text('R$ '+realPrice);
					realPrice = parseFloat(realPrice.replace('.',''));

					//$('#partPrice').text('R$ '+realPrice.toFixed(2).toString().replace('.',','));
					$(".qtdMore").click(function(){
						var realPrice = $('#realPrice').text().replace('R$','');
						$('#partPrice').text('R$ '+realPrice);
						realPrice = parseFloat(realPrice.replace('.',''));
						$("#qtd").val(parseInt($('#qtd').val())+1);

						var qtd = parseInt($("#qtd").val());
						
						var parcelas = parseInt($('#parcelamento').val());
						
						var partPrice = $('#partPrice');
						if (parseFloat(realPrice) < 999.99) {
							var price = partPrice.text().replace(',','.');
							price = parseFloat(price.replace('R$ ',''));
							partPrice.text(('R$ '+((price/parcelas)*qtd).toFixed(2)).toString().replace('.',','));
						}
						else {
							var price = partPrice.text().replace(/[\,]/,'.').replace(/[\.]/,'');
							price = parseFloat(price.replace('R$ ',''));
							partPrice.text(('R$ '+((price/parcelas)*qtd).toFixed(2)).toString());
							partPrice.priceFormat({ prefix: "R$ ", centsSeparator: ",", thousandsSeparator: "." });
							partPrice.text(partPrice.text().replace('.',','));
						}
							
					});
					
					$(".qtdLess").click(function(){
						var qtd = parseInt($("#qtd").val());
						if(qtd > 1) {
							var realPrice = $('#realPrice').text().replace('R$','');
							$('#partPrice').text('R$ '+realPrice);
							realPrice = parseFloat(realPrice.replace('.',''));
							$("#qtd").val(parseInt($('#qtd').val())-1);

							var qtd = parseInt($("#qtd").val());
							
							var parcelas = parseInt($('#parcelamento').val());
							
							var partPrice = $('#partPrice');
							if (parseFloat(realPrice) < 1000.00) {
								var price = partPrice.text().replace(',','.');
								price = parseFloat(price.replace('R$ ',''));
								partPrice.text(('R$ '+((price/parcelas)*qtd).toFixed(2)).toString().replace('.',','));
							}
							else {
								var price = partPrice.text().replace(/[\,]/,'.').replace(/[\.]/,'');
								price = parseFloat(price.replace('R$ ',''));
								partPrice.text(('R$ '+((price/parcelas)*qtd).toFixed(2)).toString());
								partPrice.priceFormat({ prefix: "R$ ", centsSeparator: ",", thousandsSeparator: "." });
								partPrice.text(partPrice.text().replace('.',','));
							}
						}
					});
					
					$(".voltarTopo").click(function(){
						$("html, body").animate({ scrollTop: 0 }, 600);
						return false;
					});

					$('#parcelamento').change(function() {
						var realPrice = $('#realPrice').text().replace('R$','');
							$('#partPrice').text('R$ '+realPrice);
							realPrice = parseFloat(realPrice.replace('.',''));

							var qtd = parseInt($("#qtd").val());
							
							var parcelas = parseInt($(this).val());
							
							var partPrice = $('#partPrice');
							if (parseFloat(realPrice) < 1000.00) {
								var price = partPrice.text().replace(',','.');
								price = parseFloat(price.replace('R$ ',''));
								partPrice.text(('R$ '+((price/parcelas)*qtd).toFixed(2)).toString().replace('.',','));
							}
							else {
								var price = partPrice.text().replace(/[\,]/,'.').replace(/[\.]/,'');
								price = parseFloat(price.replace('R$ ',''));
								partPrice.text(('R$ '+((price/parcelas)*qtd).toFixed(2)).toString());
								partPrice.priceFormat({ prefix: "R$ ", centsSeparator: ",", thousandsSeparator: "." });
								partPrice.text(partPrice.text().replace('.',','));
							}
					});
				});
			</script>
	</body>
</html>