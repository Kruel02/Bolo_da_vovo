<?php
require_once("./../Config/Config.php");


if (isset($_GET['IdUsuario'])) {
    $IdBolo = filter_input(INPUT_GET, "IdUsuario");

    if ($IdBolo) {

        $sql = $pdo->prepare("DELETE FROM  usuarios WHERE IdUusario = :IdUsuario");
        $sql->bindValue(":IdUsuario", $IdUsuario);
        $sql->execute();

        header("Location: Usuarios.php");
        exit;
    }
} elseif (empty($_GET['IdUsuario'])) {
    header("Location:Usuarios.php");
    exit;
}
