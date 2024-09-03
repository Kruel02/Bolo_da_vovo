<?php
require_once("./../Config/Config.php");


if (isset($_GET['IdBolo'])) {
    $IdBolo = filter_input(INPUT_GET, "IdBolo");

    if ($IdBolo) {

        $sql = $pdo->prepare("DELETE FROM  bolos WHERE IdBolo = :IdBolo");
        $sql->bindValue(":IdBolo", $IdBolo);
        $sql->execute();

        header("Location: Gerenciaralt.php");
        exit;
    }
} elseif (empty($_GET['IdBolo'])) {
    header("Location:GerenciarBolo.php");
    exit;
}
