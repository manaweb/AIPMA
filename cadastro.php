<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" type="text/css" href="css/cadastro.css">
		<link rel="stylesheet" type="text/css" href="validador/css/validador.css">
	</head>
	<body>
		<div class="principal">
			<?php include 'includes/topo.php'; ?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<?php
						if(!isset($_POST['email'])){
							header("Location:cart.php");
						}
						$email = $_POST['email'];
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

						if (!isset($cookies[0]))
							header('Location: adoteja.php');

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
							<fieldset>
								<h3><img src="img/dados.png" alt="Dados Pessoais"/> Dados pessoais</h3>
								<p>Solicitamos apenas as informações essenciais para o pedido</p>
								<?php
									$sqlCadastro = "select * from tbclientes where email = '".$email."'";
									$result = mysql_query($sqlCadastro);
									$numRows = mysql_num_rows($result);
									$firstName = $lastName = $telefone = $celular = $cpf = "required";
									/*if($numRows > 0){
										$dadosCliente = mysql_fetch_assoc($result);
										$firstName = "value='".$dadosCliente['primeironome']."' readonly";
										$lastName = "value='".$dadosCliente['ultimonome']."' readonly";
										$telefone = "value='".$dadosCliente['telefone']."' readonly";
										$celular = "value='".$dadosCliente['celular']."' readonly";
									} */
								?>
								<form method="post" action="realizarCadastro.php" class="validador">
									<label class="lblEmail">
										E-mail<br />
										<input type="email" name="email" class="input-text input-email" value="<?=$email ?>" readonly />
									</label>
									<label class="lblText">
										Primeiro nome*<br />
										<input type="text" name="firstName" class="input-text"  />
									</label>
									<label class="lblText">
										Último nome*<br />
										<input type="text" name="lastName" class="input-text" />
									</label>
									<label class="lblText">
										Celular*<br />
										<input type="text" name="celular" id='celular' class="input-text" />
									</label>
									<label class="lblText">
										Telefone*<br />
										<input type="text" name="telefone" id='telefone' class="input-text maskTelefone" />
									</label>
									<label class="lblText">
										CPF*<br />
										<input type="text" name="cpf" id='cpf' class="input-text" />
									</label>
									<label class="lblText">
										CNPJ*<br />
										<input type="text" name="cnpj" id='cnpj' class="input-text" />
									</label>
									<label class="lblText">
										Raz&atilde;o Social*<br />
										<input type="text" name="razao" id='razao' class="input-text" />
									</label>
									<fieldset style="margin-top: 15px;">

										<legend>Endere&ccedil;o</legend>
										<label class="lblText">
											CEP*<br>
											<input type="text" name="cep" id="cep" class="input-text">
										</label>
										<span id="btnBuscarCep">Buscar</span>
										<label class="lblText logradouro">
											Logradouro<br>
											<input type="text" name="logradouro" id="logradouro" class="input-text">
										</label>
										<label class="lblText">
											Nº/Complemento<br>
											<input type="text" name="numero" id="numero" class="input-text">
										</label>
										<label class="lblText">
											Bairro<br>
											<input type="text" name="bairro" id="bairro" class="input-text validate[required]">
										</label>
										<label class="lblText">
											Cidade*<br>
											<input type="text" name="cidade" id="cidade" class="input-text validate[required]">
										</label>
										<label class="lblText">
											Estado*<br>
											<input type="text" name="estado" id="estado" maxlength="2" class="input-text">
										</label>
										
									</fieldset>
									<div class="lblSubmit" style="margin-top: 15px;margin-bottom: 15px;">
										<input type="radio" value="fisica" name="pessoa" id="fisica" checked /> Fisica <input type="radio" value="juridica" name="pessoa" id="juridica" /> Juridica
									</div>
									<div class="lblSubmit">
										<input type="submit" style="top: 0px;display: initial;position: initial;margin: 0;border: none;text-align: center;font-size: 18px;display: inline;background: url(../img/btn_bg_adoteja.png) repeat-x;cursor: pointer;color: white;height: 39px;" value="Finalizar Pedido"/>
									</div>
								</form>
							</fieldset>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
			<script type="text/javascript" src="js/jquery.blockUI.js"></script>
			<script type="text/javascript" src="js/CEP.js"></script>
			<script src="js/jquery.maskedinput.js"></script>
			<script src="validador/js/jquery.validator.min.js" type="text/javascript"></script>
		    <script>
				$(function() {
					jQuery.validator.addMethod("cpf",function(cpf,element) {
					var cpf = cpf;
					cpf = cpf.replace(/[^\d]+/g,'');

					var numeros, digitos, soma, i, resultado, digitos_iguais;
					digitos_iguais = 1;
					if (cpf.length < 11)
						return false;
					for (i = 0; i < cpf.length - 1; i++)
						if (cpf.charAt(i) != cpf.charAt(i + 1))
						{
							digitos_iguais = 0;
							break;
						}
					if (!digitos_iguais)
					{
						numeros = cpf.substring(0,9);
						digitos = cpf.substring(9);
						soma = 0;
						for (i = 10; i > 1; i--)
							soma += numeros.charAt(10 - i) * i;
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

						if (resultado != digitos.charAt(0))
							return false;
						numeros = cpf.substring(0,10);
						soma = 0;
						for (i = 11; i > 1; i--)
							soma += numeros.charAt(11 - i) * i;
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(1))
							return false;
						return true;
					}
					else
						return false;
					},'Campo CPF inv&aacute;lido');
					jQuery.validator.addMethod("cnpj",function(cnpj,element) {
						var cnpj = cnpj;
						cnpj = cnpj.replace(/[^\d]+/g,'');


						if(cnpj == '') return false;

						if (cnpj.length != 14)
							return false;

						// Elimina CNPJs invalidos conhecidos
						if (cnpj == "00000000000000" ||
							cnpj == "11111111111111" ||
							cnpj == "22222222222222" ||
							cnpj == "33333333333333" ||
							cnpj == "44444444444444" ||
							cnpj == "55555555555555" ||
							cnpj == "66666666666666" ||
							cnpj == "77777777777777" ||
							cnpj == "88888888888888" ||
							cnpj == "99999999999999")
							return false;

						// Valida DVs
						tamanho = cnpj.length - 2
						numeros = cnpj.substring(0,tamanho);
						digitos = cnpj.substring(tamanho);
						soma = 0;
						pos = tamanho - 7;
						for (i = tamanho; i >= 1; i--) {
							soma += numeros.charAt(tamanho - i) * pos--;
							if (pos < 2)
							pos = 9;
						}
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(0))
							return false;

						tamanho = tamanho + 1;
						numeros = cnpj.substring(0,tamanho);
						soma = 0;
						pos = tamanho - 7;
						for (i = tamanho; i >= 1; i--) {
							soma += numeros.charAt(tamanho - i) * pos--;
							if (pos < 2)
							pos = 9;
						}
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(1))
							return false;

						return true;

					},'Campo CNPJ inv&aacute;lido');

					jQuery.validator.addMethod("celular",function(celular,element) {
						var reg = null;
						var numeros = celular.match(/\d{2}/);

						if (parseInt(numeros) > 10  && parseInt(numeros) < 20)
							reg = /\([0-9]{2}\) ([6-9])([0-9]{4}-([0-9]{4}))/;
						else
							reg = /\([0-9]{2}\) ([6-9])([0-9]{3,4}-([0-9]{4}))$/;
						if (celular.match(reg) == null) return false;
						return true;

					},'Campo Celular inv&aacute;lido');

					$('#celular').mask('(99) 9?9999-9999');
					$('#telefone').mask('(99) 9999-9999');
					$('#cep').mask('99.999-999');
					$('#cpf').mask('999.999.999-99');
					$('#cnpj').mask('99.999.999/9999-99');
					
					$('#cnpj,#razao').parents('label').hide();

					$('.validador').validate({
						rules: {
							name: 'required',
							email: {
								required: true,
								email: true
							},
							firstName: {
								required: true,
								maxlength: 40
							},
							lastName: {
								required: true,
								maxlength: 40
							},
							celular: {
								required: true,
								celular: {celular: true}
							},
							cpf: {
								required: true,
								cpf: {cpf: true}
							},
							cnpj: {
								required: true,
								cnpj: {cpnj: true}
							}
						},
						messages: {
							firstName: 'Preencha o campo nome corretamente',
							lastName: 'Preencha o campo &uacute;ltimo nome corretamente',
							email: 'Preencha o campo e-mail corretamente',
							cpf: 'Preencha o campo CPF corretamente',
							cnpj: 'Preencha o campo CNPJ corretamente',
							celular: 'Preencha o campo celular corretamente'
						}
					});
					$('input[type=radio]').change(function() {
						if ($(this).attr('id') == 'juridica')
							$('#cnpj,#razao').parents('label').show('slow');
						else
							$('#cnpj,#razao').parents('label').hide('slow');
					});
					$('form').submit(function() {
						if (!$(this).valid()) {
							$('.validador input.error:not(:first)').removeClass('error');
							$('.validador label.error:not(:first)').hide();
						}
					});
				});
		    </script>
		</div>
	</body>
</html>