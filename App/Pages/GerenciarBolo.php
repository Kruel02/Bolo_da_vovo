<?php
require_once("./../Config/Config.php");
$sql = $pdo -> query("SELECT * FROM bolos");
$sql -> execute();
if($sql-> rowCount()>0) 
{$dados = $sql->fetchAll(PDO::FETCH_ASSOC);


}
    ?>




<table id="tabela-gerenciar">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Foto</th>
        <th>Descricao</th>
        <th>Ações</th>
    </tr>

    <?php  
    
    foreach($dados as $key => $Value):?>
    <tr>
    <td><?php echo (int)$Value['IdBolo']?></td>
        <td><?php echo $Value['Nome']?></td>
        <td><?php echo $Value['Preco']?></td>
        <td><img src='<?php  echo $value['Foto'] ?>' alt="Imagem da pizza muçarela"></td>
        <td><?php echo $Value['Descricao']?></td>
        <td>
            <a href="./Atualizar_Action.php?IdPizza=<?php echo $Value['IdBolo']?>">Editar</a>
            <span>|</span>
            <a href="./Excluir_Action.php?IdPizza=<?php echo $Value['IdBolo']?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach;?>
    
</table>
