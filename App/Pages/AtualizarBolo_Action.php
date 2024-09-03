<?php
require_once("./../Config/Config.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $IdBolo = filter_input(INPUT_POST, 'IdBolo', FILTER_VALIDATE_INT);
    $Nome = filter_input(INPUT_POST, 'Nome');
    $Preco = filter_input(INPUT_POST, 'Preco', FILTER_VALIDATE_FLOAT);
    $Foto = filter_input(INPUT_POST, 'Foto', FILTER_SANITIZE_URL);
    $Descricao = filter_input(INPUT_POST, 'Descricao');

    // Verifica se os dados são válidos
    if ($IdBolo && $Nome && $Preco && $Foto && $Descricao) {
        // Atualiza os dados do bolo no banco de dados
        $sql = $pdo->prepare("UPDATE bolos SET Nome = :Nome, Preco = :Preco, Foto = :Foto, Descricao = :Descricao WHERE IdBolo = :IdBolo");
        $sql->bindValue(':Nome', $Nome);
        $sql->bindValue(':Preco', $Preco);
        $sql->bindValue(':Foto', $Foto);
        $sql->bindValue(':Descricao', $Descricao);
        $sql->bindValue(':IdBolo', $IdBolo, PDO::PARAM_INT);

        if ($sql->execute()) {
            echo "Bolo atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o bolo.";
        }
    } else {
        echo "Dados inválidos!";
    }
} else {
    // Obtém os dados do bolo a ser editado
    $IdBolo = filter_input(INPUT_GET, 'IdBolo', FILTER_VALIDATE_INT);
    if ($IdBolo) {
        $sql = $pdo->prepare("SELECT * FROM bolos WHERE IdBolo = :IdBolo");
        $sql->bindValue(':IdBolo', $IdBolo, PDO::PARAM_INT);
        $sql->execute();
        $bolo = $sql->fetch(PDO::FETCH_ASSOC);

        if (!$bolo) {
            echo "Bolo não encontrado.";
            exit;
        }
    } else {
        echo "ID do bolo não fornecido.";
        exit;
    }
}
?>

<body>
    <h1>Atualizar Bolo</h1>

    <form method="POST">
        <input type="hidden" name="IdBolo" value="<?php echo htmlspecialchars($bolo['IdBolo'], ENT_QUOTES, 'UTF-8'); ?>">
        <label for="Nome">Nome do Bolo:</label>
        <input type="text" name="Nome" id="Nome" value="<?php echo htmlspecialchars($bolo['Nome'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="Preco">Preço:</label>
        <input type="text" name="Preco" id="Preco" value="<?php echo htmlspecialchars($bolo['Preco'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="Foto">URL da Foto:</label>
        <input type="text" name="Foto" id="Foto" value="<?php echo htmlspecialchars($bolo['Foto'], ENT_QUOTES, 'UTF-8'); ?>" required>

        <label for="Descricao">Descrição:</label>
        <textarea name="Descricao" id="Descricao" rows="4" required><?php echo htmlspecialchars($bolo['Descricao'], ENT_QUOTES, 'UTF-8'); ?></textarea>

        <button type="submit">Atualizar Bolo</button>
    </form>
</body>


