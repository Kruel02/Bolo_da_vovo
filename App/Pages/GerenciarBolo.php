<?php
require_once("./../Config/Config.php");
session_start();

// Verifica se o usuário está logado e se é ADMIN
if (!isset($_SESSION['usuariologado']) || $_SESSION['tipousuario'] !== 'ADMIN') {
    // Se não estiver logado ou não for ADMIN, redireciona para a página inicial
    header('Location: ./../Index.php');
    exit;
}

$sql = $pdo->query("SELECT * FROM bolos");

if ($sql->rowCount() > 0) {
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Bolos</title>
</head>
<body>
    <h1>Gerenciar Bolos</h1>
    <table id="tabela-gerenciar">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Foto</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>

        <?php if (isset($dados)): ?>
            <?php foreach($dados as $key => $Value): ?>
                <tr>
                    <td><?php echo (int)$Value['IdBolo']; ?></td>
                    <td><?php echo htmlspecialchars($Value['Nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($Value['Preco'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><img src='<?php echo htmlspecialchars($Value['Foto'], ENT_QUOTES, 'UTF-8'); ?>' alt="Imagem do bolo" style="width: 80px; height: auto;"></td>
                    <td><?php echo htmlspecialchars($Value['Descricao'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="./AtualizarBolo_Action.php?IdBolo=<?php echo $Value['IdBolo']; ?>">Editar</a>
                        <span>|</span>
                        <a href="./Excluir_Action.php?IdBolo=<?php echo $Value['IdBolo']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>
