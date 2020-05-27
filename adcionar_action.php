<?php   
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $value = filter_input(INPUT_POST, 'value');
    $city = filter_input(INPUT_POST, 'city');

    if($name && $value && $city){

        $sql = $pdo->prepare("INSERT INTO usuarios (nome, divida, cidade) VALUES (:name, :value, :city)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':value', $value);
        $sql->bindValue(':city', $city);
        $sql->execute();

        header("Location: index.php");
        exit;

    } else {
        header("Location: adicionar.php");
        exit;
    }