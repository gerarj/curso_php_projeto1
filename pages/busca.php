<br>
<h1>Resultado da Busca</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<?php
	$result = get_search_result();
	$total_registros = $result->rowCount();

	if($total_registros == 0)
	{
		echo '<div class="alert alert-danger" role="alert">Nenhum resultado foi encontrado para sua busca!</div>';

	}
?>

<?php	

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>	
	<div class="well">
		<h3><?php echo $row['titulo']; ?></h3>
		<p><?php echo substr(strip_tags($row['conteudo']),0,80); ?></p>
		<a href="<?php echo $row['rota']; ?>" class="btn btn-primary pull-right">Visitar Página</a>
		<br clear="all">
	</div>	
	<hr>
<?php		
		
	}
?>