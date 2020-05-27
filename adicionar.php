<?php require 'nav.php' ?> 

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Cadastrar mais um caloteiro</h1>

        <form action="adcionar_action.php" method="POST">
            <div class="form-group">
                <label >Nome:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" class="form-control" name="email">
            </div>

            <button type="submit" class="btn btn-primary">Adcionar Caloteiro</button>
        </form>
    </div>
</div>