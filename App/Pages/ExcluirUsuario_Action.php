<?php
require_once("./../Config/Config.php");

if (isset($_GET['IdUsuario'])) {
    $IdUsuario = filter_input(INPUT_GET, "IdUsuario", FILTER_VALIDATE_INT);

    if ($IdUsuario) {
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE IdUsuario = :IdUsuario");
        $sql->bindValue(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
        $sql->execute();

        header("Location: Usuarios.php");
        exit;
    }
}

// Se IdUsuario não estiver definido ou estiver vazio, redireciona para a página de usuários
header("Location: Usuarios.php");
exit;
