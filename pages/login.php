<?php 
	if(isLogged())
	{
		redirect('/adm_paginas');
	}
?>
<br>
<h2>Login do Usuário</h2>

<form action="login_submit" method="post" role="form" class="well">
  <div class="form-group">
    <label for="exampleInputEmail1">Usuário</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Informe seu usuário">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>