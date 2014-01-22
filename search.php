							<?php
								include("php/config/config.php");
								include("painel/includes/BancoDeDados.php");
								$conexao = db_conectar(); 
								$resultado = addslashes(utf8_decode($_POST['pesquisa']));
								$consulta = "SELECT id, nome, foto1 FROM tbprodutos WHERE nome LIKE '%$resultado%'";
								$query = mysql_query($consulta);
								$list = '<ul>';
								while ($dados = mysql_fetch_assoc($query)) {
									$list .= '<li>
										<a href="veradocao.php?id='.$dados['id'].'">
											<div class="container">
												<img src="painel/arquivos/produtos/_miniaturas/'.$dados['foto1'].'">
											</div>
											<p>'.utf8_encode($dados['nome']).'</p>
											<button>Adote Já</button>
										</a>
									</li>
									';
								}
								$list .= '</ul>';
								echo $list;
							?>	