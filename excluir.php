<?php 
    require 'config.php';
    require 'dao/UsuarioDAOMySQL.php';

    $UsuarioDAO = new UsuarioDAOMySQL($pdo);

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $UsuarioDAO->delete($id);
    }

    header("Location: index.php");
    exit;
?> 