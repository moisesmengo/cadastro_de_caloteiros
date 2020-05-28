<?php   
    require 'config.php';
    require 'dao/UsuarioDAOMySQL.php';

    $usuarioDao = new UsuarioDAOMySQL($pdo);

    $name = filter_input(INPUT_POST, 'name');
    $value = filter_input(INPUT_POST, 'value');
    $city = filter_input(INPUT_POST, 'city');

    if($name && $value && $city){

        $novoUsuario = new Usuario();
        
        $novoUsuario->setNome($name);
        $novoUsuario->setDivida($value);
        $novoUsuario->setCidade($city);

        $usuarioDao->add($novoUsuario);

        header("Location: index.php");
        exit;

    } else {
        header("Location: adicionar.php");
        exit;
    }