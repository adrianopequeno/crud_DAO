<?php
  require 'config.php';
  require 'dao/UsuarioDaoMysql.php';

  $usuarioDao = new UsuarioDaoMysql($pdo);

  $usuario = false;
  $id = filter_input(INPUT_GET, 'id');

  if ($id) {
    $usuario = $usuarioDao->findById($id);
  }

  if ($usuario === false) {
    header("Location: editar.php");
    exit;
  }
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
  <!-- Campo Oculto passando o id via POST -->
  <input type="hidden" name="id" value="<?=$usuario->getId();?>" />

  <label>
    Nome: <br/>
    <input type="text" name="name" value="<?=$usuario->getNome();?>" />
  </label>

  <br/><br/>

  <label>
    E-Mail: <br/>
    <input type="text" name="email" value="<?=$usuario->getEmail();?>" />
  </label>

  <br/><br/>

  <input type="submit" value="Salvar"  onclick="return confirm('Tem certeza que deseja Editar?')" />
</form>