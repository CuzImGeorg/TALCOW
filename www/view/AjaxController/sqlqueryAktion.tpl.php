<table>
    <tr>
    <?php foreach ($res[0] as $index => $a) { ?>
        <th><?=$index?></th>
    <?php }?>
    </tr>
    <?php foreach ($res as  $a) { ?>
        <tr>
        <?php foreach ($a as  $record) { ?>
            <td><?=$record?></td>
        <?php }?>
        </tr>
    <?php }?>

</table>