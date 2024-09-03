<?php
require_once("./../Config/Config.php");
$sql = $pdo -> query("SELECT * FROM usuarios");
$sql -> execute();
if($sql-> rowCount()>0) 
{$dados = $sql->fetchAll(PDO::FETCH_ASSOC);


}
    ?>




<table id="tabela-gerenciar">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Tipo de Usuarios</th>
        <th>Ações</th>
    </tr>

    <?php  
    
    foreach($dados as $key => $Value):?>
    <tr>
    <td><?php echo (int)$Value['IdUsuario']?></td>
        <td><?php echo $Value['Nome']?></td>
        <td><?php echo $Value['Email']?></td>
        <td><?php echo $Value['TipoUsuario']?></td>
        <td>
            <a href="./AtualizarCadastro_Action.php?IdPizza=<?php echo $Value['IdUsuario']?>">Editar</a>
            <span>|</span>
            <a href="./ExcluirUsuario_Action.php?IdPizza=<?php echo $Value['IdUsuario']?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach;?>
    
</table>


