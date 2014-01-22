<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" type="text/css" href="css/cart.css">
	</head>
	<body>
		<div class="principal">
			<?php include 'includes/topo.php';  ?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<?php
						include "orcamento/cart/produto.class.php";
						include "orcamento/cart/carrinho.class.php";

						$Cart = new Carrinho;

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

						

						if (isset($_POST)){
							$Produto = new Produto($_POST);
							$Cart->AddCart($Produto);
						}
						if($_GET['type'] == 'add'){
							header("Location: cart.php");
						}else if($_GET['type'] == 'remove'){
							$id = $_GET['id'];
							setcookie("produto_$id",NULL);
							header("Location: cart.php");
						}else {
							if (!isset($cookies[0]))
								header('Location: adoteja.php');
						}
						

					?>
					<div id="corpoTodo" class="clear">
					<table>
						<thead>
							<tr>
								<th>Produto</th>
								<th>Código do Produto</th>
								<th>Preço</th>
								<th>Quantidade</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							for($i = 0; $i < sizeof($cookies); $i++){
								$meuArray = unserialize($_COOKIE[$cookies[$i]]);
								$sqlCarrinho = "select * from tbprodutos WHERE id = ".$meuArray['id'];
								$resultado = mysql_query($sqlCarrinho);
								$dadosCarrinho = mysql_fetch_array($resultado);
							?>
							<tr>
								<td class="tdProduto">
									<input type="hidden" value="<?=$meuArray['id']?>" class="idProduto" />
									<a href="veradocao.php?id=<?=$dadosCarrinho['id']?>" style="text-decoration: none;">
										<img src="painel/arquivos/produtos/<?=$dadosCarrinho['foto1']?>" alt="" />
										<p class="aoLado tituloproduto" style=""><?=utf8_encode($dadosCarrinho['nome'])?></p>
										<p style="margin-top: 0px;font-size: 15px;color: #444;"><?=utf8_encode($dadosCarrinho['descricao'])?></p>
									</a>
								</td>
								<td class="tdCod">
									<span><?=$meuArray['id']?></span>
								</td>
								<td class="tdPreco">
									R$ <span class="vUnitario" style="font-weight: bold;"><?=$dadosCarrinho['preco']?></span>
								</td>
								<td class="tdQtd">
									<a class="menos"></a>
									<input type="text" name="qtd" readonly value="<?=$meuArray['qtd']?>" class="qtdCart" />
									<a class="mais"></a>
								</td>
								<td>
									R$ <span class="vTotal"><?=($dadosCarrinho['preco'] * $meuArray['qtd'])?></span>
								</td>
								<td><a href="javascript:void(0)" class='remover' id='<?=$dadosCarrinho['id']?>'>X</a></td>
							</tr>
						<?php } ?>
							
						</tbody>
					</table>
					<div class="totais">
						<p class="subtotal">Subtotal (R$)<input type="text" value="" class="subtotalGeral"/></p>
						<p class="total">Total (R$) <input type="text" value="" class="totalGeral"/></p>
					</div>
					<div class="clear fecharPedido">
						<a class="escolherMais" href="adoteja.php" style="margin-top: 5px;margin-right: 15px;float: left;">Escolher mais produtos</a>
						<a href="javascript:void(0)" id="btnFinalizar" style="text-decoration: none;"><button class="BUTANONA" style="top: 0px;display: initial;position: initial;margin: 0;border: none;text-align: center;font-size: 18px;cursor: pointer;width: 180px;background: url(../img/btn_bg_adoteja.png) repeat-x;cursor: pointer;">Ir para Entregas</button></a>
					</div>
					<div class="clear"></div>
				</div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script>
				$(function(){
					calcularTotais();
					$(".mais").click(function(){
						var columnIndex = $('.mais').index(this);
						var vUnitario = parseFloat($(".vUnitario").eq(columnIndex).text().replace(",","."));
						var qtd = parseInt($(".qtdCart").eq(columnIndex).val());
						$(".qtdCart").eq(columnIndex).val(qtd+1);
						var total = vUnitario * (qtd+1);
						$('.vTotal').eq(columnIndex).text((total.toFixed(2)).toString().replace(".",","));
						
						calcularTotais();
						
					});
					
					$(".menos").click(function(){
						var columnIndex = $('.menos').index(this);
						var vUnitario = parseFloat($(".vUnitario").eq(columnIndex).text().replace(",","."));
						var qtd = parseInt($(".qtdCart").eq(columnIndex).val());
						if(qtd > 1){
							$(".qtdCart").eq(columnIndex).val(qtd-1);
							var total = vUnitario * (qtd-1);
							$('.vTotal').eq(columnIndex).text((total.toFixed(2)).toString().replace(".",","));
						}
						calcularTotais();
					});
					
					function calcularTotais(){
						var total = 0;
						var valor = 0;
						$(".vTotal").each(function(){
							valor = parseFloat($(this).text().replace(",","."));
							total += valor;
						})
						$(".subtotalGeral, .totalGeral").val((total.toFixed(2)).toString().replace(".",","));
					}

					$(".remover").click(function(){
						if(confirm("Deseja mesmo remover este item do carrinho?")){
							window.location = 'cart.php?type=remove&id=' + $(this).attr('id');
						}
					})

					$("#btnFinalizar").click(function(){
						var produtos = new Array();
						var quantidades = new Array();
						for(i = 0; i < $(".idProduto").size();i++){
							produtos[i] = $(".idProduto").eq(i).val();
							quantidades[i] = $(".qtdCart").eq(i).val();
						}
						window.location = "cadastrar.php?id="+produtos+"&qtd="+quantidades;
					})
				});
			</script>
		</div>
	</body>
</html>