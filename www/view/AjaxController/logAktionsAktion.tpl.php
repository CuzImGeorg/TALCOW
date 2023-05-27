
<h1>Log Actions</h1>
<br>
<table class="aktiontable">
    <tr>
        <th id="lan">Name</th>
        <th id="lad">Description</th>
        <th id="lam">Module</th><td>
    </tr>
    <?php foreach ($akt as $a) { ?>
        <tr>
            <td><?=$a->getName()?></td><td><?=$a->getDescription()?></td><td><?=$a->getModulIOI()->getName()?>
        </tr>
    <?php  } ?>

</table>

