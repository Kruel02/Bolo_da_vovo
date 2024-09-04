<?php
require __DIR__ . "/../Config/Config.php";
session_start();

// Verifica se o usuário está logado e se é ADMIN
if (!isset($_SESSION['usuariologado']) || $_SESSION['tipousuario'] !== 'ADMIN') {
    // Se não estiver logado ou não for ADMIN, redireciona para a página inicial
    header('Location: ./../Index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Bolo</title>
</head>
<body>
    <main>
        <h1>Criar Bolo</h1>
        <form action="./CriarBolo_Action.php" method="post">
            <div class="Form-item">
                <label for="Nome-Pizza">Nome do Bolo</label>
                <input type="text" name="Nome" id="Nome-Pizza">
            </div>

            <div class="Form-item">
                <label for="PrecoBolo">Preço</label>
                <input type="text" name="Preco" id="PrecoBolo">
            </div>

            <div class="Form-item">
                <label for="Foto">Foto</label>
                <input type="text" name="Foto" id="Foto">
            </div>

            <div class="Form-item">
                <label for="descricao">Descrição do Bolo</label>
                <textarea name="Descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>

            <div>
                <input type="submit" value="Cadastrar Bolo">
            </div>
        </form>
    </main>
</body>
</html>
