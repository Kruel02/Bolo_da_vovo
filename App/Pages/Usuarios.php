<?php
require_once("./../Config/Config.php");
session_start();

// Verifica se o usuário está logado e se é ADMIN
if (!isset($_SESSION['usuariologado']) || $_SESSION['tipousuario'] !== 'ADMIN') {
    // Se não estiver logado ou não for ADMIN, redireciona para a página inicial
    header('Location: ./../Index.php');
    exit;
}

$sql = $pdo->query("SELECT * FROM usuarios");

if ($sql->rowCount() > 0) {
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
</head>
<body>
    <h1>Gerenciar Usuários</h1>
    <table id="tabela-gerenciar">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo de Usuário</th>
            <th>Ações</th>
        </tr>

        <?php if (isset($dados)): ?>
            <?php foreach($dados as $key => $Value): ?>
                <tr>
                    <td><?php echo (int)$Value['IdUsuario']; ?></td>
                    <td><?php echo htmlspecialchars($Value['Nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($Value['Email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($Value['TipoUsuario'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="./AtualizarCadastro.php?IdUsuario=<?php echo $Value['IdUsuario']; ?>">Editar</a>
                        <span>|</span>
                        <a href="./ExcluirUsuario_Action.php?IdUsuario=<?php echo $Value['IdUsuario']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>
