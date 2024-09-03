<?php
require_once("./../Config/Config.php");

// Verifica se o ID do usuário foi fornecido na URL
$IdUsuario = filter_input(INPUT_GET, 'IdUsuario', FILTER_VALIDATE_INT);

if ($IdUsuario) {
    // Busca os dados do usuário no banco de dados
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE IdUsuario = :IdUsuario");
    $sql->bindValue(':IdUsuario', $IdUsuario, PDO::PARAM_INT);
    $sql->execute();
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não fornecido.";
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nome = filter_input(INPUT_POST, 'Nome');
    $Email = filter_input(INPUT_POST, 'Email');
    $Senha = filter_input(INPUT_POST, 'Senha');
    $TipoUsuario = filter_input(INPUT_POST, 'TipoUsuario');

    // Verifica se os dados são válidos
    if ($Nome && $Email && $Senha && in_array($TipoUsuario, ['Comum', 'ADMIN'])) {
        // Atualiza os dados do usuário no banco de dados
        $sql = $pdo->prepare("UPDATE usuarios SET Nome = :Nome, Email = :Email, Senha = :Senha, TipoUsuario = :TipoUsuario WHERE IdUsuario = :IdUsuario");
        $sql->bindValue(':Nome', $Nome);
        $sql->bindValue(':Email', $Email);
        $sql->bindValue(':Senha', password_hash($Senha, PASSWORD_DEFAULT)); // Hash da senha
        $sql->bindValue(':TipoUsuario', $TipoUsuario);
        $sql->bindValue(':IdUsuario', $IdUsuario, PDO::PARAM_INT);

        if ($sql->execute()) {
            echo "Usuário atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o usuário.";
        }
    } else {
        echo "Dados inválidos!";
    }
}
?>


</head>
<body>
    <h1>Atualizar Usuário</h1>

    <form method="POST">
        <input type="hidden" name="IdUsuario" value="<?php echo htmlspecialchars($usuario['IdUsuario'], ENT_QUOTES, 'UTF-8'); ?>">
        
        <label for="Nome">Nome:</label>
        <input type="text" name="Nome" id="Nome" value="<?php echo htmlspecialchars($usuario['Nome'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="Email">Email:</label>
        <input type="email" name="Email" id="Email" value="<?php echo htmlspecialchars($usuario['Email'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="Senha">Senha:</label>
        <input type="password" name="Senha" id="Senha" required>

        <label for="TipoUsuario">Tipo de Usuário:</label>
        <select name="TipoUsuario" id="TipoUsuario" required>
            <option value="Comum" <?php if ($usuario['TipoUsuario'] === 'Comum') echo 'selected'; ?>>Comum</option>
            <option value="ADMIN" <?php if ($usuario['TipoUsuario'] === 'ADMIN') echo 'selected'; ?>>ADMIN</option>
        </select>

        <button type="submit">Atualizar Usuário</button>
    </form>
</body>
</html>
