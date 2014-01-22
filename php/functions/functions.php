<?php


function _listNews($categoryID,$quantity=-1) {

	$html = '';
	$limit = '';


	switch($categoryID) {

		case 29:
			$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem,`tbnoticias_videos`.video, `tbnoticias`.*
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				INNER JOIN `tbnoticias_videos` ON `tbnoticias_videos`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_categoria = $categoryID ORDER BY id_noticia DESC $limit
			");

			if ($quantity > 0) 
				$limit = "LIMIT $quantity";

			$idAnt = 0;
			while ($fetchs = mysql_fetch_assoc($consultaImagens)) {
				if ($fetchs['id_noticia'] != $idAnt) {
	 				$titulo = utf8_encode(html_entity_decode($fetchs['titulo']));
					$dateFormat = date('d/m/Y',strtotime($fetchs['data']));
					$html .= '<li>
								<a href="editoriais/'.$dateFormat.'/'.$fetchs['id_noticia'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'">
									<img src="'.DOMAIN.'painel/arquivos/noticias/_miniaturas/'.$fetchs['imagem'].'" alt="'.$titulo.'"/>
									<div class="globalTexto">
										<h4>'.$titulo.'</h4>
									</div>
								</a>
							</li>';
				}
				$idAnt = $fetchs['id_noticia'];
			}
		break;

		case 30:
			$idAnt = 0;

			if ($quantity > 0) 
				$limit = "LIMIT $quantity";

			$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem,`tbnoticias_videos`.video, `tbnoticias`.*
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				INNER JOIN `tbnoticias_videos` ON `tbnoticias_videos`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_categoria = $categoryID ORDER BY id_noticia DESC
			");
			$i = 0;
			while ($fetchs = mysql_fetch_assoc($consultaImagens)) {
				if ($fetchs['id_noticia'] != $idAnt && $i < $quantity) {
					$titulo = utf8_encode(html_entity_decode(strip_tags($fetchs['titulo'])));
					$dateFormat = date('d/m/Y',strtotime($fetchs['data']));
					$html .= '<li>
									<a href="jornal101fm/'.$dateFormat.'/'.$fetchs['id_noticia'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'">
										<img src="'.DOMAIN.'painel/arquivos/noticias/_miniaturas/'.$fetchs['imagem'].'" alt="'.$titulo.'" />
										<div class="globalTexto">
											<h3 class="desc">'.stripslashes(strip_tags($titulo)).'</h3>
											<h4>'.utf8_encode(html_entity_decode(strip_tags($fetchs['subtitulo']))).'</h4>
										</div>
									</a>
							</li>';
					$idAnt = $fetchs['id_noticia'];
					$i++;
				}
			}
		break;

		case 31:
			$quantity = 1;

			if ($quantity > 0) 
				$limit = "LIMIT $quantity";

			$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem,`tbnoticias_videos`.video, `tbnoticias`.*
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				INNER JOIN `tbnoticias_videos` ON `tbnoticias_videos`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_categoria = $categoryID ORDER BY id_noticia DESC $limit
			");
			while ($fetchs = mysql_fetch_assoc($consultaImagens)) {
				$titulo = utf8_encode(html_entity_decode(strip_tags($fetchs['titulo'])));
				$dateFormat = date('d/m/Y',strtotime($fetchs['data']));
				$html .= '<div id="vereadorAcaoPost">
								
									<img src="'.DOMAIN.'painel/arquivos/noticias/_miniaturas/'.$fetchs['imagem'].'" alt="'.$titulo.'" />
									<div class="globalTexto">
										<h2>
											'.$titulo.'
										</h2>
										<span id="tmpText">
											'.substr(utf8_encode(stripslashes(strip_tags($fetchs['texto']))),0,350).'...
										</span>
										<a href="vereadoremacao/'.$dateFormat.'/'.$fetchs['id_noticia'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'" style="text-decoration: none !important;color: white !important;"><button class="lerMais" style="color: white !important;text-decoration: none;">Veja mais</button></a>
									</div>
							</div>';
			}
		break;

		case 32:
			$quantity = 1;

			if ($quantity > 0) 
				$limit = "LIMIT $quantity";

			$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem,`tbnoticias_videos`.video, `tbnoticias`.*
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				INNER JOIN `tbnoticias_videos` ON `tbnoticias_videos`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_categoria = $categoryID ORDER BY id_noticia DESC $limit
			");
			while ($fetchs = mysql_fetch_assoc($consultaImagens)) {
				$titulo = utf8_encode(html_entity_decode(strip_tags($fetchs['titulo'])));
				$dateFormat = date('d/m/Y',strtotime($fetchs['data']));
				$html .= '<a href="videos/'.$dateFormat.'/'.$fetchs['id_noticia'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'">
							<div id="video">
								<iframe src="'.$fetchs['video'].'"></iframe>
							</div>
							<div class="clear globalTexto">
								<h4>'.substr($titulo,0,65).'</h4>
									<span>
										<span class="data">'.$dateFormat.'</span>
										'.utf8_encode(html_entity_decode(stripslashes(strip_tags($fetchs['subtitulo'])))).'
									</span>
							</div>
						</a>';
			}
		break;

		case 33:
			$quantity = 1;

			if ($quantity > 0) 
				$limit = "LIMIT $quantity";

			$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem,`tbnoticias_videos`.video, `tbnoticias`.*
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				INNER JOIN `tbnoticias_videos` ON `tbnoticias_videos`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_categoria = $categoryID ORDER BY id_noticia DESC $limit
			");
			while ($fetchs = mysql_fetch_assoc($consultaImagens)) {
					$titulo = utf8_encode(html_entity_decode(strip_tags($fetchs['titulo'])));
					$dateFormat = date('d/m/Y',strtotime($fetchs['data']));
					$html .= '<a href="especial/'.$dateFormat.'/'.$fetchs['id_noticia'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'">
								<img src="'.DOMAIN.'painel/arquivos/noticias/'.$fetchs['imagem'].'" alt="'.$titulo.'"  />
									<div class="clear globalTexto">
										<h4>'.stripslashes(substr($titulo,0,65)).'</h4>
											<span>
												<span class="data">'.$dateFormat.'</span>
												'.utf8_encode(html_entity_decode(stripslashes($fetchs['subtitulo']))).'
											</span>
									</div>
								</a>';
				}
		break;

		case 34:
			$quantity = 1;

			if ($quantity > 0) 
				$limit = "LIMIT $quantity";
			
			$consultaImagens = mysql_query("
				SELECT `tbnoticias_imagens`.imagem,`tbnoticias_videos`.video, `tbnoticias`.*
				FROM tbnoticias INNER JOIN tbnoticias_imagens
				ON `tbnoticias_imagens`.id_noticia = `tbnoticias`.id_noticia
				INNER JOIN `tbnoticias_videos` ON `tbnoticias_videos`.id_noticia = `tbnoticias`.id_noticia
				WHERE `tbnoticias`.id_categoria = $categoryID ORDER BY id_noticia DESC $limit
			");
			while ($fetchs = mysql_fetch_assoc($consultaImagens)) {
				$titulo = utf8_encode(strip_tags($fetchs['titulo']));
				$dateFormat = date('d/m/Y',strtotime($fetchs['data']));
				$html .= '<a href="resumodasemana/'.$dateFormat.'/'.$fetchs['id_noticia'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'">
							<img src="'.DOMAIN.'painel/arquivos/noticias/'.$fetchs['imagem'].'" alt="'.$titulo.'"  />
								<div class="clear globalTexto">
									<h4>'.substr($titulo,0,65).'</h4>
										<span>
											<span class="data">'.$dateFormat.'</span>
											'.utf8_encode(stripslashes(strip_tags($fetchs['subtitulo']))).'
										</span>
								</div>
							</a>';
			}
		break;

		case 35:
			if ($quantity > 0) 
				$limit = "LIMIT $quantity";

			$consultaImagens = mysql_query("SELECT id_perfil,titulo,tituloURL,foto FROM tbeditoriais_perfil ORDER BY id_perfil DESC $limit");
			$i = 1;
			$class = '';
			while($fetchs = mysql_fetch_assoc($consultaImagens)) {
				if (!($i%2))
					$class = 'direita fotoDireita';
				else
					$class = 'esquerda fotoEsquerda';
				$titulo = utf8_encode(strip_tags($fetchs['titulo']));
				$html .= '<div class="'.$class.'">
								<a href="/perfil/'.$fetchs['id_perfil'].'-'.$fetchs['tituloURL'].'" title="'.$titulo.'">
								<img src="'.DOMAIN.'painel/arquivos/noticias/'.$fetchs['foto'].'" alt="'.$titulo.'">
								<div class="nomeLink">
									<p>'.$titulo.'</p>
								</div>
							  </a>
						  </div>';
				$i++;
			}
		break;
	}
	return $html;
}

function _listBanners($categoryID,$quantity=-1,$isRand=false) {
	$limit = '';
	$html = '';
	$init = '';
	$final = '';
	$li = '';

	if ($quantity > -1)
		$limit = "LIMIT $quantity";


	$queryBanner = mysql_query("SELECT titulo, descricao, arquivo, destino
	 							FROM tbpublicidade WHERE id_area = $categoryID
	 							AND visibilidade = 1
	 							ORDER BY id_publicidade DESC $limit
	 						");
	switch($categoryID) {
		case 1:
			$init = '<div id="banner_topo" class="direita">';
			while ($fetchs = mysql_fetch_assoc($queryBanner)) {
				$titulo = utf8_encode(stripslashes($fetchs['titulo']));
				$li .= '<a href="'.$fetchs['destino'].'" title="'.$titulo.'"><img src="'.DOMAIN.'painel/arquivos/banner/'.$fetchs['arquivo'].'" /></a>';
			}
			$final .= '</div>';
			$html = $init.$li.$final;
			if (!empty($li) && isset($li))
				return $html;
			else
				return '<br>';
		break;

		case 2:
			$init .= '<div id="banner_corpo" class="bannerBasedGlobo">
						<button class="btn_esquerda" id="btn_esquerda" name="btn_esquerda">
							<img src="img/bannerLikeGlobo_btn_direita.png" alt="Direita" />
						</button>
						<button class="btn_direita" id="btn_direita" name="btn_direita">
							<img src="img/bannerLikeGlobo_btn_esquerda.png" alt="Esquerda" />
						</button>
						<div class="bannerLikeGlobo arredondar">
							<ul id="foo">
					';
		while ($fetchs = mysql_fetch_assoc($queryBanner)) {
			$titulo = utf8_encode(stripslashes($fetchs['titulo']));
			$li .= '<li>
						<a href="'.$fetchs['destino'].'" title="'.$titulo.'">
							<div class="conteudoLikeGlobo">
								<h4 class="titulo">'.$titulo.'</h4>
								<span class="descricao">'.utf8_encode(stripslashes($fetchs['descricao'])).'</span>
							</div>
						</a>
						<img src="'.DOMAIN.'painel/arquivos/banner/'.$fetchs['arquivo'].'" alt="" />
					</li>';
		}
		$final .= '</ul>
			</div>
		</div>';
		$html = $init.$li.$final;
		if (!empty($li) && isset($li))
			return $html;
		else
			return '<br>';
		break;

		case 3:
			$init = '<div id="banner_rotativo" class="clear">
				<div class="cycle-slideshow" data-cycle-fx=scrollHore data-cycle-timeout=5000 data-cycle-pager="#custom-pager" data-cycle-slides="> a" data-cycle-pager-template="<strong><a href=#>{{slideNum}}</a></strong>">';
			while ($fetchs = mysql_fetch_assoc($queryBanner))
				$li .= '<a href="'.$fetchs['destino'].'" title="'.utf8_encode($fetchs['titulo']).'"><img src="'.DOMAIN.'painel/arquivos/banner/'.$fetchs['arquivo'].'" /></a>';
			$final .= '</div>
			<div id="custom-pager" class="center"></div>
			</div>';
			$html .= $init.$li.$final;
			if (!empty($li) && isset($li))
				return $html;
			else
				return '<br>';
		break;

		case 4:

			$init = '<div id="vereadorAcaoPublicidade">
					publicidade';
			while ($fetchs = mysql_fetch_assoc($queryBanner)) {
				$titulo = utf8_encode(stripslashes($fetchs['titulo']));
				$li .= '<a href="'.$fetchs['destino'].'" title="'.$titulo.'"><img src="'.DOMAIN.'painel/arquivos/banner/'.$fetchs['arquivo'].'" /></a>';
			}
			$final = '</div>';
			$html = $init.$li.$final;
			if (!empty($li) && isset($li))
				return $html;
			else
				return '<br>';
		
		break;

		case 5:
			$init = '<div id="banner_cima_editorial" class="arredondar clear">
						<div>';
		while ($fetchs = mysql_fetch_assoc($queryBanner)) {
			$titulo = utf8_encode(stripslashes($fetchs['titulo']));
			$li .= '
						<a href="'.$fetchs['destino'].'" title="'.$titulo.'">
							<img src="'.DOMAIN.'painel/arquivos/banner/'.$fetchs['arquivo'].'" alt="" />
						</a>
					';
		}
		$final = '</div>
					</div>';
		$html = $init.$li.$final;
		if (!empty($li) && isset($li))
			return $html;
		else
			return '<br>';
		break;

		case 6:
			$init = '<div id="banner_editorial" class="clear">';
			while ($fetchs = mysql_fetch_assoc($queryBanner))
				$li .= '<a href="'.$fetchs['destino'].'" title="'.utf8_encode($fetchs['titulo']).'"><img src="'.DOMAIN.'painel/arquivos/banner/'.$fetchs['arquivo'].'" /></a>';
			$final .= '</div>';
			$html .= $init.$li.$final;
			if (!empty($li) && isset($li))
				return $html;
			else
				return '<br>';
		break;
	}

	return $html;

}