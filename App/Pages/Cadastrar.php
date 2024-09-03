<?php
// require __DIR__ . "/partials/header.php";
require __DIR__ . "/../Config/Config.php";
?>
<form action="./Cadastrar_Action.php" method="POST" id="form">
    <div class="form-item">
        <label for="nome-usuario">Nome:</label>
        <input type="text" name="Nome" id="nome-usuario">
    </div>
    <div class="form-item">
        <label for="cpf-usuario">Email:</label>
        <input type="text" name="Email" id="Email-usuario">
    </div>
    <div class="form-item">
        <label for="senha-usuario">Senha:</label>
        <input type="password" name="Senha" id="senha-usuario">
    </div>    
    <div>
        <input type="submit" name="btn-action" value="Cadastrar" class="btn btn--verde">        
    </div>
</form>
<?php
// require __DIR__ . "/partials/footer.php";
// require __DIR__ . "/partials/modal.php";
?>