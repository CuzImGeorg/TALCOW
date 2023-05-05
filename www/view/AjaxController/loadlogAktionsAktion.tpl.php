
<h1>User</h1>
<br>
<table class="aktiom">
    <tr>
        <td>Name</td><td>Description</td><td>Modul</td><td>
    </tr>
    <?php foreach ($aks as $a) { ?>
        <tr>
            <td><?=$a->getName()?></td><td><?=$a->getDescription()?></td><td><?=$a->getCreatedate()?>
        </tr>
    <?php  } ?>

</table>

