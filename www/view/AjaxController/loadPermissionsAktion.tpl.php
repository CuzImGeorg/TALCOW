<h1>Permission</h1>
<br>
<table class="permissiontable">
    <tr>
        <td id="pid">Name</td>
        <td id="pd">Description</td>
    </tr>
    <?php foreach ($perms as $p) { ?>
    <tr>
        <td><button id="btnp" onclick="loadUserPermissionsByBerechtigungsName('<?=$p->getName()?>')"><?=$p->getName()?></button></td>
        <td><?=$p->getDescription()?></td>
    </tr>
    <?php  } ?>

</table>

