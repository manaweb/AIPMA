<?php
	include("php/config/config.php");
	include("painel/includes/BancoDeDados.php");
	$conexao = db_conectar(); 
?>
<div id="topo" class="menuTopo">
	<div class="tarjaVerde"></div>
	<div id="menuTopoConteudo" class="conteudo">
		<div id="menuEsquerda" class="esquerda">
			<div id="logo">
				<a href="index.php">
					<img src="img/logo.png">
				</a>
			</div>
			<p>Associa&ccedil;&atilde;o Internacional Protetora do Meio Ambiente</p>
		</div>
		<div id="menuDireita" class="direita">
			<div id="informacoes" class="menuDireita">
				<div id="conteudoTarja">
					<ul>
						<li>
							<a href="contato.php" class="email"><p class="icones email">Atendimento por email</p></a>
						</li>
						<li>
							<p class="icones telefone">Denuncie para o AIPMA<br><b>016 3945-9104</b></p>
						</li>
						<li>
							<a href="https://facebook.com/projetoaipma">
								<p class="icones facebook"></p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<ul id="menu" class="menu clear">
				<li>
					<a href="index.php">IN&Iacute;CIO</a>
				</li>
				<li>
					<a href="empresa.php">QUEM SOMOS</a>
				</li>
				<li>
					<a href="adoteja.php">ADOTE JÁ</a>
				</li>
				<li>
					<a href="parceiros.php">PARCEIROS</a>
				</li>
				<li>
					<a href="contato.php">CONTATO</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="banner" class="banner">
	<button class="banner_btn esquerda" id="banner_esquerda" style="cursor: pointer;">
		<a href="javascript:void(0);" class="left"></a>
	</button>
	<button class="banner_btn direita" style="cursor: pointer;" id="banner_direita">
		<a href="javascript:void(0);" class="right"></a>
	</button>
	<div id="conteudoBanner" class="cycle-slideshow"
		data-cycle-slides="> a"
		data-cycle-pager="#pagerBanner"
		data-cycle-prev="#banner_esquerda"
		data-cycle-next="#banner_direita"
		data-cycle-timeout=5000 style="position: absolute;">
		<?php
			$sqlBanner = "select * from tbpublicidade ORDER BY id_publicidade DESC";
			$result = mysql_query($sqlBanner);
			while($dadosBanner = mysql_fetch_array($result)){
				$link = $dadosBanner['destino'] == "" ? "" : "href='".$dadosBanner['destino']."' target='_blank'";
			?>
			<a <?=$link?>>
				<img src="painel/arquivos/banner/<?=$dadosBanner['arquivo']?>" alt="<?=utf8_encode($dadosBanner['titulo'])?>" />
				<!--<div id="pagerBanner"></div-->
			</a>
		<?php } ?>
		
	</div>
</div>