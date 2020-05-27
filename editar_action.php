<?php   
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $value = filter_input(INPUT_POST, 'value');
    $city = filter_input(INPUT_POST, 'city');
    $id = filter_input(INPUT_POST, 'id');

    if($name && $value && $city && $id){

        $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, divida = :value, cidade = :city WHERE id = :id");
       
        $sql->bindValue(':name', $name);
        $sql->bindValue(':value', $value);
        $sql->bindValue(':city', $city);
        $sql->bindValue(':id', $id);

        $sql->execute();

        header("Location: index.php");
        exit;

    } else {
        header("Location: editar.php");
        exit;
    }