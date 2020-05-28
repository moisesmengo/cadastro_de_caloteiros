<?php 
    require 'nav.php';
    require 'config.php';
    require 'dao/UsuarioDAOMySQL.php';

    $usuarioDao = new UsuarioDAOMySQL($pdo);

    $usuario = false;

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $usuario = $usuarioDao->findById($id);
    }
    if($usuario === false){
        header("Location: index.php");
        exit;
    }
?> 

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Editar dados do caloteiro</h1>

        <form action="editar_action.php" method="POST"> 
            <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
            <div class="form-group">
                <label >Nome:</label>
                <input type="text" class="form-control" name="name" value="<?= $usuario->getNome(); ?>">
            </div>
            <div class="form-group">
                <label>Valor (em R$):</label>
                <input type="number" class="form-control" name="value" value="<?= $usuario->getDivida(); ?>">
            </div>
            <div class="form-group">
                <label>Cidade:</label>
                <input type="text" class="form-control" name="city" value="<?= $usuario->getCidade(); ?>" >
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>