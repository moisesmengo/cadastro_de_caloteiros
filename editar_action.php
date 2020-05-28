<?php   
    require 'config.php';
    require 'dao/UsuarioDAOMySQL.php';

    $usuarioDao = new UsuarioDAOMySQL($pdo);

    $name = filter_input(INPUT_POST, 'name');
    $value = filter_input(INPUT_POST, 'value');
    $city = filter_input(INPUT_POST, 'city');
    $id = filter_input(INPUT_POST, 'id');

    if($name && $value && $city && $id){

        $usuario = $usuarioDao->findById($id);
        $usuario->setNome($name);
        $usuario->setDivida($value);
        $usuario->setCidade($city);

        $usuarioDao->update($usuario);

        header("Location: index.php");
        exit;

    } else {
        header("Location: editar.php?id=".$id);
        exit;
    }