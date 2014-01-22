<!DOCTYPE html>
<html>
	<head>
		<?php include 'includes/header.php'; ?>
		<link rel="stylesheet" href="css/contato.css" />
		<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />	  
	</head>
	<body>
		<div class="principal">
			<?php include 'includes/topo.php'; ?>
			<div id="corpo" class="corpo">
				<div id="conteudoCorpo" class="conteudo">
					<div id="corpoTodo" class="clear">
					<div id="topo-principal">
						<h3>Fale Conosco</h3>
					</div>
					<div style="clear: both;"></div>
					<div id="conteudo-corpo">
						<div id="formulario">
							<p>Preencha o formulário ou entre em contato com nosso departamento comercial. Para outras informações sobre os nossos serviços, basta entrar em contato com a área desejada.</p>
							<form id="myform" action="enviar-contato.php" method="post">
								<label>Nome:<br /> <input type="text" name="nome" class="input-form-cliente input2" required></label><br /><br /><br />
								<label>Email:<br /><input type="email" name="email" class="input-form-cliente input2" required></label><br /><br /><br />
								<label>Telefone:<br /><input style="width: 280px !important" id="telefone" type="text" name="tel" class="input-form-cliente input2" required></label><br /><br /><br />
								<label>Assunto:<br /><input type="text" name="assunto" class="input-form-cliente input2" required></label><br /><br /><br />
								<label>Mensagem:<br /><textarea name="msg" class="textarea" rows="12" required></textarea></label><br /><br />
								<input type="submit" value="Enviar" class="enviar-contato" />
							</form>
						</div>
						
						<div id="localizacao-atendimento">
							<div id="localizacao">
								<h3>ONDE ESTAMOS</h3>
								<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Frederico+Dalmaso,+956,+Sert%C3%A3ozinho&amp;aq=t&amp;sll=-21.275538,-48.319759&amp;sspn=0.070143,0.132093&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Frederico+Dalmaso,+956,+Sert%C3%A3ozinho+-+S%C3%A3o+Paulo,+14166-115,+Rep%C3%BAblica+Federativa+do+Brasil&amp;t=m&amp;z=14&amp;iwloc=A&amp;ll=-21.134951,-47.981274&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Frederico+Dalmaso,+956,+Sert%C3%A3ozinho&amp;aq=t&amp;sll=-21.275538,-48.319759&amp;sspn=0.070143,0.132093&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Frederico+Dalmaso,+956,+Sert%C3%A3ozinho+-+S%C3%A3o+Paulo,+14166-115,+Rep%C3%BAblica+Federativa+do+Brasil&amp;t=m&amp;z=14&amp;iwloc=A&amp;ll=-21.134951,-47.981274" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
							</div>
							
							<div id="atendimento">
								<h3>ATENDIMENTO</h3>
								<p>Rua Frederico Dalmaso, n&deg; 956<br />
									CEP 14166-115<br />
									Alvorada<br />
									Sert&atilde;ozinho - SP
								</p>
								<p>(16) 3945-9104</p>
								<p><a href="mailto:contato@aipma.com.br">contato@aipma.com.br</a></p>
							</div>
						</div>
					</div>
					<?php
						if(isset($_GET['status']) && $_GET['status'] == 1){ ?>
							<script>
								alert('Sua mensagem foi enviada com sucesso');
								window.location = 'index.php';
							</script>
								
					<?php
						}else if(isset($_GET['status']) && $_GET['status'] == 0){?>
							<div id="conteudo-fancybox">
							<style>
								#fancybox-close{
									background: url('img/btn_ok.png') center no-repeat !important;
									position: relative !important;
									cursor: pointer !important;
									z-index: 9999 !important;
									display: inline !important;
									top: -42px !important;
									left: 205px !important;
									padding: 10px 42px;
								}
								#data{
									width: 350px;
									height: 200px;
									padding: 11px 0 0 0 !important;
								}
								#fancybox-wrap{
									z-index: 999999999999 !important;
									width: 494px !important;
									height: 190px !important;
									top: 115px !important;
									left: 655px !important;
								}
								
								#fancybox-content{
									width: 475px !important;
									height: 177px !important;
								}
							</style>
							</div>
							<a style="display: none;" id="inline" href="#data"></a>
				
							<div style="display:none">
								<div id="data" style="padding: 100px;">
									<div style="float: left; width:120px; height: 120px; background: url(img/not-checked.png) center no-repeat;"></div>
									<p>Algo deu errado<br />Desculpe o transtorno<br />Tente Novamente por favor</p>
								</div>
							</div>
						</div>
						
				<?php	
					}
				?>
				</div>
			</div>
			<?php include 'includes/rodape.php'; ?>
		</div>
	</body>
</html>