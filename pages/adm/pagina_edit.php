<?php 

if($_SERVER['REQUEST_METHOD']=="POST")
{
	

	try {
		$id = $_GET['paginaId'];
		$conteudo = $_POST['conteudo'];

		updatePagina($id,$conteudo);

		echo '<br><div class="alert alert-success" role="alert">Página atualizada com sucesso!.</div>
';

	} catch (Exception $e) {
		echo '<br><div class="alert alert-danger" role="alert">Ocorreu um erro: '.$e->getMessage().'.</div>';
	}



}

$pagina = getPage($_GET['paginaId']);

?>
<br>
<a href="adm_paginas" class="btn btn-info pull-right">Voltar a listagem</a>
<h1>Edição de Página</h1>

<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input readonly type="text" name="titulo" class="form-control" value="<?=$pagina['titulo'];?>" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Conteúdo</label>
    <textarea name="conteudo" id="" cols="30" rows="10" class="form-control"><?=$pagina['conteudo'];?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>


<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>