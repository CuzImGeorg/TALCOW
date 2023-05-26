
<h1>Log Actions</h1>
<br>
<table class="aktiontable">
    <tr>
        <td id="lan">Name</td>
        <td id="lad">Description</td>
        <td id="lam">Module</td><td>
    </tr>
    <?php foreach ($akt as $a) { ?>
        <tr>
            <td><?=$a->getName()?></td><td><?=$a->getDescription()?></td><td><?=$a->getModulIOI()->getName()?>
        </tr>
    <?php  } ?>

</table>

