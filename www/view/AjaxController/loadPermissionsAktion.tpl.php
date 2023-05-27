<h1>Permission</h1>
<br>
<table class="permissiontable">
    <tr>
        <th id="pid">Name</th>
        <th id="pd">Description</th>
    </tr>
    <?php foreach ($perms as $p) { ?>
    <tr>
        <td><button id="btnp" onclick="loadUserPermissionsByBerechtigungsName('<?=$p->getName()?>')"><?=$p->getName()?></button></td>
        <td><?=$p->getDescription()?></td>
    </tr>
    <?php  } ?>

</table>

