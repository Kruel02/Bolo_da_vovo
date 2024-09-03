<?php
require_once("./../Config/Config.php");

if (isset($_GET['IdBolo'])) {
    $IdBolo = filter_input(INPUT_GET, "IdBolo", FILTER_VALIDATE_INT);

    if ($IdBolo) {
        $sql = $pdo->prepare("DELETE FROM bolos WHERE IdBolo = :IdBolo");
        $sql->bindValue(":IdBolo", $IdBolo, PDO::PARAM_INT);
        $sql->execute();

        header("Location: GerenciarBolo.php");
        exit;
    }
}

// Se IdBolo não estiver definido ou estiver vazio, redireciona para a página de gerenciamento
header("Location: GerenciarBolo.php");
exit;
