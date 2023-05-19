
<table class="aktiontable">
    <tr>
        <td>Name</td><td>Description</td><td>Module</td><td>
    </tr>
    <?php foreach ($akt as $a) { ?>
        <tr>
            <td><?=$a->getName()?></td><td><?=$a->getDescription()?></td><td><?=$a->getModulIOI()->getName()?>
        </tr>
    <?php  } ?>

</table>