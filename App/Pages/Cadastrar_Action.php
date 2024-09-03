<?php
// require __DIR__ . "/partials/header.php";
require __DIR__ . "/../Config/Config.php";



$Nome = filter_input(INPUT_POST,"Nome");
$Email = filter_input(INPUT_POST,"Email");
$Senha = filter_input(INPUT_POST,"Senha");

if ($Nome && $Email && $Senha) {
    $sql = $pdo->prepare("INSERT INTO usuarios (Nome, Email, Senha) VALUES (:Nome, :Email, :Senha)");
    $sql->bindValue(":Nome", $Nome);
    $sql->bindValue(":Email", $Email);
    
    // Criptografando a senha antes de inserir no banco de dados
    $pwdcrypt = password_hash($Senha, PASSWORD_DEFAULT);
    $sql->bindValue(":Senha", $pwdcrypt);
    
    $sql->execute();
    
    // Redirecionando para a página de login após o cadastro
    header('Location: Login.php');
    exit;
} else {
    header('Location: Login.php');
    
}


?>


<form action="./Cadastrar_Action.php" method="POST" id="form">
    <div class="form-item">
        <label for="nome-usuario">Nome:</label>
        <input type="text" name="Nome" id="nome-usuario">
    </div>
    <div class="form-item">
        <label for="cpf-usuario">Email:</label>
        <input type="text" name="Email" id="cpf-usuario">
    </div>
    <div class="form-item">
        <label for="senha-usuario">Senha:</label>
        <input type="password" name="Senha" id="senha-usuario">
    </div>    
    <div>
        <input type="submit" name="btn-action" value="Cadastrar" class="btn btn--verde">        
    </div>
</form>