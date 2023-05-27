<table>
    <tr>
    <?php $i=0; foreach ($res[0] as $index => $a) { ?>
        <?php if($i%2 == 0) { ?>
            <th><?=$index?></th>
        <?php }?>
        <?php $i++;?>
    <?php }?>
    </tr>
    <?php  foreach ($res as  $a) { ?>
        <tr>
        <?php $i=0; foreach ($a as  $record) { ?>
            <?php if($i%2 == 0) { ?>
                <td><?=$record?></td>
            <?php }?>
            <?php $i++;?>
        <?php }?>
        </tr>
    <?php }?>

</table>