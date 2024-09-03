<?php
require_once("./../Config/Config.php");

$sql = $pdo->query("SELECT * FROM usuarios");

if ($sql->rowCount() > 0) {
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

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
