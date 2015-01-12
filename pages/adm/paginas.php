<br>
<a href="logout" class="btn btn-right btn-danger pull-right">Sair</a>
<h1>Listagem de Páginas</h1>
<?php
	
	$stm = getPaginas();
?>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titulo</th>
			<th>Ações</th>
		</tr>
	</thead>

	<tbody>
<?php	

	while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
?>			
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['titulo']; ?></td>
			<td><a href="adm_pagina_edit?paginaId=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a></td>
		</tr>
<?php
	}
?>
	</tbody>
</table>