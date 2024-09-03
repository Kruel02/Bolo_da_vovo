<?php
require_once("./../Config/Config.php");

$Preco = floatval(str_replace(',', '.', $_POST['Preco']));
$Descricao = $_POST['Descricao'];

$Nome = filter_input(INPUT_POST, 'Nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($Nome && $Preco) {
    $sql = $pdo->prepare("INSERT INTO bolos (IdUsuario, Nome, Preco, Descricao) VALUES (:IdUsuario, :Nome, :Preco, :Descricao);");
    $sql->bindValue(":IdUsuario", 1);
    $sql->bindValue(":Nome", $Nome);
    $sql->bindValue(":Descricao", $Descricao);
    $sql->bindValue(":Preco", $Preco);
    
    // Execute o comando
    $sql->execute();
    
    echo "Foi";
    // header("Location: ./../index.php");
    // require_once ("./../Pages/Partials/Footer.php");
    exit();
} else {
    echo "Não foi";
}
?>
