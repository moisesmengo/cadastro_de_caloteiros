<?php 
    require 'nav.php';
    require 'config.php';

    $info = [];

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue('id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }
?> 

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Editar dados do caloteiro</h1>

        <form action="editar_action.php" method="POST"> 
            <input type="hidden" name="id" value="<?= $info['id'] ?>">
            <div class="form-group">
                <label >Nome:</label>
                <input type="text" class="form-control" name="name" value="<?= $info['nome'] ?>">
            </div>
            <div class="form-group">
                <label>Valor (em R$):</label>
                <input type="number" class="form-control" name="value" value="<?= $info['divida'] ?>">
            </div>
            <div class="form-group">
                <label>Cidade:</label>
                <input type="text" class="form-control" name="city" value="<?= $info['cidade'] ?>" >
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>